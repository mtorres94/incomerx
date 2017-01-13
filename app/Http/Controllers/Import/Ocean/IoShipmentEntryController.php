<?php

namespace Sass\Http\Controllers\Import\Ocean;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Import\Ocean\IoShipmentEntryDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\IoShipmentEntry;
use Sass\IoShipmentEntryContainer;

class IoShipmentEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IoShipmentEntryDataTable $dataTable)
    {
        return $dataTable->render('import.oceans.shipment_entries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('import.oceans.shipment_entries.create', compact ('user_open_id'));
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
            $count = IoShipmentEntry::count() + 1;
            $code= str_pad($count, 10, '0', STR_PAD_LEFT);
            $shipment_entry = $request->all();
            $shipment_entry['code']=$code;
            $shipment_entry['user_create_id'] = Auth::user()->id;
            $shipment_entry['user_update_id'] = Auth::user()->id;

            $imp=IoShipmentEntry::create($shipment_entry);
            IoShipmentEntryContainer::saveDetail($imp->id,$shipment_entry);
            $id= $imp->id;
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('import.oceans.shipment_entries.edit', [$id]);
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
        $shipment_entry = IoShipmentEntry::findOrFail($id);
        $user_open_id =  ($shipment_entry->user_open_id == 0) ? Auth::user()->id : $shipment_entry->user_open_id;

        $shipment_entry = self::updateOpenStatus($shipment_entry);
        $shipment_entry->save();
        
        return view('import.oceans.shipment_entries.edit', compact('shipment_entry', 'user_open_id'));
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
            $shipment = $request->all();
            $sent = IoShipmentEntry::findorfail($id);
            $imp = $sent->update($shipment);
            $shipment['user_update_id'] = Auth::user()->id;
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('import.oceans.shipment_entries.edit', [$id]);
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
    public function autocomplete_import(Request $request)
    {
        if ($request->ajax()) {
            $shipmentEntries = IoShipmentEntry::leftJoin('mst_carriers', 'io_shipment_entries.carrier_id', '=', 'mst_carriers.id')
                ->leftJoin('mst_ocean_ports AS op2', 'io_shipment_entries.port_unloading_id', '=', 'op2.id')
                ->leftJoin('mst_ocean_ports AS op1', 'io_shipment_entries.port_loading_id', '=', 'op1.id')
                ->leftJoin('mst_world_locations AS wl1', 'io_shipment_entries.place_receipt_id', '=', 'wl1.id')
                ->leftJoin('mst_world_locations AS wl2', 'io_shipment_entries.place_delivery_id', '=', 'wl2.id')
                ->leftJoin('mst_customers AS C1', 'io_shipment_entries.shipper_id', '=', 'C1.id')
                ->leftJoin('mst_customers AS C2', 'io_shipment_entries.consignee_id', '=', 'C2.id')
                ->leftJoin('mst_customers AS C3', 'io_shipment_entries.agent_id', '=', 'C3.id')
                ->leftJoin('mst_customers AS C4', 'io_shipment_entries.location_id', '=', 'C4.id')
                ->leftJoin('mst_customers AS C5', 'io_shipment_entries.broker_id', '=', 'C5.id')
                ->leftJoin('mst_states AS S1', 'io_shipment_entries.shipper_state_id', '=', 'S1.id')
                ->leftJoin('mst_states AS S2', 'io_shipment_entries.consignee_state_id', '=', 'S2.id')
                ->leftJoin('mst_states AS S3', 'io_shipment_entries.location_state_id', '=', 'S3.id')
                ->leftJoin('mst_zip_codes AS Z1', 'io_shipment_entries.shipper_zip_code_id', '=', 'Z1.id')
                ->leftJoin('mst_zip_codes AS Z2', 'io_shipment_entries.consignee_zip_code_id', '=', 'Z2.id')
                ->leftJoin('mst_zip_codes AS Z3', 'io_shipment_entries.location_zip_code_id', '=', 'Z3.id')

                ->select(['io_shipment_entries.*','op1.id AS loading_port_id','op2.id AS unloading_port_id','op1.name AS loading_port_name','op2.name AS unloading_port_name','wl1.id AS location_origin_id','wl2.id AS location_destination_id','wl1.name AS location_origin_name','wl2.name AS location_destination_name', 'mst_carriers.id as carrier_id', 'mst_carriers.name as carrier_name','C1.id as shipper_id','C1.name as shipper_name','C2.id as consignee_id','C2.name as consignee_name', 'C3.id as agent_id','C4.id as location_id','C3.name as agent_name','C4.name as location_name','C5.id as broker_id','C5.name as broker_name', 'S1.id as shipper_state_id', 'S2.id as consignee_state_id', 'S1.name as shipper_state_name', 'S2.name as consignee_state_name','S3.name as location_state_name', 'Z1.id as shipper_zip_code_id', 'Z2.id as consignee_zip_code_id', 'Z1.code as shipper_zip_code', 'Z2.code as consignee_zip_code','Z3.code as location_zip_code', 'C3.address as agent_address', 'C3.city as agent_city', 'C3.state_id as agent_state_id', 'C3.zip_code_id as agent_zip_code_id', 'C3.country_id as agent_country_id'])
                ->where(function ($query) use ($request) {
                    if ($term = $request->get('term')) {
                        $query->orWhere('io_shipment_entries.code', 'LIKE', $term . '%');
                    }

                })->take(10)->get();

            $results = [];
            foreach ($shipmentEntries as $shipmentEntry) {
                $results[] = [
                    'id'                => $shipmentEntry->id,
                    'code'              => strtoupper($shipmentEntry->code),
                    'type'               => $shipmentEntry->shipment_type,

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
                    'consignee_fax'   => $shipmentEntry->consignee_fax,
                    'consignee_state_id'   => $shipmentEntry->consignee_state_id,
                    'consignee_state_name'   => $shipmentEntry->consignee_state_name,
                    'consignee_zip_code_id'   => $shipmentEntry->consignee_zip_code_id,
                    'consignee_zip_code'   => $shipmentEntry->consignee_zip_code,

                    'agent_id'   => $shipmentEntry->agent_id,
                    'agent_name'   => $shipmentEntry->agent_name,

                    'entry_number'      => $shipmentEntry->entry_number,
                    'it_number'        => $shipmentEntry->it_number,
                    'entry_date'        => $shipmentEntry->entry_date,
                    'it_date'           =>$shipmentEntry->it_date,
                    'it_port'           =>$shipmentEntry->it_port,
                    'go_number'         =>$shipmentEntry->go_number,
                    'go_available'      =>$shipmentEntry->go_available,
                    'go_date'           =>$shipmentEntry->go_date,
                    'go_expired_date'   =>$shipmentEntry->go_expired_date,

                    'location_id'                => $shipmentEntry->location_id,
                    'location_name'   => strtoupper($shipmentEntry->location_name),
                    'location_address'   => strtoupper($shipmentEntry->location_address),
                    'location_city'   => strtoupper($shipmentEntry->location_city),
                    'location_state_id'   => $shipmentEntry->location_state_id,
                    'location_state_name'   => strtoupper($shipmentEntry->location_state_name),
                    'location_zip_code_id'   => $shipmentEntry->location_zip_code_id,
                    'location_zip_code'   => $shipmentEntry->location_zip_code,
                    'location_phone'          =>$shipmentEntry->location_phone,
                    'location_fax'          =>$shipmentEntry->location_fax,

                    'broker_id'                 => $shipmentEntry->broker_id,
                    'broker_name'               => strtoupper($shipmentEntry->broker_name),
                    'broker_phone'              =>$shipmentEntry->broker_phone,
                    'broker_contact'            =>$shipmentEntry->broker_contact,
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
            $shipment_entry = IoShipmentEntry::findOrFail($id);
            if (Auth::user()->id == $shipment_entry->user_open_id)
            {

                $shipment_entry = self::updateCloseStatus($shipment_entry);
                $shipment_entry->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $shipment_entry = IoShipmentEntry::findOrFail($data['id']);
        return [
            'id'   => $shipment_entry->user_open_id,
            'name' => $shipment_entry->user_open_id > 0 ? $shipment_entry->user_open->name : '',
        ];
    }

}
