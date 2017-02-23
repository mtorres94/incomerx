<?php

namespace Sass\Http\Controllers\Import\Air;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Sass\DataTables\Import\Air\IaBillOfLadingDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\IaBillOfLading;
use Sass\IaBillOfLadingCargo;
use Sass\IaBillOfLadingOriginCharge;
use Maatwebsite\Excel\Facades\Excel;

class IaBillOfLadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IaBillOfLadingDataTable $dataTable)
    {
        return $dataTable->render('import.air.bill_of_lading.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('import.air.bill_of_lading.create', compact('user_open_id'));
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
            $bill_of_lading['sum_prepaid']= $sum_prepaid;
            $bill_of_lading['sum_collected']= $sum_collect;
            $imp=IaBillOfLading::create($bill_of_lading);
            IaBillOfLadingCargo::saveDetail($imp->id, $bill_of_lading);
            IaBillOfLadingOriginCharge::saveDetail($imp->id, $bill_of_lading);
            $id = $imp->id;
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('import.air.bill_of_lading.edit', [$id]);
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
        $bill_of_lading = IaBillOfLading::findOrFail($id);
        $user_open_id =  ($bill_of_lading->user_open_id == 0) ? Auth::user()->id : $bill_of_lading->user_open_id;

        $bill_of_lading = self::updateOpenStatus($bill_of_lading);
        $bill_of_lading->save();

        return view('import.air.bill_of_lading.edit', compact('bill_of_lading', 'user_open_id'));
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
            $sent = IaBillOfLading::findorfail($id);
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
            $sent->update($bill_of_lading);
            $bill_of_lading['user_update_id'] = Auth::user()->id;

            IaBillOfLadingCargo::saveDetail($id, $bill_of_lading);
            IaBillOfLadingOriginCharge::saveDetail($id, $bill_of_lading);
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('import.air.bill_of_lading.edit', [$id]);
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
        $bill_of_lading = $request->all();
        $bl_id = $bill_of_lading->id;
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

    public function arrival_notice($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $bill_of_lading = IaBillOfLading::findOrFail($id);
                return \PDF::loadView('import.air.bill_of_lading.arrival_notice', compact('bill_of_lading','type'))->stream($bill_of_lading->code.'.pdf');
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
                $bill_of_lading = IaBillOfLading::findOrFail($id);
                return \PDF::loadView('import.air.bill_of_lading.pre_alert', compact('bill_of_lading','type'))->stream($bill_of_lading->code.'.pdf');
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
                $bill_of_lading = IaBillOfLading::findOrFail($id);
                return \PDF::loadView('import.air.bill_of_lading.delivery_order', compact('bill_of_lading','type'))->stream($bill_of_lading->code.'.pdf');
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
                $bill_of_lading = IaBillOfLading::findOrFail($id);
                return \PDF::loadView('import.air.bill_of_lading.bill_of_lading', compact('bill_of_lading','type'))->stream($bill_of_lading->code.'.pdf');
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
            $bill_of_lading = IaBillOfLading::findOrFail($id);
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
        $bill_of_lading = IaBillOfLading::findOrFail($data['id']);
        return [
            'id'   => $bill_of_lading->user_open_id,
            'name' => $bill_of_lading->user_open_id > 0 ? $bill_of_lading->user_open->name : '',
        ];
    }
    public function excel(Request $request)
    {
        Excel::create('bl_excel', function ($excel)  use ($request) {
            $excel->sheet('bl_excel', function ($sheet) use ($request) {
                $query = IaBillOfLading::leftJoin('mst_divisions', 'ia_bill_of_lading.division_id', '=', 'mst_divisions.id')
                    ->leftJoin('ia_routing_order AS ro', 'ia_bill_of_lading.routing_order_id', '=', 'ro.id')
                    ->leftJoin('mst_customers AS c1', 'ia_bill_of_lading.shipper_id', '=', 'c1.id')
                    ->leftJoin('mst_customers AS c2', 'ia_bill_of_lading.consignee_id', '=', 'c2.id')
                    ->leftJoin('mst_ocean_ports AS p1', 'ia_bill_of_lading.port_loading_id', '=', 'p1.id')
                    ->leftJoin('mst_services AS service', 'ia_bill_of_lading.service_id', '=', 'service.id')

                    ->select(['ia_bill_of_lading.shipment_code as FILE','ro.code as RO', DB::raw('upper(c2.name) as CLIENTE'), DB::raw('upper(c1.name) as SHIPPER'), DB::raw('upper(ia_bill_of_lading.customer_reference) as CUSTOMER_REFERENCE'), DB::raw('space(1) as VOLUMEN'),  DB::raw('upper(p1.name) as PORT_OF_LOADING'), DB::raw('upper(service.name) as SERVICIO'), 'ia_bill_of_lading.mbl_number as BOOKING_MBL', 'ia_bill_of_lading.departure_date as ETD','ia_bill_of_lading.code as HBL', DB::raw('upper(ia_bill_of_lading.bill_comments ) as NOVEDADES'), DB::raw('space(1) as ESTADO_DE_EMBARQUE'), DB::raw('space(1) as CONFIRMACION_DE_ZARPE'), DB::raw('space(1) as PREALERTA_FINAL_AGENTE'), DB::raw('space(1) as PREALERTA_FINAL_CLIENTE'), DB::raw('space(1) as DOCUMENTO_EN_SISTEMA'), DB::raw('space(1) as INGRESO_CONTIFICO'), DB::raw('space(1) as AVISO_DE_LLEGADA'), DB::raw('space(1) as FACTURACION'), DB::raw('space(1) as FACTURA_ENVIADA_A_CLIENTE'), DB::raw('space(1) as CAS_HABILITADA'), DB::raw('space(1) as LIQUIDACION_DE_FILE'), DB::raw('space(1) as STATUS_FILE'), DB::raw('space(1) as ENTREGA_DE_BL'), DB::raw('space(1) as ENTREGA_DE_FACTURA'),]);
                $sheet->fromArray($query->get());
            });
        })->download('xlsx');
    }
}
