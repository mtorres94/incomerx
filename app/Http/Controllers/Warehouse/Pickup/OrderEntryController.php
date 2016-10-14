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
        return view('warehouse.pickup.orders_entries.create');
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
            $count = OrderEntry::count() + 1;
            $pd_number = str_pad($count, 10, '0', STR_PAD_LEFT);
            $order_entry = $request->all();
            $order_entry['pd_number'] = $pd_number;
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

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('warehouse.pickup.orders_entries.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd();
        /*
        $order_entry = OrderEntry::findOrFail($id);
        $po_numbers = OrderEntryPO::Search($id);
        $so_numbers = OrderEntrySO::Search($id);
        $pro_numbers = OrderEntryPRO::Search($id);
        $stop_numbers = OrderEntryStop::Search($id);
        $uns_numbers = OrderEntryHazardous::Search($id);
        $container_details = OrderEntryContainerDetail::Search($id);
        $dr_details = OrderEntryDockReceiptDetail::Search($id);
        $charge_details = OrderEntryChargeDetail::Search($id);
        $trans_details = OrderEntryTransportationDetail::Search($id);
        $cargo_details = OrderEntryCargoDetail::Search($id);
        $cargo_items_details = OrderEntryCargoItemDetail::Search($id);
        return view('warehouse.pickup.orders_entries.show', compact('order_entry', 'po_numbers', 'so_numbers', 'pro_numbers', 'stop_numbers', 'uns_numbers', 'container_details', 'dr_details','charge_details', 'trans_details', 'cargo_details', 'cargo_items_details'));/*/
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
        $po_numbers = OrderEntryPO::Search($id);
        $so_numbers = OrderEntrySO::Search($id);
        $pro_numbers = OrderEntryPRO::Search($id);
        $stop_numbers = OrderEntryStop::Search($id);
        $uns_numbers = OrderEntryHazardous::Search($id);
        $container_details = OrderEntryContainerDetail::Search($id);
        $dr_details = OrderEntryDockReceiptDetail::Search($id);
        $charge_details = OrderEntryChargeDetail::Search($id);
        $trans_details = OrderEntryTransportationDetail::Search($id);
        $cargo_details = OrderEntryCargoDetail::Search($id);
        $cargo_items_details = OrderEntryCargoItemDetail::Search($id);
        return view('warehouse.pickup.orders_entries.edit', compact('order_entry', 'po_numbers', 'so_numbers', 'pro_numbers', 'stop_numbers', 'uns_numbers', 'container_details', 'dr_details','charge_details', 'trans_details', 'cargo_details', 'cargo_items_details'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $order_entry = $request->all();
            $sent = OrderEntry::findorfail($id);
            $whr = $sent->update($order_entry);
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
        return redirect()->route('warehouse.pickup.orders_entries.index');
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
}
