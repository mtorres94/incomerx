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
            //dd($bill_of_lading);
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
}
