<?php

namespace Sass\Http\Controllers\Export\OceanExport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Export\Ocean\EOQuotesDataTable;
use Sass\EOQuotesCargo;
use Sass\EOQuotesCharges;
use Sass\EOQuotesContainer;
use Sass\ExportOceanQuotes;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;

class ExportOceanQuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EOQuotesDataTable $dataTable)
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
        return view('export.oceans.quotes.create');
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
            $count = ExportOceanQuotes::count() + 1;
            $quote_code= str_pad($count, 10, '0', STR_PAD_LEFT);
            $quotes = $request->all();
            $quotes['code']=$quote_code;
            $quotes['user_create_id'] = Auth::user()->id;
            $quotes['user_update_id'] = Auth::user()->id;

            $exp_quotes=ExportOceanQuotes::create($quotes);
            EOQuotesContainer::saveDetail($exp_quotes->id, $quotes);
            EOQuotesCharges::saveDetail($exp_quotes->id, $quotes);
            EOQuotesCargo::saveDetail($exp_quotes->id, $quotes);

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.oceans.quotes.create');
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
        $quotes= ExportOceanQuotes::findOrFail($id);
        return view('export.oceans.quotes.edit', compact('quotes'));
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
            $sent = ExportOceanQuotes::findorfail($id);
            $exp_quotes = $sent->update($quotes);

            EOQuotesContainer::saveDetail($id, $quotes);
            EOQuotesCharges::saveDetail($id, $quotes);
            EOQuotesCargo::saveDetail($id, $quotes);
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.oceans.quotes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quotes = ExportOceanQuotes::find($id);
        $quotes->delete();
        $quotes_cargo= DB::table('exp_oceans_quotes_cargo')->where('quotes_id', '=', $id)->delete();
        $quotes_container= DB::table('exp_oceans_quotes_container')->where('quotes_id', '=', $id)->delete();
        $quotes_charge= DB::table('exp_oceans_quotes_charges')->where('quotes_id', '=', $id)->delete();
    }
    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $quotes = ExportOceanQuotes::leftJoin('mst_carriers', 'exp_oceans_quotes.carrier_id', '=', 'mst_carriers.id')
                ->leftJoin('mst_ocean_ports AS op2', 'exp_oceans_quotes.port_unloading_id', '=', 'op2.id')
                ->leftJoin('mst_ocean_ports AS op1', 'exp_oceans_quotes.port_loading_id', '=', 'op1.id')
                ->leftJoin('mst_world_locations AS wl1', 'exp_oceans_quotes.place_receipt_id', '=', 'wl1.id')
                ->leftJoin('mst_world_locations AS wl2', 'exp_oceans_quotes.place_delivery_id', '=', 'wl2.id')
                ->leftJoin('mst_customers AS C1', 'exp_oceans_quotes.shipper_id', '=', 'C1.id')
                ->leftJoin('mst_customers AS C2', 'exp_oceans_quotes.consignee_id', '=', 'C2.id')
                ->leftJoin('mst_customers AS C3', 'exp_oceans_quotes.agent_id', '=', 'C3.id')
                ->leftJoin('mst_states AS S1', 'exp_oceans_quotes.shipper_state_id', '=', 'S1.id')
                ->leftJoin('mst_states AS S2', 'exp_oceans_quotes.consignee_state_id', '=', 'S2.id')
                ->leftJoin('mst_zip_codes AS Z1', 'exp_oceans_quotes.shipper_zip_code_id', '=', 'Z1.id')
                ->leftJoin('mst_zip_codes AS Z2', 'exp_oceans_quotes.consignee_zip_code_id', '=', 'Z2.id')

                ->select(['exp_oceans_quotes.*','op1.id AS port_loading_id','op2.id AS port_unloading_id','op1.name AS port_loading_name','op2.name AS port_unloading_name','wl1.id AS place_receipt_id','wl2.id AS place_delivery_id','wl1.name AS place_receipt_name','wl2.name AS place_delivery_name', 'mst_carriers.id as carrier_id', 'mst_carriers.name as carrier_name','C1.id as shipper_id','C1.name as shipper_name','C2.id as consignee_id','C2.name as consignee_name', 'C3.id as agent_id','C3.name as agent_name', 'S1.id as shipper_state_id', 'S2.id as consignee_state_id', 'S1.name as shipper_state_name', 'S2.name as consignee_state_name', 'Z1.id as shipper_zip_code_id', 'Z2.id as consignee_zip_code_id', 'Z1.code as shipper_zip_code', 'Z2.code as consignee_zip_code', 'C3.address as agent_address', 'C3.city as agent_city', 'C3.state_id as agent_state_id', 'C3.zip_code_id as agent_zip_code_id', 'C3.country_id as agent_country_id'])
                ->where(function ($query) use ($request) {
                    if ($term = $request->get('term')) {
                        $query->orWhere('exp_oceans_quotes.code', 'LIKE', $term . '%');
                    }

                })->take(10)->get();

            $results = [];
            foreach ($quotes as $quote) {
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
                ];
            }

            return response()->json($results);
        }
    }

}
