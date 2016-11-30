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
use Sass\EoCargoLoaderReceiptEntry;
use Sass\EoShipmentEntryContainer;
use Sass\EoShipmentEntryHazardous;
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
            $data['place_receipt'] = $data['place_receipt_name'];
            $data['place_delivery'] = $data['place_delivery_name'];
            $data['port_unloading'] = $data['port_unloading_name'];
            $data['foreign_port'] = $data['port_unloading_name'];
            $data['port_loading'] = $data['port_loading_name'];
            //=========================================================

            //SHIPMENT ENTRY CODE
            $count = ShipmentEntry::count() + 1;
            $code= str_pad($count, 6, '0', STR_PAD_LEFT);
            $data['code'] = "EOF-".$code;
            $shipment_id= ShipmentEntry::create($data);
            $data['shipment_id']= $shipment_id->id;
            EoShipmentEntryContainer::saveDetail($shipment_id->id, $data);
            EoShipmentEntryHazardous::saveDetail($shipment_id->id, $data);

            //CARGO LOADER
            $count = CargoLoader::count() + 1;
            $code= str_pad($count, 6, '0', STR_PAD_LEFT);
            $data['code'] = "EOG-".$code;
            $cl= CargoLoader::create($data);
            $data['cargo_loader_id']= $cl->id;
            CargoLoaderContainer::saveDetail($cl->id, $data);
            ReceiptEntry::saveDetail($cl->id,$data);
            EoCargoLoaderReceiptEntry::saveDetail($cl->id, $data);


            // BILL OF LADING (MBL)
            $count = BillOfLading::count() + 1;
            $bill_of_lading_code= str_pad($count, 6, '0', STR_PAD_LEFT);
            $data['code'] = "MBL-".$bill_of_lading_code;
            $bl= BillOfLading::create($data);
            BillOfLadingCharge::saveDetail($bl->id, $data);


            //BILL OF LADING (HBLs)
            $data['bill_of_lading_id']= $bl->id;
            $bill_of_lading= BillOfLading::saveDetail($cl->id, $data);

            DB::commit();
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
        }
        return view('export.oceans.step_by_step.create');

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
