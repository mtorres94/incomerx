<?php

namespace Sass\Http\Controllers\Export\OceanExport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Sass\EoBillOfLading;
use Sass\EoBillOfLadingCargo;
use Sass\EoBillOfLadingCargoDetail;
use Sass\EoBillOfLadingCharge;

use Sass\DataTables\Export\Ocean\BillOfLadingDataTable;
use Sass\EoBillOfLadingContainer;
use Sass\EoHblReceiptEntry;
use Sass\Http\Controllers\Controller;


class EoBillOfLadingController extends Controller
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
        $user_open_id = Auth::user()->id;
        return view('export.oceans.bill_of_lading.create', compact('user_open_id'));
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
                $bl = $request->all();
                $type = $bl['bl_class'] == 1 ? 'DBL' : ($bl['bl_class'] == 2 ? 'HBL' : 'MBL');
                $last = EoBillOfLading::orderBy('code','desc')->where('code', 'LIKE', $type.'%') ->first();
                $frmt = $last == null ? 1 : intval(substr($last->code, 4)) + 1;
                $code = str_pad($frmt, 6, '0', 0);
                $bl['code'] = $type."-".$code;

                $bl['user_create_id'] = Auth::user()->id;
                $bl['user_update_id'] = Auth::user()->id;
                $bl['user_open_id'] = Auth::user()->id;
                $bl['bill_of_lading_id'] = 0;
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
                $bill_of_lading['flag']=1;
                $exp=EoBillOfLading::create($bl);
                EoBillOfLadingCargo::saveDetail($exp->id, $bl);
                if($bl['bl_class'] == 3){
                    EoBillOfLading::updateHBL($exp->id, $bl);
                }else{
                    EoHblReceiptEntry::saveDetail($exp->id, $bl);
                }

                EoBillOfLadingContainer::saveDetail($exp->id, $bl);
                EoBillOfLadingCharge::saveDetail($exp->id, $bl);

                $id= $exp->id;

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('export.oceans.bill_of_lading.edit', [$id]);
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
        $bill_of_lading = EoBillOfLading::findOrFail($id);
        $user_open_id =  ($bill_of_lading->user_open_id == 0) ? Auth::user()->id : $bill_of_lading->user_open_id;

        $bill_of_lading = self::updateOpenStatus($bill_of_lading);
        $bill_of_lading->save();
        return view('export.oceans.bill_of_lading.edit', compact('bill_of_lading', 'user_open_id'));
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
            $sent = EoBillOfLading::findOrFail($id);
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
            $bill_of_lading['flag']=1;
            $sent->fill($bill_of_lading);
            $sent->update($bill_of_lading);

            if($bill_of_lading['bl_class'] == 3){
                EoBillOfLading::updateHBL($id, $bill_of_lading);
            }else{
                EoHblReceiptEntry::saveDetail($id, $bill_of_lading);
            }
            EoBillOfLadingCargo::saveDetail($id, $bill_of_lading);
            EoBillOfLadingContainer::saveDetail($id, $bill_of_lading);
            EoBillOfLadingCharge::saveDetail($id, $bill_of_lading);
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.oceans.bill_of_lading.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill_lading = EoBillOfLading::find($id);
        DB::table('eo_bill_of_lading_cargo')->where('bill_of_lading_id', '=', $id)->delete();
        DB::table('eo_bill_of_lading_cargo_details')->where('bill_of_lading_id', '=', $id)->delete();
        DB::table('eo_bill_of_lading_container')->where('bill_of_lading_id', '=', $id)->delete();
        DB::table('eo_bill_of_lading_charge')->where('bill_of_lading_id', '=', $id)->delete();
        DB::table('eo_bill_of_lading_hazardous_details')->where('bill_of_lading_id', '=', $id)->delete();
        DB::table('eo_bill_of_lading_transportation')->where('bill_of_lading_id', '=', $id)->delete();
        DB::table('eo_bill_of_lading_pro_tracking')->where('bill_of_lading_id', '=', $id)->delete();
        DB::table('eo_bill_of_lading_items')->where('bill_of_lading_id', '=', $id)->delete();
        DB::table('eo_bill_of_lading_customer_references')->where('bill_of_lading_id', '=', $id)->delete();
        $bill_lading->delete();


    }
    public function pdf($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $bill_of_lading= EoBillOfLading::findOrFail($id);
                return \PDF::loadView('export.oceans.bill_of_lading.pdf', compact('bill_of_lading'))->stream('B/L-'.$bill_of_lading->code.'.pdf');
               // return view('export.oceans.bill_of_lading.pdf', compact('bill_of_lading'));
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
                $bill_of_lading= EoBillOfLading::findOrFail($id);
                return \PDF::loadView('export.oceans.bill_of_lading.delivery_order', compact('bill_of_lading'))->stream('DO-'.$bill_of_lading->code.'.pdf');
                //return view('export.oceans.bill_of_lading.delivery_order', compact('bill_of_lading'));
            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

    public function label($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $bill_of_lading= EoBillOfLading::findOrFail($id);

                return \PDF::loadView('export.oceans.bill_of_lading.label', compact('bill_of_lading'))
                    ->setOrientation('landscape')
                    ->setOption('margin-top', 3)
                    ->setOption('margin-left', 2)
                    ->stream($bill_of_lading->code.'.pdf');
                //return view('export.oceans.bill_of_lading.delivery_order', compact('bill_of_lading'));
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
            $bill_of_lading = EoBillOfLading::select('eo_bills_of_lading.*')
                ->where(function ($query) use ($request) {
                    $shipment_id = $request->get('id');
                    $query->where('eo_bills_of_lading.shipment_id', '=', $shipment_id);
                    $query->where('eo_bills_of_lading.bl_class', '<=','2');
                    $query->where('eo_bills_of_lading.bl_status', '=','O');
                    $query->where('eo_bills_of_lading.shipper_id', '>','0');
                    $query->where('eo_bills_of_lading.consignee_id', '>','0');

                })->get();
            $results = [];
            foreach ($bill_of_lading as $bl) {
              //  foreach ($bl->cargo as $bl_cargo) {
                    $results[] = [
                        'id' => $bl->id,
                        'hbl_code' => $bl->code,
                        'marks' => "SHIPPER ".strtoupper($bl->shipper_id > 0 ? $bl->shipper->name : "")." CONSIGNEE: ".strtoupper($bl->consignee_id > 0 ? $bl->consignee->name : ""),
                        'cargo_type_id' => $bl->cargo_type_id,
                        'cargo_type_code' => ($bl->cargo_type_id >0 ? $bl->cargo_type->code: ""),

                        'total_pieces' => $bl->total_pieces,
                        'total_weight_l' => $bl->total_weight_lbs,
                        'total_cubic_l' => $bl->total_cubic_cft,
                        'total_charge_weight_l' => $bl->total_charge_weight_lbs,
                        'total_weight_k' => $bl->total_weight_kgs,
                        'total_cubic_k' => $bl->total_cubic_cbm,
                        'total_charge_weight_k' => $bl->total_charge_weight_kgs,
                        'cargo_loader_id' => $bl->cargo_loader_id,
                        'container_id' => $bl->id,
                    ];
              //  }
            }

            return response()->json($results);
        }
    }

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $bill_of_lading = EoBillOfLading::findOrFail($id);
            if (Auth::user()->id == $bill_of_lading->user_open_id)
            {

                $bill_of_lading = self::updateCloseStatus($bill_of_lading);
                $bill_of_lading->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $bill_of_lading = EoBillOfLading::findOrFail($data['id']);
        return [
            'id'   => $bill_of_lading->user_open_id,
            'name' => $bill_of_lading->user_open_id > 0 ? $bill_of_lading->user_open->name : '',
        ];
    }
}
