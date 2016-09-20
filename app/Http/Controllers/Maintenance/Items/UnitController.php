<?php

namespace Sass\Http\Controllers\Maintenance\Items;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\Items\UnitDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\Items\UnitRequest;
use Sass\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param UnitDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(UnitDataTable $dataTable)
    {
        return $dataTable->render('maintenance.items.units.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.items.units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UnitRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $request)
    {
        $unit = $request->all();
        $unit['user_create_id'] = Auth::user()->id;
        $unit['user_update_id'] = Auth::user()->id;
        Unit::create($unit);
        return redirect()->route('maintenance.items.units.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = Unit::findOrFail($id);
        return view('maintenance.items.units.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('maintenance.items.units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UnitRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnitRequest $request, $id)
    {
        $unit = Unit::findOrFail($id);
        $unit['user_update_id'] = Auth::user()->id;
        $unit->fill($request->all());
        $unit->save();
        return redirect()->route('maintenance.items.units.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = Unit::find($id);
        $unit->delete();
    }

    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $units = Unit::where(function ($query) use ($request) {
                if ($term = $request->get('term')) {
                    $query->orWhere('abbreviation', 'LIKE', $term . '%');
                    $query->orWhere('name', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($units as $unit) {
                $results[] = [
                    'id'                => $unit->id,
                    'value'             => strtoupper($unit->name),
                ];
            }

            return response()->json($results);
        }
    }
}
