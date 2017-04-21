<?php

namespace Sass\Http\Controllers\Export\Air;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Export\Air\EaLoadingGuideDataTable;
use Sass\EaAirwayBill;
use Sass\EaLoadingGuide;
use Sass\EaLoadingGuideContainer;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\ReceiptEntry;

class EaLoadingGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EaLoadingGuideDataTable $dataTable)
    {
        return $dataTable->render('export.air.loading_guides.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('export.air.loading_guides.create', compact('user_open_id'));
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
            $loading_guides = $request->all();
            $last = EaLoadingGuide::orderBy('code','desc')->first();
            $frmt = $last == null ? 1 : intval(substr($last->code, 4)) + 1;
            $code = str_pad($frmt, 6, '0', 0);
            $loading_guides['code'] = 'EAG-'.$code;
            $loading_guides['user_create_id'] = Auth::user()->id;
            $loading_guides['user_update_id'] = Auth::user()->id;
            $loading_guides['user_open_id'] = Auth::user()->id;

            $id=EaLoadingGuide::create($loading_guides)->id;
            EaLoadingGuideContainer::saveDetail($id, $loading_guides);
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.air.loading_guides.edit', [$id]);
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
        $loading_guide= EaLoadingGuide::findOrFail($id);
        $user_open_id =  ($loading_guide->user_open_id == 0) ? Auth::user()->id : $loading_guide->user_open_id;
        $loading_guide = self::updateOpenStatus($loading_guide);
        $loading_guide->save();
        return view('export.air.loading_guides.edit', compact('loading_guide', 'user_open_id'));
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
            $loading_guide = $request->all();
            $loading_guide['user_update_id'] = Auth::user()->id;
            $sent = EaLoadingGuide::findorfail($id);
            $sent->update($loading_guide);

            EaLoadingGuideContainer::saveDetail($id, $loading_guide);

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.air.loading_guides.edit', [$id]);
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

    public function storeAwb(Request $request)
    {
        DB::beginTransaction();
        $loading_guide = $request->all();
        $hbl_code = 0;
        try {
            $loading_guide['user_create_id'] = Auth::user()->id;
            $loading_guide['user_update_id'] = Auth::user()->id;
            $loading_guide['user_open_id'] = Auth::user()->id;
            $sum_pieces=0; $sum_weight=0; $sum_volume_weight=0;

            for ($x=0 ; $x < count($loading_guide['warehouse_select']); $x++){
                for( $y=0; $y < count($loading_guide['warehouse_id']); $y++){
                    if($loading_guide['warehouse_select'][$x] == $loading_guide['warehouse_id'][$y]){
                        $sum_pieces= $sum_pieces + $loading_guide['pieces'][$y];
                        $sum_weight= $sum_weight + $loading_guide['weight'][$y];
                        $sum_volume_weight= $sum_volume_weight + $loading_guide['volume_weight'][$y];
                    }
                }
            }
            $loading_guide['total_pieces']= $sum_pieces;
            $loading_guide['total_gross_weight']= $sum_weight;
            $loading_guide['total_volume_weight']= $sum_volume_weight;

            $hbl_code= EaAirwayBill::saveDetail($loading_guide['tmp_loading_guide_id'], $loading_guide);
            DB::commit();
        } catch (\PDOException $e) {
            DB::rollback();
        }
            return redirect()->route('export.air.airwaybills.edit', [$hbl_code]);
    }

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $loading_guide = EaLoadingGuide::findOrFail($id);
            if (Auth::user()->id == $loading_guide->user_open_id)
            {

                $loading_guide = self::updateCloseStatus($loading_guide);
                $loading_guide->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $loading_guide = EaLoadingGuide::findOrFail($data['id']);
        return [
            'id'   => $loading_guide->user_open_id,
            'name' => $loading_guide->user_open_id > 0 ? $loading_guide->user_open->name : '',
        ];
    }

    public function get_warehouses(Request $request)
    {
        if ($request->ajax()) {
            $loading_guides = ReceiptEntry::where(function ($query) use ($request) {
                $query->where('whr_receipts_entries.ea_loading_guide_id', '=', $request->get('id'));
                $query->where('whr_receipts_entries.status', 'P');
            })->get();
            $results = [];
            foreach ($loading_guides as $data) {
                    $results[] = [
                        'id' => $data->id,
                        'value' => strtoupper($data->code),
                        'date_in' => strtoupper($data->date_in),
                        'status' => strtoupper($data->status),
                        'shipper_name' => strtoupper($data->shipper_id > 0 ? $data->shipper->name: ""),
                        'shipper_id' => strtoupper($data->shipper_id),
                        'consignee_name' => strtoupper($data->consignee_id > 0 ? $data->consignee->name: ""),
                        'consignee_id' => strtoupper($data->consignee_id),
                        'sum_pieces' => strtoupper($data->sum_pieces),
                        'sum_weight' => strtoupper($data->sum_weight),
                        'sum_volume_weight' => strtoupper($data->sum_volume_weight),
                        'sum_cubic' => strtoupper($data->sum_cubic),
                        'volume_weight' => $data->sum_volume_weight,
                        'container_id' => 1,
                        'cargo_loader_id' => $data->cargo_loader_id,
                        'shipper_address' => $data->shipper_address,
                        'shipper_city' => $data->shipper_city,
                        'shipper_state_id' => $data->shipper_state_id,
                        'shipper_phone' => $data->shipper_phone,
                        'shipper_fax' => $data->shipper_fax,
                        'consignee_address' => $data->consignee_address,
                        'consignee_city' => $data->consignee_city,
                        'consignee_state_id' => $data->consignee_state_id,
                        'consignee_phone' => $data->consignee_phone,
                        'consignee_fax' => $data->consignee_fax,
                        'hazardous' => $data->is_hazardous,
                        'destination' => $data->location_destination_code,
                    ];
            }
            return response()->json($results);
        }

    }

    public function report(Request $request) {
        $id = $request->get('_id');
        $type = $request->get('_type');
        $loading_guide = null;

        try {
            $loading_guide = EaLoadingGuide::findOrFail($id);

        } catch (ModelNotFoundException $e) {
            abort(404);
        }
        switch ($type) {
            case 1:
                return \PDF::loadView('export.air.loading_guides.load_plan', compact('loading_guide'))->stream($loading_guide->code.'.pdf');
                break;
            case 2:
                return \PDF::loadView('export.air.loading_guides.packing_instructions', compact('loading_guide'))->stream($loading_guide->code.'.pdf');

                break;
            case 3:

                return \PDF::loadView('export.air.loading_guides.load_list', compact('loading_guide'))
                    ->stream($loading_guide->code.'.pdf');


                break;
            default:
                $response = [''];
        }

        return response()->json($response);
    }
}
