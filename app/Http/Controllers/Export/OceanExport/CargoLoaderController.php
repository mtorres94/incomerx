<?php

namespace Sass\Http\Controllers\Export\OceanExport;

use Illuminate\Http\Request;

use Sass\CargoLoader;
use Sass\CargoLoaderCargo;
use Sass\CargoLoaderCargoDetail;
use Sass\CargoLoaderContainer;
use Sass\CargoLoaderHazardous;
use Sass\DataTables\Export\Ocean\CargoLoaderDataTable;
use Sass\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Sass\Http\Requests;
use Sass\ReceiptEntry;
use Sass\ReceiptEntryCargoDetail;
use Sass\ReceiptEntryHazardousDetail;

class CargoLoaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CargoLoaderDataTable $dataTable)
    {
        return $dataTable->render('export.oceans.cargo_loader.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    {

        return view('export.oceans.cargo_loader.create');
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
            $count = CargoLoader::count() + 1;
            $code = str_pad($count, 10, '0', STR_PAD_LEFT);
            $cargo_loader = $request->all();
            $cargo_loader['cargo_load_code'] = $code;
            $cargo_loader['user_create_id'] = Auth::user()->id;
            $cargo_loader['user_update_id'] = Auth::user()->id;
            $cl=CargoLoader::create($cargo_loader);
            $cargo_loader['cargo_loader_id']= $cl->id;
            $cargo_loader['shipping_id']= $cl->shipment_id;

            ReceiptEntry::saveDetail($cl->id,$cargo_loader);

            CargoLoaderContainer::saveDetail($cl->id, $cargo_loader);
            CargoLoaderHazardous::saveDetail($cl->id, $cargo_loader);
            CargoLoaderCargo::saveDetail($cl->id, $cargo_loader);
            CargoLoaderCargoDetail::saveDetail($cl->id, $cargo_loader);

            $containers= CargoLoaderContainer::search($cl->id);
            $cargo_details= CargoLoaderCargoDetail::search($cl->id);
            $hazardous_details= CargoLoaderHazardous::search($cl->id);
            $cargo_loader= CargoLoaderCargo::search($cl->id);

            } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return view('export.oceans.booking_entries.create', compact('containers','hazardous_details', 'cargo_details', 'cargo_loader'));


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
        $cargo_loader = CargoLoader::findOrFail($id);
        return view('export.oceans.cargo_loader.edit', compact('cargo_loader'));
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
            $cargo_loader = $request->all();
            $cargo_loader['user_update_id'] = Auth::user()->id;
            $sent = CargoLoader::findorfail($id);
            $exp = $sent->update($cargo_loader);

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.oceans.cargo_loader.index');
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
                $cargo_loader= CargoLoader::findOrFail($id);
                return \PDF::loadView('export.oceans.cargo_loader.pdf', compact('cargo_loader'))->stream('DO '.$cargo_loader->code.'.pdf');
            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }



}
