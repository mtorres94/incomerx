<?php

namespace Sass\Http\Controllers\Import\Ocean;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Sass\AccInvoice;
use Sass\AccInvoiceCargo;
use Sass\AccInvoiceCharge;
use Sass\AccInvoiceContainer;
use Sass\DataTables\Import\Ocean\IoBillOfLadingDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\IoBillOfLading;
use Sass\IoBillOfLadingCargo;
use Sass\IoBillOfLadingContainer;
use Sass\IoBillOfLadingDestinationCharge;
use Sass\IoBillOfLadingOriginCharge;

use Maatwebsite\Excel\Facades\Excel;

class IoBillOfLadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IoBillOfLadingDataTable $dataTable)
    {
        return $dataTable->render('import.oceans.bill_of_lading.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('import.oceans.bill_of_lading.create', compact('user_open_id'));
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
            $bill_of_lading= $request->all();
            $bill_of_lading['user_create_id'] = Auth::user()->id;
            $bill_of_lading['user_update_id'] = Auth::user()->id;
            $bill_of_lading['user_open_id'] = Auth::user()->id;
            $sum_prepaid =0;
            $sum_collect=0;
            $i=0;
            while (isset($bill_of_lading['billing_amount'][$i])){
                if($bill_of_lading['billing_bill_type'][$i] == 'P' ){ $sum_prepaid += $bill_of_lading['billing_amount'][$i]; }
                else{ $sum_collect+= $bill_of_lading['billing_amount'][$i]; };
                $i++;
            }
            $bill_of_lading['total_prepaid']= $sum_prepaid;
            $bill_of_lading['total_collected']= $sum_collect;

            $imp=IoBillOfLading::create($bill_of_lading);
            if($bill_of_lading['bl_class'] == '3'){
                $bill_of_lading['origin_id'] = $bill_of_lading['port_loading_id'];
                $bill_of_lading['destination_id'] = $bill_of_lading['port_unloading_id'];
                $bill_of_lading['carrier_type'] = 'O';
                $bill_of_lading['source'] = 'OI';
                $bill_of_lading['code']= $bill_of_lading['mbl_code'];
                AccInvoice::createInvoice($bill_of_lading, $imp->id);
            }
            IoBillOfLadingCargo::saveDetail($imp->id, $bill_of_lading);
            IoBillOfLadingContainer::saveDetail($imp->id, $bill_of_lading);
            IoBillOfLadingOriginCharge::saveDetail($imp->id, $bill_of_lading);
            $id = $imp->id;
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('import.oceans.bill_of_lading.edit', [$id]);
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
        $bill_of_lading = IoBillOfLading::findOrFail($id);
        $user_open_id =  ($bill_of_lading->user_open_id == 0) ? Auth::user()->id : $bill_of_lading->user_open_id;

        $bill_of_lading = self::updateOpenStatus($bill_of_lading);
        $bill_of_lading->save();

        return view('import.oceans.bill_of_lading.edit', compact('bill_of_lading', 'user_open_id'));
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
            $sent = IoBillOfLading::findorfail($id);
            $sum_prepaid =0;
            $sum_collect=0;
            $i=0;
            while (isset($bill_of_lading['billing_amount'][$i])){
                if($bill_of_lading['billing_bill_type'][$i] == 'P' ){ $sum_prepaid += $bill_of_lading['billing_amount'][$i]; }
                else{ $sum_collect+= $bill_of_lading['billing_amount'][$i]; };
                $i++;
            }
            $bill_of_lading['total_prepaid']= $sum_prepaid;
            $bill_of_lading['total_collected']= $sum_collect;
            if($bill_of_lading['bl_class'] == '3'){
                $bill_of_lading['origin_id'] = $bill_of_lading['port_loading_id'];
                $bill_of_lading['destination_id'] = $bill_of_lading['port_unloading_id'];
                $bill_of_lading['carrier_type'] = 'O';
                $bill_of_lading['source'] = 'OI';
                $bill_of_lading['code']= $bill_of_lading['mbl_code'];
                AccInvoice::createInvoice($bill_of_lading, $id);
            }
            $imp = $sent->update($bill_of_lading);
            $bill_of_lading['user_update_id'] = Auth::user()->id;
            IoBillOfLadingCargo::saveDetail($id, $bill_of_lading);
            IoBillOfLadingContainer::saveDetail($id, $bill_of_lading);
            IoBillOfLadingOriginCharge::saveDetail($id, $bill_of_lading);
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('import.oceans.bill_of_lading.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill_of_lading= IoBillOfLading::find($id);
        $bill_of_lading->delete();
    }
    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $bill_of_lading = IoBillOfLading::findOrFail($id);
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
        $bill_of_lading = IoBillOfLading::findOrFail($data['id']);
        return [
            'id'   => $bill_of_lading->user_open_id,
            'name' => $bill_of_lading->user_open_id > 0 ? $bill_of_lading->user_open->name : '',
        ];
    }

    public function report(Request $request ) {
        $id = $request->get('_id');
        $type = $request->get('_type');
        $bill_of_lading = null;

        try {
            $bill_of_lading = IoBillOfLading::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        switch ($type) {
            case 1:
               return \PDF::loadView('import.oceans.bill_of_lading.pre_alert', compact('bill_of_lading'))->stream($bill_of_lading->code.'.pdf');
                break;
            case 2:
                return \PDF::loadView('import.oceans.bill_of_lading.delivery_order', compact('bill_of_lading'))->stream($bill_of_lading->code.'.pdf');
                break;
            case 3:
                return \PDF::loadView('import.oceans.bill_of_lading.bill_of_lading', compact('bill_of_lading'))->stream($bill_of_lading->code.'.pdf');
                break;
            case 4:
                return \PDF::loadView('import.oceans.bill_of_lading.arrival_notice', compact('bill_of_lading'))->stream($bill_of_lading->code.'.pdf');
                //return view('import.oceans.bill_of_lading.arrival_notice', compact('bill_of_lading'));
                break;
            case 5:
                return \PDF::loadView('import.oceans.bill_of_lading.freight_invoice', compact('bill_of_lading'))->stream($bill_of_lading->code.'.pdf');
                break;
            default:
                $response = [''];
        }

        return response()->json($response);
    }

    public function pre_alert($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $bill_of_lading = IoBillOfLading::findOrFail($id);
                return \PDF::loadView('import.oceans.io_bill_of_lading.pre_alert', compact('bill_of_lading','type'))->stream($bill_of_lading->code.'.pdf');
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
                $bill_of_lading = IoBillOfLading::findOrFail($id);
                return \PDF::loadView('import.oceans.io_bill_of_lading.delivery_order', compact('bill_of_lading','type'))->stream($bill_of_lading->code.'.pdf');
            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

    public function bill_of_lading($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $bill_of_lading = IoBillOfLading::findOrFail($id);
                return \PDF::loadView('import.oceans.io_ill_of_lading.bill_of_lading', compact('bill_of_lading','type'))->stream($bill_of_lading->code.'.pdf');
            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

    public function arrival_notice($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $bill_of_lading = IoBillOfLading::findOrFail($id);
                return \PDF::loadView('import.oceans.io_bill_of_lading.arrival_notice', compact('bill_of_lading','type'))->stream($bill_of_lading->code.'.pdf');
            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

    public function excel(Request $request)
    {
        Excel::create('bl_excel', function ($excel)  use ($request) {
            $excel->sheet('bl_excel', function ($sheet) use ($request) {
                $query = IoBillOfLading::leftJoin('mst_divisions', 'io_bill_of_lading.division_id', '=', 'mst_divisions.id')
                    ->leftJoin('io_routing_order AS ro', 'io_bill_of_lading.routing_order_id', '=', 'ro.id')
                    ->leftJoin('mst_customers AS c1', 'io_bill_of_lading.shipper_id', '=', 'c1.id')
                    ->leftJoin('mst_customers AS c2', 'io_bill_of_lading.consignee_id', '=', 'c2.id')
                    ->leftJoin('mst_ocean_ports AS p1', 'io_bill_of_lading.port_loading_id', '=', 'p1.id')
                    ->leftJoin('mst_services AS service', 'io_bill_of_lading.service_id', '=', 'service.id')

                    ->select(['io_bill_of_lading.shipment_code as FILE','ro.code as RO', DB::raw('upper(c2.name) as CLIENTE'), DB::raw('upper(c1.name) as SHIPPER'), DB::raw('upper(io_bill_of_lading.customer_reference) as CUSTOMER_REFERENCE'), DB::raw('space(1) as VOLUMEN'),  DB::raw('upper(p1.name) as PORT_OF_LOADING'), DB::raw('upper(service.name) as SERVICIO'), 'io_bill_of_lading.mbl_number as BOOKING_MBL', 'io_bill_of_lading.departure_date as ETD','io_bill_of_lading.code as HBL', DB::raw('upper(io_bill_of_lading.bill_comments ) as NOVEDADES'), DB::raw('space(1) as ESTADO_DE_EMBARQUE'), DB::raw('space(1) as CONFIRMACION_DE_ZARPE'), DB::raw('space(1) as PREALERTA_FINAL_AGENTE'), DB::raw('space(1) as PREALERTA_FINAL_CLIENTE'), DB::raw('space(1) as DOCUMENTO_EN_SISTEMA'), DB::raw('space(1) as INGRESO_CONTIFICO'), DB::raw('space(1) as AVISO_DE_LLEGADA'), DB::raw('space(1) as FACTURACION'), DB::raw('space(1) as FACTURA_ENVIADA_A_CLIENTE'), DB::raw('space(1) as CAS_HABILITADA'), DB::raw('space(1) as LIQUIDACION_DE_FILE'), DB::raw('space(1) as STATUS_FILE'), DB::raw('space(1) as ENTREGA_DE_BL'), DB::raw('space(1) as ENTREGA_DE_FACTURA'),]);
                $sheet->fromArray($query->get());
            });
        })->download('xlsx');
    }

}
