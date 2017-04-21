<?php

namespace Sass\Http\Controllers\Export\OceanExport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Sass\AccInvoice;
use Sass\AccInvoiceCargo;
use Sass\AccInvoiceCharge;
use Sass\AccInvoiceContainer;
use Sass\EoBillOfLading;
use Sass\EoBillOfLadingAttachment;
use Sass\EoBillOfLadingCargo;
use Sass\EoBillOfLadingCharge;

use Sass\DataTables\Export\Ocean\BillOfLadingDataTable;
use Sass\EoBillOfLadingContainer;
use Sass\EoHblReceiptEntry;
use Sass\Http\Controllers\Controller;
use Sass\Logic\File\FileRepository;
use Sass\ReceiptEntry;
use Sass\ReceiptEntryCargoDetail;


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
        $unique_str = str_random(25);
        $user_open_id = Auth::user()->id;
        return view('export.oceans.bill_of_lading.create', compact('unique_str','user_open_id'));
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
                $bl['total_prepaid']= $sum_prepaid;
                $bl['total_collected']= $sum_collect;

                $bl['flag']=1;

                $exp=EoBillOfLading::create($bl);
                EoBillOfLadingCargo::saveDetail($exp->id, $bl);
                if($bl['bl_class'] == 3){
                    $bl['origin_id'] = $bl['port_loading_id'];
                    $bl['destination_id'] = $bl['port_unloading_id'];
                    $bl['source']='OE';
                    $bl['carrier_type'] = 'O';
                    EoBillOfLading::updateHBL($exp->id, $bl);
                    AccInvoice::createInvoice($bl, $exp->id);
                }else{
                    EoHblReceiptEntry::saveDetail($exp->id, $bl);
                }

                EoBillOfLadingContainer::saveDetail($exp->id, $bl);
                EoBillOfLadingCharge::saveDetail($exp->id, $bl);
                $id= $exp->id;
                AccInvoice::createInvoice($bl, $id);

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
        $unique_str = $bill_of_lading->unique_str;
        $user_open_id =  ($bill_of_lading->user_open_id == 0) ? Auth::user()->id : $bill_of_lading->user_open_id;

        $bill_of_lading = self::updateOpenStatus($bill_of_lading);
        $bill_of_lading->save();
        return view('export.oceans.bill_of_lading.edit', compact('unique_str','bill_of_lading', 'user_open_id'));
    }

    public function upload(Request $request)
    {
        $upload = $request->all();
        $unique_str = $upload['unique_str'];
        try {
            $path = public_path().'/storage/';
            $file = $request->file('file')[0];

            $tmp = FileRepository::generate($file);
            $file->move($path, $tmp['temp_name']);
            EoBillOfLadingAttachment::saveAttachment($unique_str, $tmp);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'The file could not be uploaded']);
        }
        return response()->json();
    }

    public function delete()
    {
        $key = Input::get('key');
        if (!$key) return response()->json(['error' => 'The file could not be deleted']);

        $sessionFile = EoBillOfLadingAttachment::findOrFail($key);
        $path_file = public_path().'/storage/'.$sessionFile->temp_name;

        try {
            if (!empty($sessionFile)) { $sessionFile->delete(); }
            if (File::exists($path_file)) { File::delete($path_file); }
        } catch (FileException $e) {
            return response()->json(['error' => 'The file could not be deleted']);
        }
        return response()->json();
    }

    public function get($id)
    {
        $files = EoBillOfLadingAttachment::where('unique_str', $id)->get();
        $path = public_path()."/storage/";

        $rtn = [];
        foreach ($files as $file) {
            if (File::exists($path.$file->temp_name))
            {
                $rtn[] = [
                    'original_name' => $file->original_name,
                    'temp_name' => $file->temp_name,
                    'type' => strtolower(File::extension($file->original_name)),
                    'route' => asset(Storage::disk('storage')->url($file->temp_name)),
                    'key' => $file->id,
                    'size' => File::size($path.$file->temp_name),
                ];
            }
        }
        return response()->json(['files' => $rtn]);
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
                else{ $sum_collect+= floatval($bill_of_lading['billing_amount'][$i]); };
                $i++;
            }

            $bill_of_lading['total_prepaid']= $sum_prepaid;
            $bill_of_lading['total_collected']= $sum_collect;
            $bill_of_lading['user_update_id'] = Auth::user()->id;

            $bill_of_lading['flag']=1;
            $sent->fill($bill_of_lading);
            $sent->update($bill_of_lading);

            if($bill_of_lading['bl_class'] == 3){
                $bill_of_lading['origin_id'] = $bill_of_lading['port_loading_id'];
                $bill_of_lading['destination_id'] = $bill_of_lading['port_unloading_id'];
                $bill_of_lading['carrier_type'] = 'O';
                $bl['source']='OE';
                AccInvoice::createInvoice($bill_of_lading, $id);
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

    public function report(Request $request) {
        $id = $request->get('_id');
        $type = $request->get('_type');
        $bill_of_lading = null;
        $result = [];

        try {
            $bill_of_lading = EoBillOflading::findOrFail($id);

        } catch (ModelNotFoundException $e) {
            abort(404);
        }
        //======================

        foreach($bill_of_lading->receipt_entries as $receipts){
            $details="";
            $data= ReceiptEntryCargoDetail::join('mst_cargo_types as c', 'whr_receipts_entries_cargo_details.cargo_type_id', '=', 'c.id')
                ->groupBy('whr_receipts_entries_cargo_details.cargo_type_id')
                ->where('whr_receipts_entries_cargo_details.receipt_entry_id', $receipts->id)
                ->select([DB::raw('sum(whr_receipts_entries_cargo_details.pieces) as pieces'),'c.code as cargo_code'])->get();

            foreach($data as $receipt){
               $details .= $receipt->pieces." ".strtoupper($receipt->cargo_code)." ";
            }
            $result[] = [
                'warehouse_code' => $receipts->code,
                'detail' => $details
            ];
        }
        //======================

        switch ($type) {
            //ORIGINAL
            case 1:
                return \PDF::loadView('export.oceans.bill_of_lading.pdf', compact('bill_of_lading', 'type', 'result'))
                        ->setOption('margin-top',15)
                        ->setOption('margin-bottom',15)
                        ->setOption('margin-left',10)
                        ->setOption('margin-right',5)
                        ->stream($bill_of_lading->code.'.pdf');
                break;
            //CARRIER
            case 2:
                return \PDF::loadView('export.oceans.bill_of_lading.pdf', compact('bill_of_lading', 'type', 'result' ))->stream($bill_of_lading->code.'.pdf');
                break;
            //DOCK RECEIPT
            case 3:
                return \PDF::loadView('export.oceans.bill_of_lading.dock_receipt', compact('bill_of_lading', 'type', 'result'))->stream($bill_of_lading->code.'.pdf');
                break;
            //NON NEGOTIABLE
            case 4:
                return \PDF::loadView('export.oceans.bill_of_lading.pdf', compact('bill_of_lading', 'type', 'result'))->stream($bill_of_lading->code.'.pdf');
            break;
            //NON NEGOTIABLE FREIGHT ONLY
            case 5:
                return \PDF::loadView('export.oceans.bill_of_lading.pdf', compact('bill_of_lading', 'type', 'result'))->stream($bill_of_lading->code.'.pdf');
                break;
            //ORIGINAL FREIGHT ONLY
            case 6:
                return \PDF::loadView('export.oceans.bill_of_lading.pdf', compact('bill_of_lading', 'type', 'result'))->stream($bill_of_lading->code.'.pdf');
                break;
            //ORIGINAL NOT RATE
            case 7:
                return \PDF::loadView('export.oceans.bill_of_lading.pdf', compact('bill_of_lading', 'type', 'result'))->stream($bill_of_lading->code.'.pdf');
                break;
            //DELIVERY ORDER
            case 8:
                return \PDF::loadView('export.oceans.bill_of_lading.delivery_order', compact('bill_of_lading', 'result', 'type'))->stream($bill_of_lading->code.'.pdf');
                break;
            //LABEL
            case 9:
                return \PDF::loadView('export.oceans.bill_of_lading.label', compact('bill_of_lading'))
                    ->setOption('margin-top', 3)
                    ->setOption('margin-left', 2)
                    ->stream($bill_of_lading->code.'.pdf');
                break;
            case 10:
                return \PDF::loadView('export.oceans.bill_of_lading.manifest', compact('bill_of_lading', 'result'))
                    ->setOrientation('landscape')
                    ->stream($bill_of_lading->code.'.pdf');
                break;
            case 11:
                return \PDF::loadView('export.oceans.bill_of_lading.pre_alert', compact('bill_of_lading'))->stream($bill_of_lading->code.'.pdf');
                break;
            //DELIVERY ORDER (DOCUMENTS ONLY)
            case 12:
                return \PDF::loadView('export.oceans.bill_of_lading.delivery_order', compact('bill_of_lading', 'result', 'type'))->stream($bill_of_lading->code.'.pdf');
                break;
            //DELIVERY ORDER (FREIGHT ONLY)
            case 13:
                return \PDF::loadView('export.oceans.bill_of_lading.delivery_order', compact('bill_of_lading', 'result', 'type'))->stream($bill_of_lading->code.'.pdf');
                break;
            //PICKUP DELIVERY
            case 14:
                return \PDF::loadView('export.oceans.bill_of_lading.delivery_order', compact('bill_of_lading', 'result', 'type'))->stream($bill_of_lading->code.'.pdf');
                break;
            default:
                $response = [''];
        }

        return response()->json($response);
    }

    public function pdf($token, $id, Request $request)
    {
        $type= $request->input("type");

        if (strlen($token) == 60) {
            try {
                $bill_of_lading= EoBillOfLading::findOrFail($id);
               /*return \PDF::loadView('export.oceans.bill_of_lading.pdf', compact('bill_of_lading'))
                    ->setOption('margin-right', 2)
                    ->stream($bill_of_lading->code.'.pdf');*/
               return view('export.oceans.bill_of_lading.pdf', compact('bill_of_lading', 'type'));
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

    public function pre_alert($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $bill_of_lading= EoBillOfLading::findOrFail($id);
                return \PDF::loadView('export.oceans.bill_of_lading.pre_alert', compact('bill_of_lading'))->stream($bill_of_lading->code.'.pdf');
                //return view('export.oceans.bill_of_lading.delivery_order', compact('bill_of_lading'));
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
                $bill_of_lading= EoBillOfLading::findOrFail($id);
                return \PDF::loadView('export.oceans.bill_of_lading.manifest', compact('bill_of_lading'))
                    ->setOrientation('landscape')
                    ->stream($bill_of_lading->code.'.pdf');
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
                    $status = $request->get('status');
                    $query->where('eo_bills_of_lading.shipment_id', '=', $shipment_id);
                    $query->where('eo_bills_of_lading.bl_class', '=','2');
                    if($status == 'N') {
                        $query->where('eo_bills_of_lading.status', '=','O');
                    }
                    $query->where('eo_bills_of_lading.shipper_id', '>','0');
                    $query->where('eo_bills_of_lading.consignee_id', '>','0');

                })->get();
            $results = [];
            foreach ($bill_of_lading as $bl) {
              //  foreach ($bl->cargo as $bl_cargo) {
                    $results[] = [
                        'id' => $bl->id,
                        'hbl_code' => $bl->code,
                        'status' => $bl->status,
                        'marks' => "SHIPPER ".strtoupper($bl->shipper_id > 0 ? $bl->shipper->name : "")." CONSIGNEE: ".strtoupper($bl->consignee_id > 0 ? $bl->consignee->name : ""),
                        'cargo_type_id' => $bl->cargo_type_id,
                        'cargo_type_code' => ($bl->cargo_type_id >0 ? $bl->cargo_type->code: ""),

                        'total_pieces' => $bl->total_pieces,
                        'total_weight_l' => $bl->total_gross_weight,
                        'total_cubic_l' => $bl->total_cubic,
                        'total_charge_weight_l' => $bl->total_charge_weight,
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

    public function table_details()
    {

    }

}
