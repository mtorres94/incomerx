<?php

namespace Sass\Http\Controllers\Export\OceanExport;

use Illuminate\Http\Request;

use Sass\EoBillOfLading;
use Sass\EoCargoLoader;
use Sass\EoCargoLoaderCargo;
use Sass\EoCargoLoaderCargoDetail;
use Sass\EoCargoLoaderContainer;
use Sass\EoCargoLoaderHazardous;
use Sass\DataTables\Export\Ocean\CargoLoaderDataTable;
use Sass\EoCargoLoaderReceiptEntry;
use Sass\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Sass\Http\Requests;
use Sass\ReceiptEntry;
use Sass\ReceiptEntryCargoDetail;
use Sass\ReceiptEntryHazardousDetail;

class EoCargoLoaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CargoLoaderDataTable $dataTable)
    {
        return $dataTable->render('export.oceans.cargo_loader.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    {
        $user_open_id = Auth::user()->id;
        return view('export.oceans.cargo_loader.create', compact('user_open_id'));
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

            $last = EoCargoLoader::orderBy('code','desc')->first();
            $frmt = $last == null ? 1 : intval(substr($last->code, 4)) + 1;
            $code = str_pad($frmt, 6, '0', 0);
            $cargo_loader = $request->all();
            $cargo_loader['code'] = "EOG-".$code;
            $cargo_loader['user_create_id'] = Auth::user()->id;
            $cargo_loader['user_update_id'] = Auth::user()->id;
            $cargo_loader['user_open_id'] = Auth::user()->id;

            $cl=EoCargoLoader::create($cargo_loader);
            $cargo_loader['cargo_loader_id']= $cl->id;
            $cargo_loader['shipment_id']= $cl->shipment_id;
            $cargo_loader['bl_date']= $cl->date_today;
            $cargo_loader['place_receipt'] = $cargo_loader['place_receipt_name'];
            $cargo_loader['place_delivery'] = $cargo_loader['place_delivery_name'];
            $cargo_loader['port_unloading'] = $cargo_loader['port_unloading_name'];
            $cargo_loader['foreign_port'] = $cargo_loader['port_unloading_name'];
            $cargo_loader['port_loading'] = $cargo_loader['port_loading_name'];
            ReceiptEntry::saveDetail($cl->id,$cargo_loader);
            $id_shipper = array_distinct($cargo_loader['hidden_shipper_id']);
            $cargo_loader['bill_of_lading_id']=0;
            EoCargoLoaderContainer::saveDetail($cl->id, $cargo_loader);
            EoCargoLoaderReceiptEntry::saveDetail($cl->id, $cargo_loader);
            if($cargo_loader['create_hbl'] == "1")
                EoBillOfLading::saveDetail($cl->id, $cargo_loader, $id_shipper);
            //dd($cargo_loader);
            $id= $cl->id;
            DB::commit();


            } catch (ValidationException $e) {
            DB::rollback();
        }

        return redirect()->route('export.oceans.cargo_loader.edit', [$id]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargo_loader = EoCargoLoader::findOrFail($id);
        $user_open_id =  ($cargo_loader->user_open_id == 0) ? Auth::user()->id : $cargo_loader->user_open_id;
        $cargo_loader = self::updateOpenStatus($cargo_loader);
        $cargo_loader->save();
        return view('export.oceans.cargo_loader.edit', compact('cargo_loader', 'user_open_id'));
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
            $cargo_loader = $request->all();
            $cargo_loader['user_update_id'] = Auth::user()->id;
            $sent = EoCargoLoader::findorfail($id);

            $cargo_loader['place_receipt'] = $cargo_loader['place_receipt_name'];
            $cargo_loader['place_delivery'] = $cargo_loader['place_delivery_name'];
            $cargo_loader['port_unloading'] = $cargo_loader['port_unloading_name'];
            $cargo_loader['foreign_port'] = $cargo_loader['port_unloading_name'];
            $cargo_loader['port_loading'] = $cargo_loader['port_loading_name'];
            dd($cargo_loader);
            $exp = $sent->update($cargo_loader);
            ReceiptEntry::saveDetail($id,$cargo_loader);
            $cargo_loader['bill_of_lading_id']=0;
            EoCargoLoaderContainer::saveDetail($id, $cargo_loader);
            EoCargoLoaderReceiptEntry::saveDetail($id, $cargo_loader);

            //CargoLoaderHazardous::saveDetail($cl->id, $cargo_loader);
            //EoBillOfLading::saveDetail($id, $cargo_loader);

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.oceans.cargo_loader.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdf($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $cargo_loader= EoCargoLoader::findOrFail($id);
                return \PDF::loadView('export.oceans.cargo_loader.pdf', compact('cargo_loader'))->stream('DO '.$cargo_loader->code.'.pdf');
            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

    public function booking_confirmation($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $cargo_loader= EoCargoLoader::findOrFail($id);
                return \PDF::loadView('export.oceans.cargo_loader.booking_confirmation', compact('cargo_loader'))->stream('BC '.$cargo_loader->booking_code.'.pdf');
            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $cargo_loader = EoCargoLoader::findOrFail($id);
            if (Auth::user()->id == $cargo_loader->user_open_id)
            {

                $cargo_loader = self::updateCloseStatus($cargo_loader);
                $cargo_loader->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $cargo_loader = EoCargoLoader::findOrFail($data['id']);
        return [
            'id'   => $cargo_loader->user_open_id,
            'name' => $cargo_loader->user_open_id > 0 ? $cargo_loader->user_open->name : '',
        ];
    }


    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $cargo_loaders = EoCargoLoader::where(function ($query) use ($request) {
                if ($term = $request->get('term')) {
                    $query->orWhere('code', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($cargo_loaders as $cargo_loader) {
                $results[] = [
                    'id'                => $cargo_loader->id,
                    'code'             => strtoupper($cargo_loader->code),
                    'shipment_id'       =>$cargo_loader->shipment_id,
                    'shipment_code'     =>$cargo_loader->shipment->code,
                    'type'               => $cargo_loader->shipment->shipment_type,
                    'bl_status'         => $cargo_loader->shipment->bl_status,
                    'vessel'               => $cargo_loader->shipment->vessel_name,
                    'voyage'         => $cargo_loader->shipment->voyage_name,
                    'carrier_id'         => $cargo_loader->shipment->carrier_id,
                    'carrier_name'         => strtoupper($cargo_loader->shipment->carrier_id > 0 ? $cargo_loader->shipment->carrier->name : ""),
                    'departure'    => $cargo_loader->shipment->departure_date,
                    'arrival'    => $cargo_loader->shipment->arrival_date,

                    'loading_port_id'   => $cargo_loader->shipment->port_loading_id,
                    'unloading_port_id'   => $cargo_loader->shipment->port_unloading_id,
                    'loading_port_name'   => strtoupper($cargo_loader->shipment->port_loading_id > 0 ? $cargo_loader->shipment->port_loading->name : ""),
                    'unloading_port_name'   => strtoupper($cargo_loader->shipment->port_unloading_id >0 ? $cargo_loader->shipment->port_unloading->name : ""),
                    'location_origin_id'   => $cargo_loader->shipment->place_receipt_id,
                    'location_destination_id'   => $cargo_loader->shipment->place_delivery_id,
                    'location_origin_name'   => strtoupper($cargo_loader->shipment->place_receipt_id >0 ? $cargo_loader->shipment->place_receipt->name : ""),
                    'location_destination_name'   => strtoupper($cargo_loader->shipment->place_delivery_id > 0 ? $cargo_loader->shipment->place_delivery->name : ""),

                    'domestic_routing'   => $cargo_loader->shipment->domestic_routing,
                    'booking_code'   => $cargo_loader->shipment->booking_code,
                    'state_of_origin_id'   => $cargo_loader->shipment->state_of_origin_id,
                    'state_of_origin_name'   => strtoupper($cargo_loader->shipment->state_of_origin_id > 0 ? $cargo_loader->shipment->state_of_origin->name : ""),
                ];
            }
            return response()->json($results);
        }
    }

    public function get_warehouses(Request $request)
    {
        if ($request->ajax()) {
            $cargo_loaders = EoCargoLoaderReceiptEntry::select(['eo_cargo_loader_receipt_entries.*'])
                ->where(function ($query) use ($request) {
                    $id = $request->get('id');
                    $query->orWhere('eo_cargo_loader_receipt_entries.cargo_loader_id', '=', $id);
                })->get();

            $results = [];
                foreach ($cargo_loaders as $data) {
                    $results[] = [
                        'id' => $data->receipt_entry->id,
                        'value' => strtoupper($data->receipt_entry->code),
                        'date_in' => strtoupper($data->receipt_entry->date_in),
                        'status' => strtoupper($data->receipt_entry->status),
                        'shipper_name' => strtoupper($data->receipt_entry->shipper_id > 0 ? $data->receipt_entry->shipper->name: ""),
                        'shipper_id' => strtoupper($data->receipt_entry->shipper_id),
                        'consignee_name' => strtoupper($data->receipt_entry->consignee_id > 0 ? $data->receipt_entry->consignee->name: ""),
                        'consignee_id' => strtoupper($data->receipt_entry->consignee_id),
                        'quantity' => strtoupper($data->receipt_entry->sum_pieces),
                        'sum_weight' => strtoupper($data->receipt_entry->sum_weight),
                        'sum_cubic' => strtoupper($data->receipt_entry->sum_cubic),
                        'volume_weight' => $data->receipt_entry->sum_volume_weight,
                        'container_id' => $data->container_id,
                        'cargo_loader_id' => $data->cargo_loader_id,
                    ];

            }

            return response()->json($results);
        }

    }


}
