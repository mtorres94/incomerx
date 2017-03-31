<?php

namespace Sass\Http\Controllers\AccountingBridge\InvoiceNotes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Sass\AccInvoice;
use Sass\AccInvoiceCargo;
use Sass\AccInvoiceCharge;
use Sass\AccInvoiceContainer;
use Sass\DataTables\AccountingBridge\InvoiceNotes\InvoiceDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InvoiceDataTable $dataTable)
    {
        return $dataTable->render('accounting_bridge.invoice_notes.invoices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('accounting_bridge.invoice_notes.invoices.create', compact('user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $invoice = $request->all();

            $type = ($invoice['type'] == 'I' ? 'INV' : ($invoice['type'] == 'C' ? 'CRE' : 'DEB'));
            $last = AccInvoice::orderBy('code', 'desc')->where('code', 'like', $type . '%')->first();
            $frmt = $last == null ? 1 : intval(substr($last->code, 4)) + 1;
            $code = str_pad($frmt, 6, '0', 0);
            $code = $type . '-' . $code;
            $invoice['code'] = $code;
            $invoice['user_create_id'] = Auth::user()->id;
            $invoice['user_update_id'] = Auth::user()->id;
            $invoice['user_open_id'] = Auth::user()->id;
            if($invoice['source'] != 'MI'){
                $invoice['total_cost'] = 0;
            }
            $id = AccInvoice::create($invoice)->id;
            AccInvoiceCargo::saveDetail($id, $invoice);
            AccInvoiceCharge::saveDetail($id, $invoice);
            AccInvoiceContainer::saveDetail($id, $invoice);
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('accounting_bridge.invoice_notes.invoices.edit', [$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = AccInvoice::findOrFail($id);
        $user_open_id = ($invoice->user_open_id == 0) ? Auth::user()->id : $invoice->user_open_id;
        $invoice = self::updateOpenStatus($invoice);
        $invoice->save();
        return view('accounting_bridge.invoice_notes.invoices.edit', compact('invoice', 'user_open_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $invoice = $request->all();
            $invoice['user_update_id'] = Auth::user()->id;
            if($invoice['source'] != 'MI'){
                $invoice['total_cost'] = 0;
            }
            $sent = AccInvoice::findorfail($id);
            $sent->update($invoice);

            AccInvoiceCargo::saveDetail($id, $invoice);
            AccInvoiceCharge::saveDetail($id, $invoice);
            AccInvoiceContainer::saveDetail($id, $invoice);
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('accounting_bridge.invoice_notes.invoices.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        if ($id > 0) {
            $invoice = AccInvoice::findOrFail($id);
            if (Auth::user()->id == $invoice->user_open_id) {

                $invoice = self::updateCloseStatus($invoice);
                $invoice->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $invoice = AccInvoice::findOrFail($data['id']);
        return ['id' => $invoice->user_open_id, 'name' => $invoice->user_open_id > 0 ? $invoice->user_open->name : '',];
    }

    public function transfer(Request $request)
    {
        $dateToday= date('Y-m-d');
        if ($request->ajax()) {
            AccInvoice::where(function ($query) use ($request) {
                $id = $request->get('id');
                $query->where('acc_invoices.id', $id);
            })->update(['status' => 'P', 'posted_date' => $dateToday]);
            return null;
        }
    }
    public function report(Request $request) {
        $id = $request->get('_id');
        $type = $request->get('_type');
        $invoice = null;
        try {
            $invoice = AccInvoice::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
        switch($type){
            case 1:
                return \PDF::loadView('accounting_bridge.invoice_notes.invoices.posted', compact('invoice'))->stream($invoice->code.'.pdf');
                break;
            case 2:
                return \PDF::loadView('accounting_bridge.invoice_notes.invoices.cost_worksheet', compact('invoice'))->stream($invoice->code.'.pdf');
               // return view('accounting_bridge.invoice_notes.invoices.cost_worksheet', compact('invoice'));
                break;
            case 3:
                return \PDF::loadView('accounting_bridge.invoice_notes.invoices.invoice', compact('invoice'))->stream($invoice->code.'.pdf');
                //return view('accounting_bridge.invoice_notes.invoices.invoice', compact('invoice'));
                break;
            default:
                abort(404);
        }
    }

    public static function invoice_reports()
    {
      return view('accounting_bridge.invoice_notes.invoice_reports.index');
    }

    public static function invoice_reports_view(Request $request)
    {
        $type = $request->get('type');

        $invoice = AccInvoice::where(function ($query) use ($request, $type) {
            $query->where('status', $request->get('status'));
            $query->where('type', $request->get('type'));
            if (!empty($request->get('shipment_code'))) {
                $query->where('shipment_code', $request->get('shipment_code'));
            }
            if (!empty($request->get('shipper_id'))) {
                $query->where('shipper_id', $request->get('shipper_id'));
            }
            if (!empty($request->get('consignee_id'))) {
                $query->where('consignee_id', $request->get('consignee_id'));
            }
            if (!empty($request->get('bill_to_id'))) {
                $query->where('bill_to_id', $request->get('bill_to_id'));
            }
            if (!empty($request->get('agent_id'))) {
                $query->where('agent_id', $request->get('agent_id'));
            }
            if (!empty($request->get('carrier_id'))) {
                $query->where('carrier_id', $request->get('carrier_id'));
            }
            if (!empty($request->get('period'))) {
                $query->where('period', $request->get('period'));
            }
            if (!empty($request->get('date_from'))) {
                $query->where('date', '>=', $request->get('date_from'));
            }
            if (!empty($request->get('date_to'))) {
                $query->where('date', '<=', $request->get('date_to'));
            }
            if (!empty($request->get('posted_from'))) {
                $query->where('posted_date', '>=', $request->get('date_from'));
            }
            if (!empty($request->get('posted_to'))) {
                $query->where('posted_date', '<=', $request->get('date_to'));
            }
        })->get();
        return \PDF::loadView('accounting_bridge.invoice_notes.invoice_reports.pdf', compact('invoice'))->stream('Invoices Report.pdf');
        //return view('accounting_bridge.invoice_notes.invoice_reports.pdf', compact('invoice'));
    }

    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $invoices = AccInvoice::select(['acc_invoices.*'])
                ->where(function ($query) use ($request) {
                    if ($term = $request->get('term')) {
                        $query->orWhere('acc_invoices.code', 'like', $term.'%' );
                        $query->orWhere('acc_invoices.shipment_code', 'like', $term.'%');
                    }
                })->get();

            $results = [];
            foreach($invoices as $invoice){
                $results[] = [
                    'id'                => $invoice->id,
                    'value'              => strtoupper($invoice->shipment_code),
                ];
            }
            return response()->json($results);
        }
    }

}
