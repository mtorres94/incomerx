<?php

namespace Sass\Http\Controllers\Warehouse\Pickup;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Sass\DataTables\Warehouse\Pickup\OrderEntryDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\OrderEntry;
use Sass\OrderEntryCargoDetail;
use Sass\OrderEntryCargoItemDetail;
use Sass\OrderEntryChargeDetail;
use Sass\OrderEntryContainerDetail;
use Sass\OrderEntryDockReceiptDetail;
use Sass\OrderEntryHazardous;
use Sass\OrderEntryPO;
use Sass\OrderEntryPRO;
use Sass\OrderEntrySO;
use Sass\OrderEntryStop;
use Sass\OrderEntryTransportationDetail;
use Sass\ReceiptEntry;
use Sass\ReceiptEntryCargoDetail;
use Sass\ReceiptEntryContainerDetail;
use Sass\ReceiptEntryReferenceDetail;

class OrderEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param OrderEntryDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(OrderEntryDataTable $dataTable)
    {
        return $dataTable->render('warehouse.pickup.orders_entries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('warehouse.pickup.orders_entries.create', compact('user_open_id'));
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
           /* $count = OrderEntry::count() + 1;
            $pd_number = str_pad($count, 7, '0', STR_PAD_LEFT);*/
            $last = OrderEntry::orderBy('code','desc')->first();
            $frmt = $last == null ? 1 : intval(substr($last->code, 3)) + 1;
            $pd_number = str_pad($frmt, 7, '0', 0);
            $order_entry = $request->all();
            $order_entry['code'] = "PD-".$pd_number;
            $order_entry['user_create_id'] = Auth::user()->id;
            $order_entry['user_update_id'] = Auth::user()->id;

            $whr=OrderEntry::create($order_entry);
            OrderEntryPO::saveDetail($whr->id, $order_entry);
            OrderEntrySO::saveDetail($whr->id, $order_entry);
            OrderEntryPRO::saveDetail($whr->id, $order_entry);
            OrderEntryHazardous::saveDetail($whr->id, $order_entry);
            OrderEntryStop::saveDetail($whr->id, $order_entry);
            OrderEntryContainerDetail::saveDetail($whr->id, $order_entry);
            OrderEntryDockReceiptDetail::saveDetail($whr->id, $order_entry);
            OrderEntryChargeDetail::saveDetail($whr->id, $order_entry);
            OrderEntryTransportationDetail::saveDetail($whr->id, $order_entry);
            OrderEntryCargoDetail::saveDetail($whr->id, $order_entry);
            OrderEntryCargoItemDetail::saveDetail($whr->id,  $order_entry);
	    
	    $id = $whr->id;

            if(isset($order_entry['create_warehouse_receipt']) and ($order_entry['create_warehouse_receipt'] == 1)){
                /*$count = ReceiptEntry::count() + 1;
                $wh_number = str_pad($count, 10, '0', STR_PAD_LEFT);*/
                $last = ReceiptEntry::orderBy('code','desc')->first();
                $frmt = $last == null ? 1 : intval(substr($last->code, 3)) + 1;
                $wh_number= 'WH-'.str_pad($frmt, 7, '0', 0);
                $order_entry = $request->all();
                $order_entry['code'] = $wh_number;

                $order_entry['date_in'] = $order_entry['date_order'];

                $order_entry['marks'] = "CREATED FROM PD ORDER # ". $whr->code;
                $order_entry['status'] = 'O';
                $order_entry['mode'] = 'R';
                $order_entry['currency_id'] = 1;
                $order_entry['user_create_id'] = Auth::user()->id;
                $order_entry['user_update_id'] = Auth::user()->id;
                $order_entry['receiving_carrier_id'] = $order_entry['carriers_carrier_id'];

                $whr= ReceiptEntry::create($order_entry);
                ReceiptEntryCargoDetail::createDetail($whr->id, $order_entry);
                ReceiptEntryReferenceDetail::createDetail($whr->id, $order_entry);
                ReceiptEntryContainerDetail::createDetail($whr->id, $order_entry);

            }

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('warehouse.pickup.orders_entries.edit', [$id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $order_entry = OrderEntry::findOrFail($id);
        $user_open_id =  ($order_entry->user_open_id == 0) ? Auth::user()->id : $order_entry->user_open_id;

        $order_entry = self::updateOpenStatus($order_entry);
        $order_entry->save();

        return view('warehouse.pickup.orders_entries.edit', compact('order_entry', 'user_open_id'));
    }

    public function update(Request $request, $id)
    {
        $order_entry = $request->all();
        DB::beginTransaction();
        try {


            $sent = OrderEntry::findorfail($id);

            $sent->update($order_entry);
            $order_entry['user_update_id'] = Auth::user()->id;

            OrderEntryPO::saveDetail($id, $order_entry);
            OrderEntrySO::saveDetail($id, $order_entry);
            OrderEntryPRO::saveDetail($id, $order_entry);
            OrderEntryHazardous::saveDetail($id, $order_entry);
            OrderEntryStop::saveDetail($id, $order_entry);
            OrderEntryContainerDetail::saveDetail($id, $order_entry);
            OrderEntryDockReceiptDetail::saveDetail($id, $order_entry);
            OrderEntryChargeDetail::saveDetail($id, $order_entry);
            OrderEntryTransportationDetail::saveDetail($id, $order_entry);
            OrderEntryCargoDetail::saveDetail($id, $order_entry);
            OrderEntryCargoItemDetail::saveDetail($id,  $order_entry);

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('warehouse.pickup.orders_entries.edit', [$id]);
    }


    public function destroy($id)
    {
        $order_entry = OrderEntry::find($id);
        $order_entry->delete();
        $order_entry_POs= DB::table('whr_orders_entries_POs')->where('order_entry_id', '=', $id)->delete();
        $order_entry_SOs= DB::table('whr_orders_entries_SOs')->where('order_entry_id', '=', $id)->delete();
        $order_entry_PROs= DB::table('whr_orders_entries_PROs')->where('order_entry_id', '=', $id)->delete();
        $order_entry_Hazardous= DB::table('whr_orders_entries_hazardous')->where('order_entry_id', '=', $id)->delete();
        $order_entry_cont= DB::table('whr_orders_entries_container_details')->where('order_entry_id', '=', $id)->delete();
        $order_entry_stop= DB::table('whr_orders_entries_stops')->where('order_entry_id', '=', $id)->delete();
        $order_entry_chrg= DB::table('whr_orders_entries_charge_details')->where('order_entry_id', '=', $id)->delete();
        $order_entry_trans= DB::table('whr_orders_entries_transportation_details')->where('order_entry_id', '=', $id)->delete();
        $order_entry_dr= DB::table('whr_orders_entries_dock_receipts_details')->where('order_entry_id', '=', $id)->delete();

    }
    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $order_entry = OrderEntry::findOrFail($id);
            if (Auth::user()->id == $order_entry->user_open_id)
            {

                $order_entry = self::updateCloseStatus($order_entry);
                $order_entry->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $order_entry = OrderEntry::findOrFail($data['id']);
        return [
            'id'   => $order_entry->user_open_id,
            'name' => $order_entry->user_open_id > 0 ? $order_entry->user_open->name : '',
        ];
    }

    public function pdf($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $order_entry = OrderEntry::findOrFail($id);
                return \PDF::loadView('warehouse.pickup.orders_entries.pdf', compact('order_entry'))->stream('WH '.$order_entry->code.'.pdf');
            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

}
