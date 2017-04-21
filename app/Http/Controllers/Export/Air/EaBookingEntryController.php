<?php

namespace Sass\Http\Controllers\Export\Air;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Sass\CarrierAwbDetail;
use Sass\DataTables\Export\Air\EaBookingEntryDataTable;
use Sass\EaBookingEntry;
use Sass\EaShipmentEntry;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;

class EaBookingEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EaBookingEntryDataTable $dataTable)
    {
        return $dataTable->render('export.air.booking_entries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('export.air.booking_entries.create', compact('user_open_id'));
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
            $booking_entries = $request->all();

            $type = ($booking_entries['shipment_type'] == 'C' ? 'EAC' : 'EAD');
            $last = EaShipmentEntry::orderBy('code','desc')->where('code', 'LIKE', $type.'%') ->first();
            $frmt = $last == null ? 1 : intval(substr($last->code, 4)) + 1;
            $code = str_pad($frmt, 6, '0', 0);
            $code = $type.'-'.$code;

            $booking_entries['user_create_id'] = Auth::user()->id;
            $booking_entries['user_update_id'] = Auth::user()->id;
            $booking_entries['user_open_id'] = Auth::user()->id;

            $id=EaBookingEntry::create($booking_entries)->id;
            $inputs = ['code' => $code,'status' => '0', 'booking_id' => $id, 'user_create_id' => $booking_entries['user_create_id'], 'user_update_id' => $booking_entries['user_update_id']];
            $shipment_id = EaShipmentEntry::create($inputs)->id;
            EaBookingEntry::where('id', $id)->update(['shipment_id' => $shipment_id]);
            CarrierAwbDetail::where('id', $booking_entries['awb_number_id'])->update(['awb_status' => '2', 'file_number'=> $code]);
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.air.booking_entries.edit', [$id]);
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
        $booking_entries= EaBookingEntry::findOrFail($id);
        $user_open_id =  ($booking_entries->user_open_id == 0) ? Auth::user()->id : $booking_entries->user_open_id;
        $booking_entries = self::updateOpenStatus($booking_entries);
        $booking_entries->save();
        return view('export.air.booking_entries.edit', compact('booking_entries', 'user_open_id'));
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
            $booking_entries = $request->all();
            $booking_entries['user_update_id'] = Auth::user()->id;
            $sent = EaBookingEntry::findorfail($id);
            $sent->update($booking_entries);
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.air.booking_entries.edit', [$id]);
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

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $booking_entries = EaBookingEntry::findOrFail($id);
            if (Auth::user()->id == $booking_entries->user_open_id)
            {

                $booking_entries = self::updateCloseStatus($booking_entries);
                $booking_entries->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $booking_entries = EaBookingEntry::findOrFail($data['id']);
        return [
            'id'   => $booking_entries->user_open_id,
            'name' => $booking_entries->user_open_id > 0 ? $booking_entries->user_open->name : '',
        ];
    }

    public function autocomplete(Request $request){
        if ($request->ajax()) {
            $booking_entries = EaShipmentEntry::where(function ($query) use ($request) {
                $query->where('ea_shipment_entries.id', $request->get('id'));
                $query->where('ea_shipment_entries.status', '0');
            })->get();
            $results = [];
            foreach ($booking_entries as $data) {
                $results[] = [
                    'id' => $data->id,
                    'booking_id' => $data->booking_id,
                    'booking_code' => $data->booking->code,
                    'origin_id' => $data->booking->origin_id,
                    'origin_name' => $data->booking->origin_id >0 ? $data->booking->origin->name : "",
                    'destination_id' => $data->booking->destination_id,
                    'destination_name' => $data->booking->destination_id >0 ? $data->booking->destination->name : "",
                    'carrier_id' => $data->booking->carrier_id,
                    'carrier_name' => $data->booking->carrier_id >0 ? $data->booking->carrier->name : "",
                    'flight' => $data->booking->first_flight,
                    'shipment_type' => $data->booking->shipment_type,
                    'arrival_date' => $data->booking->arrival_date,
                    'departure_date' => $data->booking->departure_date,
                    'agent_id' => $data->booking->agent_id,
                    'agent_name' => $data->booking->agent_id >0 ? $data->booking->agent->name : "",

                    'shipper_id' => $data->booking->shipper_id,
                    'shipper_name' => $data->booking->shipper_id >0 ? $data->booking->shipper->name : "",
                    'shipper_address' => strtoupper($data->booking->shipper_address),
                    'shipper_city' => strtoupper($data->booking->shipper_city),
                    'shipper_state_id' => $data->booking->shipper_state_id,
                    'shipper_state_name' => $data->booking->shipper_state_id >0 ? $data->booking->shipper_state->name : "",
                    'shipper_zip_code_id' => $data->booking->shipper_zip_code_id,
                    'shipper_zip_code' => $data->booking->shipper_zip_code_id >0 ? $data->booking->shipper_zip_code->code : "",

                    'consignee_id' => $data->booking->consignee_id,
                    'consignee_name' => $data->booking->consignee_id >0 ? $data->booking->consignee->name : "",
                    'consignee_address' => strtoupper($data->booking->consignee_address),
                    'consignee_city' => strtoupper($data->booking->consignee_city),
                    'consignee_state_id' => $data->booking->consignee_state_id,
                    'consignee_state_name' => $data->booking->consignee_state_id >0 ? $data->booking->consignee_state->name : "",
                    'consignee_zip_code_id' => $data->booking->consignee_zip_code_id,
                    'consignee_zip_code' => $data->booking->consignee_zip_code_id >0 ? $data->booking->consignee_zip_code->code : "",

                ];

            }
            return response()->json($results);
        }
    }

    public function report(Request $request) {
        $id = $request->get('_id');
        $type = $request->get('_type');
        $booking_entry = null;

        try {
            $booking_entry = EaBookingEntry::findOrFail($id);

        } catch (ModelNotFoundException $e) {
            abort(404);
        }
        switch ($type) {
            case 1:
                return \PDF::loadView('export.air.booking_entries.manifest', compact('booking_entry', 'type'))
                    ->setOrientation('landscape')->stream($booking_entry->code.'.pdf');
                break;
            case 2:
                return \PDF::loadView('export.air.booking_entries.manifest', compact('booking_entry', 'type'))->setOrientation('landscape')->stream($booking_entry->code.'.pdf');
                break;
            case 3:
                return \PDF::loadView('export.air.booking_entries.resume', compact('booking_entry'))->stream($booking_entry->code.'.pdf');
                break;
            case 4:
                return \PDF::loadView('export.air.booking_entries.resume2', compact('booking_entry'))->stream($booking_entry->code.'.pdf');
                break;
            case 5:
                return \PDF::loadView('export.air.booking_entries.manifest_original', compact('booking_entry'))->setOrientation('landscape')->stream($booking_entry->code.'.pdf');
                //return view('export.air.booking_entries.manifest_original', compact('booking_entry'));
                break;

            default:
                $response = [''];
        }

        return response()->json($response);
    }


    public function booking_calendar(){
        $groups = EaBookingEntry::join('mst_airports as a1', 'ea_booking_entries.origin_id', '=', 'a1.id')
            ->join('mst_airports as a2', 'ea_booking_entries.destination_id', '=', 'a2.id')
            ->select(['ea_booking_entries.code', 'ea_booking_entries.arrival_date', 'ea_booking_entries.departure_date', 'ea_booking_entries.first_flight',  'a1.name AS origin_name', 'a2.name AS destination_name'])
           ->get();
        $result = [];
        foreach ($groups as $group) {
            $result[]=[
                'title'=>'BO#: '.$group->code,
                'flight' => 'FLIGHT: '.$group->first_flight,
                'start' => $group->departure_date,
                'end' => $group->arrival_date,
            ];
        }
        return response()->json($result);

    }
}
