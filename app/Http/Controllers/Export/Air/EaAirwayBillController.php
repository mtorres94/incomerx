<?php

namespace Sass\Http\Controllers\Export\Air;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Sass\AccInvoice;
use Sass\AccInvoiceCargo;
use Sass\AccInvoiceCharge;
use Sass\AccInvoiceContainer;
use Sass\DataTables\Export\Air\EaAirwayBillDataTable;
use Sass\EaAirwayBill;
use Sass\EaAirwayBillCargo;
use Sass\EaAirwayBillCharge;
use Sass\EaLoadingGuide;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\ReceiptEntry;
use Sass\ReceiptEntryCargoDetail;

class EaAirwayBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EaAirwayBillDataTable $dataTable)
    {
        return $dataTable->render('export.air.airwaybills.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('export.air.airwaybills.create', compact('user_open_id'));
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
            $airway_bill = $request->all();

            $type = ($airway_bill['awb_class'] =='1' ? 'DAWB' : ($airway_bill['awb_class'] =='2' ? 'HAWB' :  'MAWB'));
            $last = EaAirwayBill::orderBy('code','desc')->where('code', 'LIKE', $type.'%') ->first();
            $frmt = $last == null ? 1 : intval(substr($last->code, 5)) + 1;
            $code = str_pad($frmt, 5, '0', 0);
            $code = $type.'-'.$code;
            $airway_bill['code'] = $code;
            $airway_bill['user_create_id'] = Auth::user()->id;
            $airway_bill['user_update_id'] = Auth::user()->id;
            $airway_bill['user_open_id'] = Auth::user()->id;
            $id= EaAirwayBill::create($airway_bill)->id;
            EaAirwayBillCargo::saveDetail($id, $airway_bill);
            EaAirwayBillCharge::saveDetail($id, $airway_bill);
            if($airway_bill['awb_class'] == 3){
                $airway_bill['carrier_type'] = 'A';
                $airway_bill['source'] = 'AE';
                AccInvoice::createInvoice($airway_bill, $id);

                if(isset($airway_bill['house_id'])){
                    for($x=0; $x < count($airway_bill['house_id']); $x++){
                        EaAirwayBill::where('id', '=', $airway_bill['house_id'][$x])->update(['airwaybill_id' => $id, 'status'=>'C']);
                    }
                }
            }
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.air.airwaybills.edit', [$id]);
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
        $airway_bill= EaAirwayBill::findOrFail($id);
        $user_open_id =  ($airway_bill->user_open_id == 0) ? Auth::user()->id : $airway_bill->user_open_id;
        $airway_bill = self::updateOpenStatus($airway_bill);
        $airway_bill->save();
        return view('export.air.airwaybills.edit', compact('airway_bill', 'user_open_id'));
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
            $airway_bill = $request->all();
            $airway_bill['user_update_id'] = Auth::user()->id;
            $sent = EaAirwayBill::findorfail($id);
            $sent->update($airway_bill);
            EaAirwayBillCargo::saveDetail($id, $airway_bill);
            EaAirwayBillCharge::saveDetail($id, $airway_bill);
            if($airway_bill['awb_class'] == 3){
                $airway_bill['carrier_type'] = 'A';
                $airway_bill['source'] = 'AE';
                AccInvoice::createInvoice($airway_bill, $id);
                EaAirwayBill::where('airwaybill_id', $id)->update(['airwaybill_id' => 0, 'status'=>'O']);
               if(isset($airway_bill['house_id'])){
                   for($x=0; $x < count($airway_bill['house_id']); $x++){
                       EaAirwayBill::where('id', '=', $airway_bill['house_id'][$x])->update(['airwaybill_id' => $id, 'status'=>'C']);
                   }
               }
            }
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.air.airwaybills.edit', [$id]);
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
            $airway_bill = EaAirwayBill::findOrFail($id);
            if (Auth::user()->id == $airway_bill->user_open_id)
            {

                $airway_bill = self::updateCloseStatus($airway_bill);
                $airway_bill->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $airway_bill = EaAirwayBill::findOrFail($data['id']);
        return [
            'id'   => $airway_bill->user_open_id,
            'name' => $airway_bill->user_open_id > 0 ? $airway_bill->user_open->name : '',
        ];
    }


    public function get(Request $request)
    {
        if ($request->ajax()) {
            $airway_bills = EaAirwayBill::select('ea_airwaybills.*')
                ->where(function ($query) use ($request) {
                    $shipment_id = $request->get('id');
                    $status = $request->get('status');
                    $query->where('ea_airwaybills.shipment_id', '=', $shipment_id);
                    $query->where('ea_airwaybills.awb_class', '=','2');
                    if($status == 'N') {
                        $query->where('ea_airwaybills.status', '=','O');
                    }
                })->get();
            $results = [];
            foreach ($airway_bills as $airway_bill) {
                $results[] = [
                    'id' => $airway_bill->id,
                    'status' => $airway_bill->status,
                    'code' => $airway_bill->code,
                    'date' => $airway_bill->date,
                    'total_pieces' => $airway_bill->total_pieces,
                    'total_gross_weight' => $airway_bill->total_gross_weight,
                    'total_volume_weight' => $airway_bill->total_volume_weight,
                    'total_cubic' => $airway_bill->total_cubic,
                    'total_rate' => $airway_bill->total_rate,
                    'total_amount' => $airway_bill->sum_total,
                    'destination_name' => strtoupper($airway_bill->destination->name),
                ];

            }

            return response()->json($results);
        }
    }


    public function get_details(Request $request)
    {
        if ($request->ajax()) {
            $receipts_entries = ReceiptEntry::select('whr_receipts_entries.*')
                ->where(function ($query) use ($request) {
                    $airway_bill = $request->get('id_select');
                    $query->where('whr_receipts_entries.ea_airwaybill_id', '=', $airway_bill);
                })->get();
            $results = [];
            foreach ($receipts_entries as $receipt_entry) {
                foreach($receipt_entry->cargo_details as $detail){
                    $results[] = [
                        'quantity' => $detail->quantity,
                        'weight_unit' => strtoupper($detail->weight_unit_measurement_id),
                        'length' => $detail->length,
                        'width' => $detail->width,
                        'height' => $detail->height,
                        'total_weight' => $detail->total_weight,
                        'volume_weight' => $detail->volume_weight,
                    ];
                }

            }
            return response()->json($results);
        }
    }

    public function report(Request $request) {
        $id = $request->get('_id');
        $type = $request->get('_type');
        $airway_bill = null;

        try {
            $airway_bill = EaAirwayBill::findOrFail($id);

        } catch (ModelNotFoundException $e) {
            abort(404);
        }
        switch ($type) {
            case 1:
                return \PDF::loadView('export.air.airwaybills.delivery_order', compact('airway_bill', 'type'))->stream($airway_bill->code.'.pdf');
                break;
            case 2:
                return \PDF::loadView('export.air.airwaybills.delivery_order', compact('airway_bill', 'type'))->stream($airway_bill->code.'.pdf');
                break;
            case 3:
                return \PDF::loadView('export.air.airwaybills.delivery_order', compact('airway_bill', 'type'))->stream($airway_bill->code.'.pdf');
                break;
            case 4:
                return \PDF::loadView('export.air.airwaybills.delivery_order', compact('airway_bill', 'type'))->stream($airway_bill->code.'.pdf');
                break;
            case 5:
                return \PDF::loadView('export.air.airwaybills.pre_alert', compact('airway_bill', 'type'))->stream($airway_bill->code.'.pdf');
                break;
            case 6:
                return \PDF::loadView('export.air.airwaybills.letter_shipper', compact('airway_bill', 'type'))->stream($airway_bill->code.'.pdf');
                break;
            case 7:
                return \PDF::loadView('export.air.airwaybills.letter_shipper', compact('airway_bill', 'type'))->stream($airway_bill->code.'.pdf');
                break;
            case 8:
                return \PDF::loadView('export.air.airwaybills.awb', compact('airway_bill', 'type'))->stream($airway_bill->code.'.pdf');

                break;
            case 9:
                return \PDF::loadView('export.air.airwaybills.label', compact('airway_bill', 'type'))
                    ->setOption('margin-top', 3)
                    ->setOption('margin-left', 2)
                    ->stream($airway_bill->code.'.pdf');
                break;
            case 10:
                return \PDF::loadView('export.air.airwaybills.agent_commission', compact('airway_bill', 'type'))->stream($airway_bill->code.'.pdf');

                break;
            case 11:
                return \PDF::loadView('export.air.airwaybills.shipper_consent', compact('airway_bill', 'type'))->stream($airway_bill->code.'.pdf');

                break;
            default:
                $response = [''];
        }

        return response()->json($response);
    }
}
