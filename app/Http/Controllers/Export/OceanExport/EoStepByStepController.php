<?php

namespace Sass\Http\Controllers\Export\OceanExport;

use Illuminate\Http\Request;

use Sass\EoBillOfLading;
use Sass\EoBillOfLadingCargo;
use Sass\EoBillOfLadingCargoDetail;
use Sass\EoBillOfLadingCharge;
use Sass\EoBillOfLadingContainer;
use Sass\EoBillOfLadingCustomerReference;
use Sass\EoBillOfLadingHazardous;
use Sass\EoBillOfLadingItem;
use Sass\EoBillOfLadingProTracking;
use Sass\EoBillOfLadingTransportation;
use Sass\BookingEntry;
use Sass\BookingEntryCargo;
use Sass\BookingEntryCargoDetail;
use Sass\BookingEntryCharge;
use Sass\BookingEntryContainer;
use Sass\BookingEntryHazardous;
use Sass\EoCargoLoader;
use Sass\EoCargoLoaderCargo;
use Sass\EoCargoLoaderCargoDetail;
use Sass\EoCargoLoaderContainer;
use Sass\EoCargoLoaderHazardous;
use Sass\EoCargoLoaderReceiptEntry;
use Sass\EoShipmentEntryContainer;
use Sass\EoShipmentEntryHazardous;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Sass\ReceiptEntry;
use Sass\ReceiptEntryCargoDetail;
use Sass\EoShipmentEntry;


class EoStepByStepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('export.oceans.step_by_step.create');
        return view('export.oceans.step_by_step.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('export.oceans.step_by_step.create', compact('user_open_id'));
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
            $data['user_open_id'] = 0;
            $data['place_receipt'] = $data['place_receipt_name'];
            $data['place_delivery'] = $data['place_delivery_name'];
            $data['port_unloading'] = $data['port_unloading_name'];
            $data['foreign_port'] = $data['port_unloading_name'];
            $data['port_loading'] = $data['port_loading_name'];

            //=========================================================

            //SHIPMENT ENTRY CODE
            $count = EoShipmentEntry::count() + 1;
            $code= str_pad($count, 6, '0', STR_PAD_LEFT);
            $data['code'] = "EOF-".$code;
            $shipment_id= EoShipmentEntry::create($data);
            $data['shipment_id']= $shipment_id->id;
            EoShipmentEntryContainer::saveDetail($shipment_id->id, $data);
            EoShipmentEntryHazardous::saveDetail($shipment_id->id, $data);

            //CARGO LOADER
            $count = EoCargoLoader::count() + 1;
            $code= str_pad($count, 6, '0', STR_PAD_LEFT);
            $data['code'] = "EOG-".$code;
            $cl= EoCargoLoader::create($data);
            $data['cargo_loader_id']= $cl->id;
            EoCargoLoaderContainer::saveDetail($cl->id, $data);
            ReceiptEntry::saveDetail($cl->id,$data);
            EoCargoLoaderReceiptEntry::saveDetail($cl->id, $data);


            // BILL OF LADING (MBL)
            $count = EoBillOfLading::count() + 1;
            $bill_of_lading_code= str_pad($count, 6, '0', STR_PAD_LEFT);
            $data['code'] = "MBL-".$bill_of_lading_code;
            $bl= EoBillOfLading::create($data);
            //EoBillOfLadingCargo::saveDetail($bl->id, $data);
            EoBillOfLadingCharge::saveDetail($bl->id, $data);
            EoBillOfLadingContainer::saveDetail($bl->id, $data);


            //BILL OF LADING (HBLs)
            $data['bill_of_lading_id']= $bl->id;
            EoBillOfLading::saveDetail($cl->id, $data);

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
