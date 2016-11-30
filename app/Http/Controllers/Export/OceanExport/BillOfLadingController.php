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
                $code = str_pad($count, 6, '0', STR_PAD_LEFT);
                $bl = $request->all();
                $bl['code'] = 'MBL-'.$code;
                $bl['user_create_id'] = Auth::user()->id;
                $bl['user_update_id'] = Auth::user()->id;
                $sum_prepaid =0;
                $sum_collect=0;
                $i=0;
                while (isset($bl['billing_amount'][$i])){

                    if($bl['billing_bill_type'][$i] == 'P' ){ $sum_prepaid += $bl['billing_amount'][$i]; }
                    else{ $sum_collect+= $bl['billing_amount'][$i]; };
                    $i++;
                }
                $bl['sum_prepaid']= $sum_prepaid;
                $bl['sum_collected']= $sum_collect;


                $whr=BillOfLading::create($bl);
                BillOfLadingCargo::saveDetail($whr->id, $bl);
                BillOfLading::updateHBL($whr->id, $bl);
                //BillOfLadingCargoDetail::saveDetail($whr->id, $bl);
                //BillOfLadingContainer::saveDetail($whr->id, $bl);
                BillOfLadingCharge::saveDetail($whr->id, $bl);
              /*  BillOfLadingTransportation::saveDetail($whr->id, $bl);
                BillOfLadingProTracking::saveDetail($whr->id, $bl);
                BillOfLadingItem::saveDetail($whr->id, $bl);
                BillOfLadingCustomerReference::saveDetail($whr->id, $bl);
                BillOfLadingHazardous::saveDetail($whr->id, $bl);*/


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
            $sum_prepaid =0;
            $sum_collect=0;
            $i=0;
            while (isset($bill_of_lading['billing_amount'][$i])){
                if($bill_of_lading['billing_bill_type'][$i] == 'P' ){ $sum_prepaid += $bill_of_lading['billing_amount'][$i]; }
                else{ $sum_collect+= $bill_of_lading['billing_amount'][$i]; };
                $i++;
            }
            $bill_of_lading['sum_prepaid']= $sum_prepaid;
            $bill_of_lading['sum_collected']= $sum_collect;
            $bill_of_lading['user_update_id'] = Auth::user()->id;

            $sent->fill($bill_of_lading);
            dd($bill_of_lading);
            $whr = $sent->update($bill_of_lading);


            BillOfLadingCargo::saveDetail($id, $bill_of_lading);
            BillOfLading::updateHBL($id, $bill_of_lading);

            BillOfLadingCharge::saveDetail($id, $bill_of_lading);
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
    public function pdf($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $bill_of_lading= BillOfLading::findOrFail($id);
                return \PDF::loadView('export.oceans.bill_of_lading.pdf', compact('bill_of_lading'))->stream('B/L-'.$bill_of_lading->code.'.pdf');
                return view('export.oceans.bill_of_lading.pdf', compact('bill_of_lading'));
            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

    public function delivery_order($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $bill_of_lading= BillOfLading::findOrFail($id);
                return \PDF::loadView('export.oceans.bill_of_lading.delivery_order', compact('bill_of_lading'))->stream('DO-'.$bill_of_lading->code.'.pdf');
                return view('export.oceans.bill_of_lading.delivery_order', compact('bill_of_lading'));
            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

    public function get_details(Request $request)
    {
        if ($request->ajax()) {
            $bill_of_lading = BillOfLading::select('exp_bills_of_lading.*')
                ->where(function ($query) use ($request) {
                    $shipment_id = $request->get('id');
                    $query->where('exp_bills_of_lading.shipment_id', '=', $shipment_id);
                    $query->where('exp_bills_of_lading.bl_class', '<=','2');

                })->get();
            $results = [];
            foreach ($bill_of_lading as $bl) {
                foreach ($bl->cargo_loader->container_details as $bl_container) {
                    $results[] = [
                        'id' => $bl->id,
                        'hbl_code' => $bl->code,
                        'container_number' => $bl_container->container_number,
                        'equipment_type_id' => $bl_container->equipment_type_id,
                        'equipment_type_code' => ($bl_container->equipment_type_id >0 ? $bl_container->equipment_type->code: ""),
                        'seal_number' => $bl_container->container_seal_number,
                        'seal_number2' => $bl_container->container_seal_number2,
                        'total_pieces' => $bl->total_pieces,
                        'total_weight_k' => $bl->total_weight_kgs,
                        'total_cubic_k' => $bl->total_cubic_cbm,
                        'total_charge_weight_k' => $bl->total_charge_weight_kgs,
                        'cargo_loader_id' => $bl->cargo_loader_id,
                        'container_id' => $bl_container->id,
                    ];
                }
            }

            return response($results);
        }
    }
}
