<?php

namespace Sass\Http\Controllers\Export\OceanExport;

use Illuminate\Http\Request;

use Sass\CargoLoader;
use Sass\CargoLoaderContainer;
use Sass\CargoLoaderHazardous;
use Sass\DataTables\Export\Ocean\CargoLoaderDataTable;
use Sass\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Sass\Http\Requests;
use Sass\ReceiptEntry;

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
    public function create()
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
            CargoLoaderContainer::saveDetail($cl->id, $cargo_loader);
            CargoLoaderHazardous::saveDetail($cl->id, $cargo_loader);
            CargoLoaderCargoDetails::saveDetail($cl->id, $cargo_loader);
            ReceiptEntry::saveDetail($cargo_loader);
            $containers=CargoLoaderContainer::Search($cl->id);
            $hazardous_details=CargoLoaderHazardous::Search($cl->id);

           return view('export.oceans.booking_entries.create', compact( 'containers', 'hazardous_details'));

            } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();



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
        //
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
        //
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
}
