<?php

namespace Sass\Http\Controllers\Export\OceanExport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Export\Ocean\ShipmentEntryDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\ShipmentEntry;

class ShipmentEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShipmentEntryDataTable $dataTable)
    {
        return $dataTable->render('export.oceans.shipment_entries.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('export.oceans.shipment_entries.create');
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
            $count = ShipmentEntry::count() + 1;
            $shipment_code= str_pad($count, 10, '0', STR_PAD_LEFT);
            $shipment_entry = $request->all();
            $shipment_entry['shipment_code']=$shipment_code;
            $shipment_entry['user_create_id'] = Auth::user()->id;
            $shipment_entry['user_update_id'] = Auth::user()->id;

            $whr=ShipmentEntry::create($shipment_entry);
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.oceans.shipment_entries.index');
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
        $shipment_entry = ShipmentEntry::findOrFail($id);
        return view('export.oceans.shipment_entries.edit', compact('shipment_entry'));
    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $shipment = $request->all();
            $sent = ShipmentEntry::findorfail($id);
            $exp = $sent->update($shipment);
            $shipment['user_update_id'] = Auth::user()->id;
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.oceans.shipment_entries.index');
    }


    public function destroy($id)
    {
        $shipment = ShipmentEntry::find($id);
        $shipment->delete();
    }

    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $shipmentEntries = ShipmentEntry::leftJoin('mst_carriers', 'exp_shipment_entries.carrier_id', '=', 'mst_carriers.id')
                ->leftJoin('mst_ocean_ports AS op2', 'exp_shipment_entries.port_unloading_id', '=', 'op2.id')
                ->leftJoin('mst_ocean_ports AS op1', 'exp_shipment_entries.port_loading_id', '=', 'op1.id')
                ->leftJoin('mst_world_locations AS wl1', 'exp_shipment_entries.place_receipt_id', '=', 'wl1.id')
                ->leftJoin('mst_world_locations AS wl2', 'exp_shipment_entries.place_delivery_id', '=', 'wl2.id')
                ->leftJoin('mst_customers AS C1', 'exp_shipment_entries.shipper_id', '=', 'C1.id')
                ->leftJoin('mst_customers AS C2', 'exp_shipment_entries.consignee_id', '=', 'C2.id')
                ->leftJoin('mst_customers AS C3', 'exp_shipment_entries.agent_id', '=', 'C3.id')
                ->leftJoin('mst_states AS S1', 'exp_shipment_entries.shipper_state_id', '=', 'S1.id')
                ->leftJoin('mst_states AS S2', 'exp_shipment_entries.consignee_state_id', '=', 'S2.id')
                ->leftJoin('mst_zip_codes AS Z1', 'exp_shipment_entries.shipper_zip_code_id', '=', 'Z1.id')
                ->leftJoin('mst_zip_codes AS Z2', 'exp_shipment_entries.consignee_zip_code_id', '=', 'Z2.id')

                ->select(['exp_shipment_entries.*','op1.id AS loading_port_id','op2.id AS unloading_port_id','op1.name AS loading_port_name','op2.name AS unloading_port_name','wl1.id AS location_origin_id','wl2.id AS location_destination_id','wl1.name AS location_origin_name','wl2.name AS location_destination_name', 'mst_carriers.id as carrier_id', 'mst_carriers.name as carrier_name','C1.id as shipper_id','C1.name as shipper_name','C2.id as consignee_id','C2.name as consignee_name', 'C3.id as agent_id','C3.name as agent_name', 'S1.id as shipper_state_id', 'S2.id as consignee_state_id', 'S1.name as shipper_state_name', 'S2.name as consignee_state_name', 'Z1.id as shipper_zip_code_id', 'Z2.id as consignee_zip_code_id', 'Z1.code as shipper_zip_code', 'Z2.code as consignee_zip_code', 'C3.address as agent_address', 'C3.city as agent_city', 'C3.state_id as agent_state_id', 'C3.zip_code_id as agent_zip_code_id', 'C3.country_id as agent_country_id'])
                ->where(function ($query) use ($request) {
                    if ($term = $request->get('term')) {
                        $query->orWhere('shipment_code', 'LIKE', $term . '%');
                    }

                })->take(10)->get();

            $results = [];
            foreach ($shipmentEntries as $shipmentEntry) {
                $results[] = [
                    'id'                => $shipmentEntry->id,
                    'code'              => strtoupper($shipmentEntry->shipment_code),
                    'type'               => $shipmentEntry->shipment_type,
                    'bl_status'         => $shipmentEntry->bl_status,
                    'vessel'               => $shipmentEntry->vessel_name,
                    'voyage'         => $shipmentEntry->voyage_name,
                    'carrier_id'         => $shipmentEntry->carrier_id,
                    'carrier_name'         => $shipmentEntry->carrier_name,
                    'departure'    => $shipmentEntry->departure_date,
                    'arrival'    => $shipmentEntry->arrival_date,

                    'loading_port_id'   => $shipmentEntry->loading_port_id,
                    'unloading_port_id'   => $shipmentEntry->unloading_port_id,
                    'loading_port_name'   => strtoupper($shipmentEntry->loading_port_name),
                    'unloading_port_name'   => strtoupper($shipmentEntry->unloading_port_name),
                    'location_origin_id'   => $shipmentEntry->location_origin_id,
                    'location_destination_id'   => $shipmentEntry->location_destination_id,
                    'location_origin_name'   => strtoupper($shipmentEntry->location_origin_name),
                    'location_destination_name'   => strtoupper($shipmentEntry->location_destination_name),

                    'shipper_id'                => $shipmentEntry->shipper_id,
                    'shipper_name'   => strtoupper($shipmentEntry->shipper_name),
                    'shipper_address'   => strtoupper($shipmentEntry->shipper_address),
                    'shipper_city'   => strtoupper($shipmentEntry->shipper_city),
                    'shipper_phone'   => $shipmentEntry->shipper_phone,
                    'shipper_state_id'   => $shipmentEntry->shipper_state_id,
                    'shipper_state_name'   => $shipmentEntry->shipper_state_name,
                    'shipper_zip_code_id'   => $shipmentEntry->shipper_zip_code_id,
                    'shipper_zip_code'   => $shipmentEntry->shipper_zip_code,

                    'consignee_id'                => $shipmentEntry->consignee_id,
                    'consignee_name'   => strtoupper($shipmentEntry->consignee_name),
                    'consignee_address'   => strtoupper($shipmentEntry->consignee_address),
                    'consignee_city'   => strtoupper($shipmentEntry->consignee_city),
                    'consignee_phone'   => $shipmentEntry->consignee_phone,
                    'consignee_state_id'   => $shipmentEntry->consignee_state_id,
                    'consignee_state_name'   => $shipmentEntry->consignee_state_name,
                    'consignee_zip_code_id'   => $shipmentEntry->consignee_zip_code_id,
                    'consignee_zip_code'   => $shipmentEntry->consignee_zip_code,

                    'agent_id'   => $shipmentEntry->agent_id,
                    'agent_name'   => $shipmentEntry->agent_name,
                    'agent_address'   => $shipmentEntry->agent_address,
                    'agent_city'   => $shipmentEntry->agent_city,
                    'agent_state_id'   => $shipmentEntry->agent_state_id,
                    'agent_zip_code_id'   => $shipmentEntry->agent_zip_code_id,
                    'agent_state_name'   => $shipmentEntry->agent_state_id > 0 ? $shipmentEntry->state->name : "",
                    'agent_zip_code'   => $shipmentEntry->agent_zip_code_id > 0 ? $shipmentEntry->zip_code->code : "",
                    'agent_country_id'   => $shipmentEntry->agent_country_id,
                    'agent_phone'   => $shipmentEntry->agent_phone,
                    'agent_fax'   => $shipmentEntry->agent_fax,
                    'agent_commission_p'   => $shipmentEntry->agent_commission_p,
                    'agent_commission_amount'   => $shipmentEntry->agent_commission_amount,
                    'agent_contact'   => $shipmentEntry->agent_contact,
                    'agent_amount'   => $shipmentEntry->agent_amount,

                ];
            }

            return response()->json($results);
        }
    }

    public function pdf($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $shipment_entry = ShipmentEntry::findOrFail($id);
                return \PDF::loadView('export.oceans.shipment_entries.pdf', compact('shipment_entry'))->stream('SE '.$shipment_entry->shipment_code.'.pdf');
            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }
}
