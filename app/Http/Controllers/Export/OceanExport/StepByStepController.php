<?php

namespace Sass\Http\Controllers\Export\OceanExport;

use Illuminate\Http\Request;

use Sass\BillOfLading;
use Sass\BillOfLadingCargo;
use Sass\BillOfLadingCargoDetail;
use Sass\BillOfLadingCharge;
use Sass\BillOfLadingContainer;
use Sass\BillOfLadingCustomerReference;
use Sass\BillOfLadingHazardous;
use Sass\BillOfLadingItem;
use Sass\BillOfLadingProTracking;
use Sass\BillOfLadingTransportation;
use Sass\BookingEntry;
use Sass\BookingEntryCargo;
use Sass\BookingEntryCargoDetail;
use Sass\BookingEntryCharge;
use Sass\BookingEntryContainer;
use Sass\BookingEntryHazardous;
use Sass\CargoLoader;
use Sass\CargoLoaderCargo;
use Sass\CargoLoaderCargoDetail;
use Sass\CargoLoaderContainer;
use Sass\CargoLoaderHazardous;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Sass\ReceiptEntry;
use Sass\ReceiptEntryCargoDetail;
use Sass\ShipmentEntry;
use Sass\StepByStepBillOfLadingCargoDetail;
use Sass\StepByStepBookingEntryCargoDetail;
use Sass\StepByStepCargoLoaderContainer;

class StepByStepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('export.oceans.step_by_step.create');
        return view('export.oceans.step_by_step.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('export.oceans.step_by_step.create');
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

            $data = $request->all();
            $data['user_create_id'] = Auth::user()->id;
            $data['user_update_id'] = Auth::user()->id;
            //=========================================================

            //SHIPMENT ENTRY CODE
            $count = ShipmentEntry::count() + 1;
            $shipment_code= str_pad($count, 10, '0', STR_PAD_LEFT);
            $data['shipment_code'] = $shipment_code;

            //BOOKING ENTRY CODE
            $count = BookingEntry::count() + 1;
            $booking_code= str_pad($count, 10, '0', STR_PAD_LEFT);
            $data['booking_code'] = $booking_code;

            //BILL OF LADING ENTRY CODE
            $count = BillOfLading::count() + 1;
            $bill_of_lading_code= str_pad($count, 10, '0', STR_PAD_LEFT);
            $data['bl_code'] = $bill_of_lading_code;
            //=========================================================

            $shipment_id= ShipmentEntry::create($data);
            $data['shipment_id']= $shipment_id->id;

            $count = CargoLoader::count() + 1;
            $cargo_load_code= str_pad($count, 10, '0', STR_PAD_LEFT);
            $data['cargo_load_code'] = $cargo_load_code;
            $cl= CargoLoader::create($data);
            $data['cargo_loader_id']= $cl->id;

            ReceiptEntry::saveDetail($cl->id , $data);

            CargoLoaderCargo::saveDetail($cl->id, $data);
            CargoLoaderContainer::saveDetailStepByStep($cl->id, $data);
            CargoLoaderCargoDetail::saveDetail($cl->id,$data);
            CargoLoaderHazardous::saveDetail($cl->id, $data);

            $booking_entry= BookingEntry::create($data);
            $data['booking_id']= $booking_entry->id;
            $data['booking_entry_id']= $booking_entry->id;
            BookingEntryHazardous::saveDetail($booking_entry->id, $data);
            BookingEntryCargo::saveDetailStepByStep($booking_entry->id,$data);
            BookingEntryCargoDetail::saveDetailStepByStep($booking_entry->id,$data);
            BookingEntryCharge::saveDetail($booking_entry->id,$data);
            BookingEntryContainer::saveDetail($booking_entry->id,$data);

            $bill_of_lading= BillOfLading::create($data);
            BillOfLadingCargo::saveDetailStepByStep($bill_of_lading->id, $data);
            BillOfLadingCharge::saveDetail($bill_of_lading->id, $data);
            BillOfLadingContainer::saveDetail($bill_of_lading->id, $data);
            BillOfLadingCustomerReference::saveDetail($bill_of_lading->id, $data);
            BillOfLadingHazardous::saveDetail($bill_of_lading->id, $data);
            BillOfLadingItem::saveDetail($bill_of_lading->id, $data);
            BillOfLadingProTracking::saveDetail($bill_of_lading->id, $data);
            BillOfLadingTransportation::saveDetail($bill_of_lading->id, $data);
            BillOfLadingCargoDetail::saveDetailStepByStep($bill_of_lading->id, $data);
            DB::commit();
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
        }
        return view('export.oceans.step_by_step.create');

        // return redirect()->route('export.oceans.step_by_step.create');


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
        //
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
        //
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
}
