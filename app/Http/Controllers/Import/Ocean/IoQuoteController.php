<?php

namespace Sass\Http\Controllers\Import\Ocean;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Sass\DataTables\Import\Ocean\IoQuoteDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\IoQuote;
use Sass\IoQuoteCargo;
use Sass\IoQuoteCharge;
use Sass\IoQuoteDestinationCharge;
use Sass\IoQuoteOriginCharge;

class IoQuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IoQuoteDataTable $dataTable)
    {
        return $dataTable->render('import.oceans.quotes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('import.oceans.quotes.create', compact('user_open_id'));
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
            $last = IoQuote::orderBy('code','desc')->first();
            $frmt = $last == null ? 1 : intval(substr($last->code, 4)) + 1;
            $quote_code = str_pad($frmt, 6, '0', 0);
            $quotes= $request->all();
            $quotes['code']='IOQ-'.$quote_code;
            $quotes['user_create_id'] = Auth::user()->id;
            $quotes['user_update_id'] = Auth::user()->id;
            //dd($quotes);
            $imp=IoQuote::create($quotes);
            $id = $imp->id;
            IoQuoteCargo::saveDetail($id, $quotes);
            IoQuoteOriginCharge::saveDetail($id, $quotes);
            IoQuoteDestinationCharge::saveDetail($id, $quotes);
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('import.oceans.quotes.edit', [$id]);
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
        $quotes = IoQuote::findOrFail($id);
        $user_open_id =  ($quotes->user_open_id == 0) ? Auth::user()->id : $quotes->user_open_id;

        $quotes = self::updateOpenStatus($quotes);
        $quotes->save();

        return view('import.oceans.quotes.edit', compact('quotes', 'user_open_id'));
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


            $quotes = $request->all();
            $sent = IoQuote::findorfail($id);
            $sent->update($quotes);
            $quotes['user_update_id'] = Auth::user()->id;

            IoQuoteCargo::saveDetail($id, $quotes);
            IoQuoteOriginCharge::saveDetail($id, $quotes);
            IoQuoteDestinationCharge::saveDetail($id, $quotes);

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('import.oceans.quotes.edit', [$id]);
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
    public function pdf($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $quote = IoQuote::findOrFail($id);
                return \PDF::loadView('import.oceans.quotes.pdf', compact('quote','type'))->stream($quote->code.'.pdf');
                #return view('import.oceans.quotes.pdf', compact('quote','type'));
            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $quotes = IoQuote::findOrFail($id);
            if (Auth::user()->id == $quotes->user_open_id)
            {

                $quotes = self::updateCloseStatus($quotes);
                $quotes->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $quotes = IoQuote::findOrFail($data['id']);
        return [
            'id'   => $quotes->user_open_id,
            'name' => $quotes->user_open_id > 0 ? $quotes->user_open->name : '',
        ];
    }

    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $quotes = IoQuote::leftJoin('mst_services', 'io_quotes.service_id', '=', 'mst_services.id')
                ->leftJoin('mst_carriers AS ca', 'io_quotes.carrier_id', '=', 'ca.id')
                ->leftJoin('mst_ocean_ports AS op2', 'io_quotes.port_unloading_id', '=', 'op2.id')
                ->leftJoin('mst_ocean_ports AS op1', 'io_quotes.port_loading_id', '=', 'op1.id')
                ->leftJoin('mst_world_locations AS wl1', 'io_quotes.place_receipt_id', '=', 'wl1.id')
                ->leftJoin('mst_world_locations AS wl2', 'io_quotes.place_delivery_id', '=', 'wl2.id')
                ->leftJoin('mst_customers AS C1', 'io_quotes.shipper_id', '=', 'C1.id')
                ->leftJoin('mst_customers AS C2', 'io_quotes.consignee_id', '=', 'C2.id')

                ->select(['io_quotes.*', 'op1.id AS port_loading_id','op2.id AS port_unloading_id','op1.name AS port_loading_name','op2.name AS port_unloading_name','wl1.id AS place_receipt_id','wl2.id AS place_delivery_id','wl1.name AS place_receipt_name','wl2.name AS place_delivery_name', 'mst_services.id as service_id', 'mst_services.name as service_name',
                    'C1.id as shipper_id','C1.name as shipper_name',  'C1.phone as shipper_phone','C1.fax as shipper_fax','C1.address as shipper_address',
                    'C2.id as consignee_id','C2.name as consignee_name',  'C2.phone as consignee_phone','C2.fax as consignee_fax','C2.address as consignee_address', 'ca.id as carrier_id', 'ca.name as carrier_name'
                     ])
                ->where(function ($query) use ($request) {
                    if ($term = $request->get('term')) {
                        $query->orWhere('io_quotes.code', 'LIKE', $term . '%');
                    }

                })->take(10)->get();

            $results = [];
            foreach ($quotes as $quote) {
                $results[] = [
                    'id'                => $quote->id,
                    'code'              => strtoupper($quote->code),
                    'service_id'         => $quote->service_id,
                    'service_name'         => $quote->service_name,
                    'incoterm_type'         => $quote->incoterm_type,
                    'carrier_id'         => $quote->carrier_id,
                    'carrier_name'         => $quote->carrier_name,
                    'departure'    => $quote->departure_date,
                    'arrival'    => $quote->arrival_date,

                    'port_loading_id'   => $quote->port_loading_id,
                    'port_unloading_id'   => $quote->port_unloading_id,
                    'port_loading_name'   => strtoupper($quote->port_loading_name),
                    'port_unloading_name'   => strtoupper($quote->port_unloading_name),
                    'place_receipt_id'   => $quote->place_receipt_id,
                    'place_delivery_id'   => $quote->place_delivery_id,
                    'place_receipt_name'   => strtoupper($quote->place_receipt_name),
                    'place_delivery_name'   => strtoupper($quote->place_delivery_name),

                    'shipper_id'                => $quote->shipper_id,
                    'shipper_name'   => strtoupper($quote->shipper_name),
                    'shipper_address'   => strtoupper($quote->shipper_address),
                    'shipper_phone'   => $quote->shipper_phone,
                    'shipper_fax'   => $quote->shipper_fax,

                    'consignee_id'                => $quote->consignee_id,
                    'consignee_name'   => strtoupper($quote->consignee_name),
                    'consignee_address'   => strtoupper($quote->consignee_address),
                    'consignee_phone'   => $quote->consignee_phone,
                    'consignee_fax'   => $quote->consignee_fax,
                ];
            }

            return response()->json($results);
        }
    }

    public function get(Request $request)
    {
        if ($request->ajax()) {
            $charges = IoQuoteOriginCharge::select(['io_quote_origin_charges.*'])
                ->where(function ($query) use ($request) {
                    $quote_id = $request->get('id');
                    $query->orWhere('io_quote_origin_charges.quote_id', '=', $quote_id );
                })->get();

            $results = [];
            foreach ($charges as $charge) {
                $results[] = [
                    'billing_id' => $charge->billing_id,
                    'billing_code' =>  strtoupper($charge->billing_id > 0 ? $charge->billing->code : ""),
                    'billing_description'                 => strtoupper($charge->billing_description),
                    'bill_type'               => $charge->bill_type,
                    'bill_party'               => $charge->bill_party,
                    'billing_quantity'               => $charge->billing_quantity,
                    'billing_rate'               => $charge->billing_rate,
                    'billing_amount'               => $charge->billing_amount,
                    'billing_currency_type'               => $charge->billing_currency_type,
                    'billing_customer_name'               => ($charge->billing_customer_id > 0 ? $charge->billing_customer->name : ""),
                    'cost_amount' => $charge->cost_amount,
                    'cost_currency_type' => $charge->cost_curency_type,
                    'cost_invoice' => $charge->cost_invoice,
                    'cost_reference' => $charge->cost_reference,
                    'billing_notes' => $charge->billing_notes,
                    'billing_unit_id' => $charge->billing_unit_id,
                    'billing_unit_name' => ($charge->billing_unit_id >0 ?$charge->billing_unit->name : ""),
                    'billing_exchange_rate' =>$charge->billing_exchange_rate,
                    'billing_customer_id' =>$charge->billing_customer_id,
                    'cost_quantity' =>$charge->cost_quantity,
                    'cost_unit_id' =>$charge->cost_unit_id,
                    'cost_unit_name' =>($charge->cost_unit_id >0 ? $charge->cost_unit->name : ""),
                    'cost_rate' =>$charge->cost_rate,
                    'cost_center' =>$charge->cost_center,
                    'cost_exchange_rate' =>$charge->cost_exchange_rate,
                    'billing_vendor_code' =>$charge->billing_vendor_code,
                    'billing_vendor_name' =>($charge->billing_vendor_code > 0 ? $charge->billing_vendor->name : ""),
                    'cost_date' =>$charge->cost_date,
                    'billing_increase' =>$charge->billing_increase,
                ];
            }
            return response()->json($results);
        }
    }

}
