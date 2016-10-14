<?php

namespace Sass\Http\Controllers\Export\OceanExport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
use Sass\DataTables\Export\Ocean\BillOfLadingDataTable;
use Sass\Http\Controllers\Controller;


class BillOfLadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BillOfLadingDataTable $dataTable)
    {
        return $dataTable->render('export.oceans.bill_of_lading.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('export.oceans.bill_of_lading.create');
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
            $count = BillOfLading::count() + 1;
            $code = str_pad($count, 10, '0', STR_PAD_LEFT);
            $bl = $request->all();
            $bl['bl_code'] = $code;
            $bl['user_create_id'] = Auth::user()->id;
            $bl['user_update_id'] = Auth::user()->id;

            $whr=BillOfLading::create($bl);
           BillOfLadingCargo::saveDetail($whr->id, $bl);
           BillOfLadingCargoDetail::saveDetail($whr->id, $bl);
            BillOfLadingContainer::saveDetail($whr->id, $bl);
            BillOfLadingCharge::saveDetail($whr->id, $bl);
            BillOfLadingTransportation::saveDetail($whr->id, $bl);
            BillOfLadingProTracking::saveDetail($whr->id, $bl);
            BillOfLadingItem::saveDetail($whr->id, $bl);
            BillOfLadingCustomerReference::saveDetail($whr->id, $bl);
            BillOfLadingHazardous::saveDetail($whr->id, $bl);


        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('export.oceans.bill_of_lading.index');
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
        $bill_of_lading = BillOfLading::findOrFail($id);
        return view('export.oceans.bill_of_lading.edit', compact('bill_of_lading'));
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
            $bill_of_lading = $request->all();
            $sent = BillOfLading::findOrFail($id);
            $whr = $sent->update($bill_of_lading);
            $bill_of_lading['user_update_id'] = Auth::user()->id;
            BillOfLadingCargo::saveDetail($id, $bill_of_lading);
            BillOfLadingCargoDetail::saveDetail($id, $bill_of_lading);
            BillOfLadingContainer::saveDetail($id, $bill_of_lading);
            BillOfLadingCharge::saveDetail($id, $bill_of_lading);
            BillOfLadingTransportation::saveDetail($id, $bill_of_lading);
            BillOfLadingProTracking::saveDetail($id, $bill_of_lading);
            BillOfLadingItem::saveDetail($id, $bill_of_lading);
            BillOfLadingCustomerReference::saveDetail($id, $bill_of_lading);
            BillOfLadingHazardous::saveDetail($id, $bill_of_lading);


        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.oceans.bill_of_lading.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill_lading = BillOfLading::find($id);
        $bill_lading->delete();
        $bill_lading_cargo= DB::table('exp_bill_of_lading_cargo')->where('bill_of_lading_id', '=', $id)->delete();
        $bill_lading_cargo_details= DB::table('exp_bill_of_lading_cargo_details')->where('bill_of_lading_id', '=', $id)->delete();
        $bill_lading_container= DB::table('exp_bill_of_lading_container')->where('bill_of_lading_id', '=', $id)->delete();
        $bill_lading_charge= DB::table('exp_bill_of_lading_charge')->where('bill_of_lading_id', '=', $id)->delete();
        $bill_lading_hazardous= DB::table('exp_bill_of_lading_hazardous_details')->where('bill_of_lading_id', '=', $id)->delete();
        $bill_lading_transportation= DB::table('exp_bill_of_lading_transportation')->where('bill_of_lading_id', '=', $id)->delete();
        $bill_lading_pro_tracking= DB::table('exp_bill_of_lading_pro_tracking')->where('bill_of_lading_id', '=', $id)->delete();
        $bill_lading_item= DB::table('exp_bill_of_lading_items')->where('bill_of_lading_id', '=', $id)->delete();
        $bill_lading_customer_reference= DB::table('exp_bill_of_lading_customer_references')->where('bill_of_lading_id', '=', $id)->delete();


    }
}
