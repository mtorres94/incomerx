<?php

namespace Sass\Http\Controllers\Export\OceanExport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Sass\EoBillOfLading;
use Sass\EoBillOfLadingCargo;
use Sass\DataTables\Export\Ocean\ShipmentEntryDataTable;
use Sass\EoBookingContainer;
use Sass\EoBookingEntry;
use Sass\EoShipmentEntry;

use Sass\EoShipmentEntryHazardous;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;


class EoShipmentEntryController extends Controller
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
        $user_open_id = Auth::user()->id;
        return view('export.oceans.shipment_entries.create', compact('user_open_id'));
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
            // ---- SHIPMENT ENTRY ----
            /*$count = EoShipmentEntry::count() + 1;
            $code= str_pad($count, 6, '0', STR_PAD_LEFT);*/

            $last = EoShipmentEntry::orderBy('id','desc')->first();
            $frmt=  $last == null ? 1 : intval(substr($last->code,0,-3)) + 1 ;
            $code = $frmt."/". substr(date('Y'), 2);

            $shipment_entry = $request->all();

            $shipment_entry['code']= $code;
            $shipment_entry['user_create_id'] = Auth::user()->id;
            $shipment_entry['user_update_id'] = Auth::user()->id;
            $shipment_entry['user_open_id'] = Auth::user()->id;
            $exp=EoShipmentEntry::create($shipment_entry);
            //EoShipmentEntryContainer::saveDetail($exp->id, $shipment_entry);
            $id= $exp->id;


        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.oceans.shipment_entries.edit', [$id]);
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
        $shipment_entry = EoShipmentEntry::findOrFail($id);
        $user_open_id =  ($shipment_entry->user_open_id == 0) ? Auth::user()->id : $shipment_entry->user_open_id;
        $shipment_entry = self::updateOpenStatus($shipment_entry);
        $shipment_entry->save();
        return view('export.oceans.shipment_entries.edit', compact('shipment_entry', 'user_open_id'));
    }


    public function update(Request $request, $id)
    {

        DB::beginTransaction();
        try {
            $shipment_entry = $request->all();
            $sent = EoShipmentEntry::findorfail($id);
            $shipment['user_update_id'] = Auth::user()->id;
            $sent->update($shipment_entry);

            EoBookingEntry::saveDetail($id, $request->only(['booking_code', 'exists']));

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.oceans.shipment_entries.edit', [$id]);
    }


    public function destroy($id)
    {
        $shipment = EoShipmentEntry::find($id);
        $shipment->delete();
    }

    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $shipmentEntries = EoShipmentEntry::leftJoin('mst_carriers', 'eo_shipment_entries.carrier_id', '=', 'mst_carriers.id')
                ->leftJoin('mst_ocean_ports AS op2', 'eo_shipment_entries.port_unloading_id', '=', 'op2.id')
                ->leftJoin('mst_ocean_ports AS op1', 'eo_shipment_entries.port_loading_id', '=', 'op1.id')
                ->leftJoin('mst_world_locations AS wl1', 'eo_shipment_entries.place_receipt_id', '=', 'wl1.id')
                ->leftJoin('mst_world_locations AS wl2', 'eo_shipment_entries.place_delivery_id', '=', 'wl2.id')
                ->leftJoin('mst_customers AS C1', 'eo_shipment_entries.shipper_id', '=', 'C1.id')
                ->leftJoin('mst_customers AS C2', 'eo_shipment_entries.consignee_id', '=', 'C2.id')
                ->leftJoin('mst_customers AS C3', 'eo_shipment_entries.agent_id', '=', 'C3.id')
                ->leftJoin('mst_customers AS C4', 'eo_shipment_entries.forwarding_agent_id', '=', 'C4.id')
                ->leftJoin('mst_customers AS C5', 'eo_shipment_entries.notify_id', '=', 'C5.id')
                ->leftJoin('mst_states AS S1', 'eo_shipment_entries.shipper_state_id', '=', 'S1.id')
                ->leftJoin('mst_states AS S2', 'eo_shipment_entries.consignee_state_id', '=', 'S2.id')
                ->leftJoin('mst_states AS S3', 'eo_shipment_entries.notify_state_id', '=', 'S3.id')
                ->leftJoin('mst_states AS S4', 'eo_shipment_entries.state_of_origin_id', '=', 'S4.id')
                ->leftJoin('mst_zip_codes AS Z1', 'eo_shipment_entries.shipper_zip_code_id', '=', 'Z1.id')
                ->leftJoin('mst_zip_codes AS Z2', 'eo_shipment_entries.consignee_zip_code_id', '=', 'Z2.id')
                ->leftJoin('mst_zip_codes AS Z3', 'eo_shipment_entries.notify_zip_code_id', '=', 'Z3.id')

                ->select(['eo_shipment_entries.*', 'op1.id AS loading_port_id','op2.id AS unloading_port_id','op1.name AS loading_port_name','op2.name AS unloading_port_name','wl1.id AS location_origin_id','wl2.id AS location_destination_id','wl1.name AS location_origin_name','wl2.name AS location_destination_name', 'mst_carriers.id as carrier_id', 'mst_carriers.name as carrier_name','C1.id as shipper_id','C1.name as shipper_name','C2.id as consignee_id','C2.name as consignee_name', 'C3.id as agent_id','C3.name as agent_name', 'C4.id as forwarding_agent_id','C4.name as forwarding_agent_name', 'S1.id as shipper_state_id', 'S2.id as consignee_state_id', 'S1.name as shipper_state_name', 'S2.name as consignee_state_name', 'S3.name as notify_state_name', 'S4.id as state_of_origin_id', 'S4.name as state_of_origin_name', 'Z1.id as shipper_zip_code_id', 'Z2.id as consignee_zip_code_id','Z3.id as notify_zip_code_id', 'Z1.code as shipper_zip_code', 'Z2.code as consignee_zip_code', 'Z3.code as notify_zip_code', 'C3.address as agent_address', 'C3.city as agent_city','C5.city as notify_agent_city', 'C3.state_id as agent_state_id', 'C5.state_id as notify_state_id', 'C5.name as notify_name',  'C3.zip_code_id as agent_zip_code_id', 'C3.country_id as agent_country_id'])
                ->where(function ($query) use ($request) {
                    if ($id = $request->get('id')) {
                        $query->where('eo_shipment_entries.id',  $id );
                        $query->where('eo_shipment_entries.status', 'O');
                    }

                })->get();

            $results = [];
            foreach ($shipmentEntries as $shipmentEntry) {
                $results[] = [
                    'id'                => $shipmentEntry->id,
                    'code'              => strtoupper($shipmentEntry->code),
                    'type'               => $shipmentEntry->shipment_type,
                    'bl_status'         => $shipmentEntry->status,
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

                    'notify_id'                => $shipmentEntry->notify_id,
                    'notify_name'   => strtoupper($shipmentEntry->notify_name),
                    'notify_address'   => strtoupper($shipmentEntry->notify_address),
                    'notify_city'   => strtoupper($shipmentEntry->notify_city),
                    'notify_phone'   => $shipmentEntry->notify_phone,
                    'notify_state_id'   => $shipmentEntry->notify_state_id,
                    'notify_state_name'   => $shipmentEntry->notify_state_name,
                    'notify_zip_code_id'   => $shipmentEntry->notify_zip_code_id,
                    'notify_zip_code'   => $shipmentEntry->notify_zip_code,

                    'notify_contact'   => $shipmentEntry->notify_contact,
                    'notify_contact_phone'   => $shipmentEntry->notify_contact_phone,
                    'forwarding_agent_id'   => $shipmentEntry->forwarding_agent_id,
                    'forwarding_agent_name'   => $shipmentEntry->forwarding_agent_name,
                    'domestic_routing'   => $shipmentEntry->domestic_routing,
                    'booking_code'   => $shipmentEntry->booking_code,
                    'state_of_origin_id'   => $shipmentEntry->state_of_origin_id,
                    'state_of_origin_name'   => $shipmentEntry->state_of_origin_name,

                    'agent_id'   => $shipmentEntry->agent_id,
                    'agent_name'   => $shipmentEntry->agent_name,
                    'agent_address'   => $shipmentEntry->agent_address,

                    'agent_phone'   => $shipmentEntry->agent_phone,
                    'agent_fax'   => $shipmentEntry->agent_fax,
                    'agent_commission_p'   => $shipmentEntry->agent_commission_p,
                    'agent_commission_amount'   => $shipmentEntry->agent_commission_amount,
                    'agent_contact'   => $shipmentEntry->agent_contact,
                    'agent_amount'   => $shipmentEntry->agent_amount,

                    'inland_carrier_id'   => $shipmentEntry->inland_carrier_id,
                    'inland_carrier_name'   => strtoupper($shipmentEntry->inland_carrier_id > 0 ? $shipmentEntry->inland_carrier->name : ""),
                    'inland_lic_number'   => strtoupper($shipmentEntry->inland_lic_number),

                    'booked_date'   => strtoupper($shipmentEntry->booked_date),
                    'loading_date'   => strtoupper($shipmentEntry->loading_date),
                    'equipment_cut_off_date'   => strtoupper($shipmentEntry->equipment_cut_off_date),
                    'documents_cut_off_date'   => strtoupper($shipmentEntry->documents_cut_off_date),
                    'total_cargo_type_id' => $shipmentEntry->total_cargo_type_id
                ];
            }

            return response()->json($results);
        }
    }

    public function get_booking(Request $request)
    {
        if ($request->ajax()) {
            $booking_numbers = EoBookingEntry::select(['eo_booking_entries.*'])->where(function ($query) use ($request) {
                $shipment_id = $request->get('id');
                $query->where('eo_booking_entries.shipment_id', '=', $shipment_id);
                $query->where('eo_booking_entries.status', '0');
            })->get();
            $results = [];
            foreach ($booking_numbers as $booking) {
                $results[] = [
                    'id' => $booking->id,
                    'code' => $booking->code,
                ];
            }
            return response()->json($results);
        }
    }

    public function get(Request $request)
    {
        if ($request->ajax()) {
            $containers = EoBookingContainer::select(['eo_booking_container.*'])
                ->where(function ($query) use ($request) {
                    $id = $request->get('id');
                    $query->where('eo_booking_container.shipment_id', '=', $id );
                })->get();

            $results = [];
            foreach ($containers as $container) {
                $results[] = [
                    'id' => $container->id,
                    'code' => $container->shipment->code,
                    'equipment_type_id'                 => $container->equipment_type_id,
                    'equipment_type_code'               => ($container->equipment_type_id>0 ? $container->equipment_type->code :""),
                    'container_number'                  => $container->container_number,
                    'container_seal_number'             => $container->container_seal_number,
                    'container_seal_number2'            => $container->container_seal_number2,

                     'total_weight_unit'=> $container->total_weight_unit,
                 'container_commodity_id'=> $container->container_commodity_id,
                 'container_commodity_name'=> ($container->container_commodity_id >0 ? $container->container_commodity->name : ""),
                 'pd_status'=> $container->pd_status,
                 'pull_date'=> $container->pull_date,
                 'spotting_date'=> $container->spotting_date,
                 'carrier_id'=> $container->carrier_id,
                 'carrier_name'=> strtoupper($container->carrier_id >0 ? $container->carrier->name : ""),
                 'ventilation'=> $container->ventilation,
                 'temperature'=> $container->temperature,
                 'degrees'=> $container->degrees,
                 'temperature_max'=> $container->temperature_max,
                 'temperature_min'=> $container->temperature_min,

                 'pickup_id'=> $container->pickup_id,
                 'pickup_name'=> strtoupper($container->pickup_id >0 ? $container->pickup->name : ""),
                 'pickup_type'=> $container->pickup_type,
                 'pickup_address'=> $container->pickup_address,
                 'pickup_city'=> $container->pickup_city,
                 'pickup_state_id'=> $container->pickup_state_id,
                 'pickup_state_name'=> strtoupper($container->pickup_state_id >0 ? $container->pickup_state->name : ""),
                 'pickup_zip_code_id'=> $container->pickup_zip_code_id,
                 'pickup_zip_code'=> ($container->pickup_zip_code_id > 0 ? $container->pickup_zip_code->code : ""),
                 'pickup_phone'=> $container->pickup_phone,
                 'pickup_contact'=> $container->pickup_contact,
                 'pickup_number'=> $container->pickup_number,

                 'delivery_id'=> $container->delivery_id,
                 'delivery_name'=> ($container->delivery_id >0 ? $container->delivery->name :""),
                 'delivery_type'=> $container->delivery_type,
                 'delivery_address'=> $container->delivery_address,
                 'delivery_city'=> $container->delivery_city,
                 'delivery_state_id'=> $container->delivery_state_id,
                 'delivery_state_name'=> ($container->delivery_state_id > 0 ? $container->delivery_state->name : ""),
                 'delivery_zip_code_id'=> $container->delivery_zip_code_id,
                 'delivery_zip_code'=> ($container->delivery_zip_code_id >0 ? $container->delivery_zip_code->code : ""),
                 'delivery_phone'=> $container->delivery_phone,
                 'delivery_contact'=> $container->delivery_contact,
                 'delivery_date'=> $container->delivery_date,
                 'delivery_number'=> $container->delivery_number,

                 'drop_id'=> $container->drop_id,
                 'drop_name'=> strtoupper($container->drop_id > 0? $container->drop->name: ""),
                 'drop_type'=> $container->drop_type,
                 'drop_address'=> $container->drop_address,
                 'drop_city'=> $container->drop_city,
                 'drop_state_id'=> $container->drop_state_id,
                 'drop_state_name'=> strtoupper($container->drop_state_id >0 ? $container->drop_state->name : ""),
                 'drop_zip_code_id'=> $container->drop_zip_code_id,
                 'drop_zip_code'=> ($container->drop_zip_code_id >0 ? $container->drop_zip_code->code : ""),
                 'drop_phone'=> $container->drop_phone,
                 'drop_contact'=> $container->drop_contact,
                 'drop_date'=> $container->drop_date,
                 'drop_number'=> $container->drop_number,

                 'hazardous_contact'=> $container->hazardous_contact,
                 'hazardous_phone'=> $container->hazardous_phone,
                 'inner_code'=> $container->inner_code,
                 'inner_quantity'=> $container->inner_quantity,
                 'net_weight'=> $container->net_weight,
                 'number_equipment'=> $container->number_equipment,
                 'outer_code'=> $container->outer_code,
                 'outer_quantity'=> $container->outer_quantity,
                 'release_number'=> $container->release_number,
                 'requested_equipment'=> $container->requested_equipment,
                 'tare_weight'=> $container->tare_weight,
                 'container_comments'=> $container->container_comments,
                ];
            }
            return response()->json($results);
        }
    }

    public function report(Request $request) {
        $id = $request->get('_id');
        $type = $request->get('_type');
        $shipment_entry = null;

        try {
            $shipment_entry = EoShipmentEntry::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        switch ($type) {
            case 1:
                return \PDF::loadView('export.oceans.shipment_entries.pdf', compact('shipment_entry'))->stream($shipment_entry->code.'.pdf');

                break;
            case 2:
                return \PDF::loadView('export.oceans.shipment_entries.container_release', compact('shipment_entry'))->stream($shipment_entry->code.'.pdf');
                break;
            case 3:
                return \PDF::loadView('export.oceans.shipment_entries.ocean_manifest', compact('shipment_entry'))->setOrientation('landscape')->stream($shipment_entry->code.'.pdf');
                break;
            default:
                $response = [''];
        }

        return response()->json($response);
    }
    public function pdf($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $shipment_entry= EoShipmentEntry::findOrFail($id);
                return \PDF::loadView('export.oceans.shipment_entries.pdf', compact('shipment_entry'))->stream('BC '.$shipment_entry->booking_code.'.pdf');

            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

    public function container_release($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $shipment_entry= EoShipmentEntry::findOrFail($id);
                return \PDF::loadView('export.oceans.shipment_entries.container_release', compact('shipment_entry'))->stream($shipment_entry->booking_code.'.pdf');
            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }
    public function manifest($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $shipment_entry= EoShipmentEntry::findOrFail($id);

                return \PDF::loadView('export.oceans.shipment_entries.ocean_manifest', compact('shipment_entry'))
                    ->setOrientation('landscape')
                    ->stream($shipment_entry->code.'.pdf');
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
            $shipment_entry = EoShipmentEntry::findOrFail($id);
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
        $shipment_entry = EoShipmentEntry::findOrFail($data['id']);
        return [
            'id'   => $shipment_entry->user_open_id,
            'name' => $shipment_entry->user_open_id > 0 ? $shipment_entry->user_open->name : '',
        ];
    }


}
