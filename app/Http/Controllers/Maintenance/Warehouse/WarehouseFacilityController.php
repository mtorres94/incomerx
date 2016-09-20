<?php

namespace Sass\Http\Controllers\Maintenance\Warehouse;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\Warehouse\WarehouseFacilityDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\Warehouse\WarehouseFacilityRequest;
use Sass\WarehouseFacility;

class WarehouseFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param WarehouseFacilityDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(WarehouseFacilityDataTable $dataTable)
    {
        return $dataTable->render('maintenance.warehouse.warehouse_facilities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.warehouse.warehouse_facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param WarehouseFacilityRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarehouseFacilityRequest $request)
    {
        $warehouse_facility = $request->all();
        $warehouse_facility['user_create_id'] = Auth::user()->id;
        $warehouse_facility['user_update_id'] = Auth::user()->id;
        WarehouseFacility::create($warehouse_facility);
        return redirect()->route('maintenance.warehouse.warehouse_facilities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warehouse_facility = WarehouseFacility::findOrFail($id);
        return view('maintenance.warehouse.warehouse_facilities.show', compact('warehouse_facility'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warehouse_facility = WarehouseFacility::findOrFail($id);
        return view('maintenance.warehouse.warehouse_facilities.edit', compact('warehouse_facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WarehouseFacilityRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(WarehouseFacilityRequest $request, $id)
    {
        $warehouse_facility = WarehouseFacility::findOrFail($id);
        $warehouse_facility['user_update_id'] = Auth::user()->id;
        $warehouse_facility->fill($request->all());
        $warehouse_facility->save();
        return redirect()->route('maintenance.warehouse.warehouse_facilities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warehouse_facility = WarehouseFacility::find($id);
        $warehouse_facility->delete();
    }

    /**
     * Search for records that match the parameter received.
     *
     * @param Request $request
     * @return mixed
     */
    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $warehouses = WarehouseFacility::where(function ($query) use ($request) {
                if ($term = $request->get('term')) {
                    $query->orWhere('code', 'LIKE', $term . '%');
                    $query->orWhere('name', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($warehouses as $warehouse) {
                $results[] = [
                    'id' => $warehouse->id,
                    'name' => strtoupper($warehouse->name),
                ];
            }

            return response()->json($results);
        }
    }
}
