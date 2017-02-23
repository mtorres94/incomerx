<?php

namespace Sass\Http\Controllers\Import\Air;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Import\Air\IaRoutingOrderDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\IaRoutingOrder;
use Sass\IaRoutingOrderCharge;
use Sass\IoRoutingOrderCharge;

class IaRoutingOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IaRoutingOrderDataTable $dataTable)
    {
        return $dataTable->render('import.air.routing_order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('import.air.routing_order.create', compact('user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        DB::beginTransaction();
        try {

            $last = IaRoutingOrder::orderBy('code','desc')->first();
            $frmt = $last == null ? 1 : intval(substr($last->code, 4)) + 1;
            $code = str_pad($frmt, 6, '0', 0);
            $routing_order = $request->all();

            $routing_order['code']="IAR-".$code;
            $routing_order['mode']="A";
            $routing_order['user_create_id'] = Auth::user()->id;
            $routing_order['user_update_id'] = Auth::user()->id;
            $routing_order['user_open_id'] = Auth::user()->id;
            $imp=IaRoutingOrder::create($routing_order);
            IaRoutingOrderCharge::saveDetail($imp->id, $routing_order);
            $id= $imp->id;

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('import.air.routing_order.edit', [$id]);
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
        $routing_order = IaRoutingOrder::findOrFail($id);
        $user_open_id =  ($routing_order->user_open_id == 0) ? Auth::user()->id : $routing_order->user_open_id;

        $routing_order = self::updateOpenStatus($routing_order);
        $routing_order->save();

        return view('import.air.routing_order.edit', compact('routing_order', 'user_open_id'));
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
            $routing_order = $request->all();
            $sent = IaRoutingOrder::findorfail($id);
            $imp = $sent->update($routing_order);
            $routing_order['user_update_id'] = Auth::user()->id;
            IaRoutingOrderCharge::saveDetail($id, $routing_order);
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('import.air.routing_order.edit', [$id]);
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
    public function get_pdf(Request $request, $type, $token) {
        $response = [];
        $routing_order = $request->all();
        $ro_id = $routing_order->id;
        switch ($type) {
            case 1:
                break;
            case 2:
                break;
            case 3:
                break;
            default:
                $response = [''];
        }

        return response()->json($response);
    }

    public function pdf($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $routing_order = IaRoutingOrder::findOrFail($id);
                return \PDF::loadView('import.air.routing_order.pdf', compact('routing_order','type'))->stream($routing_order->code.'.pdf');
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
            $routing_order = IaRoutingOrder::findOrFail($id);
            if (Auth::user()->id == $routing_order->user_open_id)
            {

                $routing_order = self::updateCloseStatus($routing_order);
                $routing_order->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $routing_order = IaRoutingOrder::findOrFail($data['id']);
        return [
            'id'   => $routing_order->user_open_id,
            'name' => $routing_order->user_open_id > 0 ? $routing_order->user_open->name : '',
        ];
    }
    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $routing_orders = IaRoutingOrder::leftJoin('mst_airports AS op2', 'ia_routing_order.port_unloading_id', '=', 'op2.id')
                ->leftJoin('mst_carriers AS ca', 'ia_routing_order.carrier_id', '=', 'ca.id')
                ->leftJoin('mst_airports AS op1', 'ia_routing_order.port_loading_id', '=', 'op1.id')
                ->leftJoin('mst_customers AS C1', 'ia_routing_order.shipper_id', '=', 'C1.id')
                ->leftJoin('mst_customers AS C2', 'ia_routing_order.consignee_id', '=', 'C2.id')
                ->leftJoin('mst_world_locations AS wl1', 'ia_routing_order.place_receipt_id', '=', 'wl1.id')
                ->leftJoin('mst_world_locations AS wl2', 'ia_routing_order.place_delivery_id', '=', 'wl2.id')
                ->select(['ia_routing_order.*', 'op1.id AS port_loading_id','op2.id AS port_unloading_id','op1.name AS port_loading_name','op2.name AS port_unloading_name', 'op2.code AS port_unloading_code','wl1.id AS place_receipt_id','wl2.id AS place_delivery_id','wl1.name AS place_receipt_name','wl2.name AS place_delivery_name', 'ca.name as carrier_name',
                    'C1.id as shipper_id','C1.name as shipper_name',  'C1.phone as shipper_phone','C1.fax as shipper_fax','C1.address as shipper_address',
                    'C2.id as consignee_id','C2.name as consignee_name',  'C2.phone as consignee_phone','C2.fax as consignee_fax','C2.address as consignee_address'
                ])
                ->where(function ($query) use ($request) {
                    if ($term = $request->get('term')) {
                        $query->orWhere('ia_routing_order.code', 'LIKE', $term . '%');
                    }

                })->take(10)->get();

            $results = [];
            foreach ($routing_orders as $routing_order) {
                $results[] = [
                    'id'                => $routing_order->id,
                    'code'              => strtoupper($routing_order->code),
                    'port_loading_id'   => $routing_order->port_loading_id,
                    'port_unloading_id'   => $routing_order->port_unloading_id,
                    'port_loading_name'   => strtoupper($routing_order->port_loading_name),
                    'port_unloading_name'   => strtoupper($routing_order->port_unloading_name),
                    'port_unloading_code'   => strtoupper($routing_order->port_unloading_code),
                    'shipper_id'                => $routing_order->shipper_id,
                    'shipper_city'                => strtoupper($routing_order->shipper_id > 0 ? $routing_order->shipper->city : ""),
                    'shipper_name'   => strtoupper($routing_order->shipper_name ),
                    'shipper_address'   => strtoupper($routing_order->shipper_address),
                    'shipper_phone'   => $routing_order->shipper_phone,
                    'shipper_fax'   => $routing_order->shipper_fax,
                    'shipper_state_id' => $routing_order->shipper_state_id  ,
                    'shipper_state_name ' => ($routing_order->shipper_state_id> 0 ? $routing_order->shipper_state->name : ""),
                    'consignee_id'                => $routing_order->consignee_id,
                    'consignee_name'   => strtoupper($routing_order->consignee_name),
                    'consignee_city'                => strtoupper($routing_order->consignee_id > 0 ? $routing_order->consignee->city : ""),
                    'consignee_address'   => strtoupper($routing_order->consignee_address),
                    'consignee_phone'   => $routing_order->consignee_phone,
                    'consignee_fax'   => $routing_order->consignee_fax,
                    'consignee_state_id' => $routing_order->consignee_state_id  ,
                    'consignee_state_name ' => ($routing_order->consignee_state_id> 0 ? $routing_order->consignee_state->name : ""),
                    'carrier_id'         => $routing_order->carrier_id,
                    'carrier_name'         => strtoupper($routing_order->carrier_name),
                    'place_receipt_id'   => $routing_order->place_receipt_id,
                    'place_delivery_id'   => $routing_order->place_delivery_id,
                    'place_receipt_name'   => strtoupper($routing_order->place_receipt_name),
                    'place_delivery_name'   => strtoupper($routing_order->place_delivery_name),
                    'incoterm_type'   => strtoupper($routing_order->incoterm_type),


                ];
            }

            return response()->json($results);
        }
    }

    public function get(Request $request)
    {
        if ($request->ajax()) {
            $charges = IaRoutingOrderCharge::select(['ia_routing_order_charge.*'])
                ->where(function ($query) use ($request) {
                    $routing_order_id = $request->get('id');
                    $query->Where('ia_routing_order_charge.routing_order_id', '=', $routing_order_id );
                })->get();

            $results = [];
            foreach ($charges as $charge) {
                $results[] = [
                    'billing_id' => $charge->billing_id,
                    'billing_code' => strtoupper($charge->billing_id > 0 ? $charge->billing->code : ""),
                    'billing_description'                 => strtoupper($charge->billing_description),
                    'bill_type'               => $charge->bill_type,
                    'bill_party'               => $charge->bill_party,
                    'billing_quantity'               => $charge->billing_quantity,
                    'billing_rate'               => $charge->billing_rate,
                    'billing_amount'               => $charge->billing_amount,
                    'billing_currency_type'               => $charge->billing_currency_type,
                    'billing_customer_name'               => strtoupper($charge->billing_customer_id > 0 ? $charge->billing_customer->name : ""),
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
