<?php

namespace Sass\Http\Controllers\Export\OceanExport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Export\Ocean\EOQuotesDataTable;
use Sass\EoQuotesCargo;
use Sass\EoQuotesCharges;
use Sass\EoQuotesContainer;
use Sass\EoQuotes;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;

class EoQuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EoQuotesDataTable $dataTable)
    {
        return $dataTable->render('export.oceans.quotes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('export.oceans.quotes.create', compact('user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $last = EoQuotes::orderBy('code','desc')->first();
            $frmt = $last == null ? 1 : intval(substr($last->code, 4)) + 1;
            $quote_code = str_pad($frmt, 6, '0', 0);
            $quotes = $request->all();
            $quotes['code']="EOQ-".$quote_code;
            $quotes['user_create_id'] = Auth::user()->id;
            $quotes['user_update_id'] = Auth::user()->id;
            $quotes['user_open_id'] = Auth::user()->id;

            $exp_quotes=EoQuotes::create($quotes);
            EoQuotesContainer::saveDetail($exp_quotes->id, $quotes);
            EoQuotesCharges::saveDetail($exp_quotes->id, $quotes);
            EoQuotesCargo::saveDetail($exp_quotes->id, $quotes);
            $id= $exp_quotes->id;
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.oceans.quotes.edit', [$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quotes= EoQuotes::findOrFail($id);
        $user_open_id =  ($quotes->user_open_id == 0) ? Auth::user()->id : $quotes->user_open_id;

        $quotes = self::updateOpenStatus($quotes);
        $quotes->save();
        return view('export.oceans.quotes.edit', compact('quotes', 'user_open_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $quotes = $request->all();
            $quotes['user_update_id'] = Auth::user()->id;
            $sent = EoQuotes::findorfail($id);
            $sent->update($quotes);

            EoQuotesContainer::saveDetail($id, $quotes);
            EoQuotesCharges::saveDetail($id, $quotes);
            EoQuotesCargo::saveDetail($id, $quotes);
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.oceans.quotes.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quotes = EoQuotes::find($id);
        $quotes->delete();
        DB::table('eo_quotes_cargo')->where('quotes_id', '=', $id)->delete();
        DB::table('eo_quotes_container')->where('quotes_id', '=', $id)->delete();
        DB::table('eo_quotes_charges')->where('quotes_id', '=', $id)->delete();
    }

    public function report(Request $request) {
        $id = $request->get('_id');
        $type = $request->get('_type');
        $quotes = null;

        try {
            $quotes = EoQuotes::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        return \PDF::loadView('export.oceans.quotes.pdf', compact('quotes'))->stream($quotes->code.'.pdf');
    }

    public function pdf($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $quotes= EoQuotes::findOrFail($id);
                return \PDF::loadView('export.oceans.quotes.pdf', compact('quotes'))->stream($quotes->code.'.pdf');
            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

    public function get_details(Request $request)
    {
        if ($request->ajax()) {
            $containers = EoQuotesContainer::select(['eo_quotes_container.*'])
                ->where(function ($query) use ($request) {
                    $shipment_id = $request->get('id');
                    $query->orWhere('eo_quotes_container.quotes_id', '=', $shipment_id);
                })->get();

            $results = [];
            foreach ($containers as $container) {
                $results[] = [
                    'id' => $container->id,
                    'equipment_type_id' =>$container->equipment_type_id ,
                    'equipment_type_name' =>($container->equipment_type_id > 0 ? $container->equipment_type->code : ""),
                'container_number' =>$container->container_number ,
                'seal_number' =>$container->seal_number ,
                'pieces' =>$container->pieces,
                'gross_weight' =>$container->gross_weight,
                'cubic' =>$container->cubic ,
                'seal_number2' =>$container->seal_number2 ,
                'pd_status' =>$container->pd_status ,
                'carrier_id' =>$container->carrier_id ,
                'carrier_name' =>($container->carrier_id > 0 ? $container->carrier->name : ""),
                'ventilation' =>$container->ventilation ,
                'degrees' =>$container->degrees ,
                'temperature' =>$container->temperature ,
                'temperature_max' =>$container->temperature_max ,
                'temperature_min' =>$container->temperature_min,
                'pickup_id' =>$container->pickup_id,
                'pickup_name' => ($container->pickup_id > 0 ? $container->pickup->name : ""),
                'pickup_type' =>$container->pickup_type,
                'pickup_address' =>$container->pickup_address,
                'pickup_city' =>$container->pickup_city,
                'pickup_state_id' =>$container->pickup_state_id,
                'pickup_state_name' =>($container->pickup_state_id > 0 ? $container->pickup_state->name : ""),
                'pickup_zip_code_id' =>$container->pickup_zip_code_id,
                'pickup_zip_code' =>( $container->pickup_zip_code_id >0 ? $container->pickup_zip_code->code : ""),
                'pickup_phone' =>$container->pickup_phone,
                'pickup_date' =>$container->pickup_date ,
                'pickup_number' =>$container->pickup_number,
                'delivery_id ' =>$container->delivery_id ,
                'delivery_name' =>( $container->delivery_id > 0 ? $container->delivery->name : "") ,
                'delivery_address' =>$container->delivery_address ,
                'delivery_type' =>$container->delivery_type ,
                'delivery_city' =>$container->delivery_city,
                'delivery_state_id' =>$container->delivery_state_id,
                'delivery_state_name' =>( $container->delivery_state_id > 0 ? $container->delivery_state->name : ""),
                'delivery_zip_code_id' =>$container->delivery_zip_code_id ,
                'delivery_zip_code' =>( $container->delivery_zip_code_id >0 ? $container->delivery_zip_code->code: "") ,
                'delivery_phone' =>$container->delivery_phone ,
                'delivery_date' =>$container->delivery_date,
                'delivery_number' =>$container->delivery_number,
                'drop_id' =>$container->drop_id,
                'drop_name' => ($container->drop_id > 0 ? $container->drop->name : ""),
                'drop_type' =>$container->drop_type,
                'drop_address' =>$container->drop_address,
                'drop_city' =>$container->drop_city,
                'drop_state_id' =>$container->drop_state_id,
                'drop_state_name' =>($container->drop_state_id > 0 ? $container->drop_state->name : ""),
                'drop_zip_code_id' =>$container->drop_zip_code_id,
                'drop_zip_code' =>( $container->drop_zip_code_id >0 ? $container->drop_zip_code->code : ""),
                'drop_phone' =>$container->drop_phone ,
                'drop_date' =>$container->drop_date ,
                'total_weight_unit' =>$container->total_weight_unit,
                'container_comments' =>$container->container_comments,
                ];
            }
            return response()->json($results);
        }
    }

    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $quotes = EoQuotes::leftJoin('mst_carriers', 'eo_quotes.carrier_id', '=', 'mst_carriers.id')
                ->leftJoin('mst_ocean_ports AS op2', 'eo_quotes.port_unloading_id', '=', 'op2.id')
                ->leftJoin('mst_ocean_ports AS op1', 'eo_quotes.port_loading_id', '=', 'op1.id')
                ->leftJoin('mst_world_locations AS wl1', 'eo_quotes.place_receipt_id', '=', 'wl1.id')
                ->leftJoin('mst_world_locations AS wl2', 'eo_quotes.place_delivery_id', '=', 'wl2.id')
                ->leftJoin('mst_customers AS C1', 'eo_quotes.shipper_id', '=', 'C1.id')
                ->leftJoin('mst_customers AS C2', 'eo_quotes.consignee_id', '=', 'C2.id')
                ->leftJoin('mst_customers AS C3', 'eo_quotes.agent_id', '=', 'C3.id')
                ->leftJoin('mst_states AS S1', 'eo_quotes.shipper_state_id', '=', 'S1.id')
                ->leftJoin('mst_states AS S2', 'eo_quotes.consignee_state_id', '=', 'S2.id')
                ->leftJoin('mst_services AS SV', 'eo_quotes.service_id', '=', 'SV.id')
                ->leftJoin('mst_zip_codes AS Z1', 'eo_quotes.shipper_zip_code_id', '=', 'Z1.id')
                ->leftJoin('mst_zip_codes AS Z2', 'eo_quotes.consignee_zip_code_id', '=', 'Z2.id')

                ->select(['eo_quotes.*','op1.id AS port_loading_id','op2.id AS port_unloading_id','op1.name AS port_loading_name','op2.name AS port_unloading_name','wl1.id AS place_receipt_id','wl2.id AS place_delivery_id','wl1.name AS place_receipt_name','wl2.name AS place_delivery_name', 'mst_carriers.id as carrier_id', 'mst_carriers.name as carrier_name','C1.id as shipper_id','C1.name as shipper_name','C2.id as consignee_id','C2.name as consignee_name', 'C3.id as agent_id','C3.name as agent_name', 'S1.id as shipper_state_id', 'S2.id as consignee_state_id', 'S1.name as shipper_state_name', 'S2.name as consignee_state_name', 'Z1.id as shipper_zip_code_id', 'Z2.id as consignee_zip_code_id', 'Z1.code as shipper_zip_code', 'Z2.code as consignee_zip_code', 'C3.address as agent_address', 'C3.city as agent_city', 'C3.state_id as agent_state_id', 'C3.zip_code_id as agent_zip_code_id', 'C3.country_id as agent_country_id', 'SV.name as service_name'])
                ->where(function ($query) use ($request) {
                    if ($term = $request->get('id')) {
                        $query->where('eo_quotes.id', $term );
                        $query->where('eo_quotes.status', 'O');
                    }
                })->get();

            $results = [];
            foreach($quotes as $quote){
                $results[] = [
                    'id'                => $quote->id,
                    'code'              => strtoupper($quote->code),
                    'port_loading_id'   => $quote->port_loading_id,
                    'port_unloading_id'   => $quote->port_unloading_id,
                    'port_loading_name'   => strtoupper($quote->port_loading_name),
                    'port_unloading_name'   => strtoupper($quote->port_unloading_name),
                    'place_receipt_id'   => $quote->place_receipt_id,
                    'place_delivery_id'   => $quote->place_delivery_id,
                    'place_receipt_name'   => strtoupper($quote->place_receipt_name),
                    'place_delivery_name'   => strtoupper($quote->place_delivery_name),

                    'shipper_id'                => $quote->shipper_id,
                    'shipper_name'   => strtoupper($quote->shipper_name),
                    'shipper_address'   => strtoupper($quote->shipper_address),
                    'shipper_city'   => strtoupper($quote->shipper_city),
                    'shipper_phone'   => $quote->shipper_phone,
                    'shipper_fax'   => $quote->shipper_fax,
                    'shipper_state_id'   => $quote->shipper_state_id,
                    'shipper_state_name'   => $quote->shipper_state_name,
                    'shipper_zip_code_id'   => $quote->shipper_zip_code_id,
                    'shipper_zip_code'   => $quote->shipper_zip_code,

                    'consignee_id'                => $quote->consignee_id,
                    'consignee_name'   => strtoupper($quote->consignee_name),
                    'consignee_address'   => strtoupper($quote->consignee_address),
                    'consignee_city'   => strtoupper($quote->consignee_city),
                    'consignee_phone'   => $quote->consignee_phone,
                    'consignee_fax'   => $quote->consignee_fax,
                    'consignee_state_id'   => $quote->consignee_state_id,
                    'consignee_state_name'   => $quote->consignee_state_name,
                    'consignee_zip_code_id'   => $quote->consignee_zip_code_id,
                    'consignee_zip_code'   => $quote->consignee_zip_code,

                    'agent_id'   => $quote->agent_id,
                    'agent_name'   => strtoupper($quote->agent_name),
                    'agent_phone'   => $quote->agent_phone,

                    'carrier_id'   => $quote->carrier_id,
                    'carrier_name'   => strtoupper($quote->carrier_name),
                    'service_id'   => $quote->service_id,
                    'service_name'   => strtoupper($quote->service_name),

                    'total_quantity'   => $quote->total_quantity,
                    'total_unit_weight'   => strtoupper($quote->total_unit_weight),
                    'total_weight'   => strtoupper($quote->total_weight),
                    'total_cubic'   => strtoupper($quote->total_cubic),
                    'total_cargo_type_id'   => $quote->total_cargo_type_id,
                    'total_cargo_type_code'   => strtoupper($quote->total_cargo_type_id > 0 ?  $quote->total_cargo_type->code : ""),
                    'total_commodity'   => strtoupper($quote->total_commodity),
                    'freight_charges'   => $quote->freight_charges,
                    'other_charges'   => $quote->other_charges,
                ];
            }

            return response()->json($results);
        }
    }

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $quotes = EoQuotes::findOrFail($id);
            if (Auth::user()->id == $quotes->user_open_id)
            {

                $quotes = self::updateCloseStatus($quotes);
                $quotes->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $quotes = EoQuotes::findOrFail($data['id']);
        return [
            'id'   => $quotes->user_open_id,
            'name' => $quotes->user_open_id > 0 ? $quotes->user_open->name : '',
        ];
    }


}
