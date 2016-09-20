<?php

namespace Sass\Http\Controllers\Maintenance\DivisionsDepartments;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\DivisionsDepartments\DivisionDataTable;
use Sass\Division;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\DivisionsDepartments\DivisionRequest;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param DivisionDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(DivisionDataTable $dataTable)
    {
        return $dataTable->render('maintenance.divisions_departments.divisions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.divisions_departments.divisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DivisionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DivisionRequest $request)
    {
        $division = $request->all();
        $division['user_create_id'] = Auth::user()->id;
        $division['user_update_id'] = Auth::user()->id;
        Division::create($division);
        return redirect()->route('maintenance.divisions_departments.divisions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $division = Division::findOrFail($id);
        return view('maintenance.divisions_departments.divisions.show', compact('division'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $division = Division::findOrFail($id);
        return view('maintenance.divisions_departments.divisions.edit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DivisionRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DivisionRequest $request, $id)
    {
        $division = Division::findOrFail($id);
        $division['user_update_id'] = Auth::user()->id;
        $division->fill($request->all());
        $division->save();
        return redirect()->route('maintenance.divisions_departments.divisions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $division = Division::find($id);
        $division->delete();
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
            $divisions = Division::where(function ($query) use ($request) {
                if ($_41 = $request->get('term')) {
                    $query->orWhere('code', 'LIKE', $_41 . '%');
                    $query->orWhere('name', 'LIKE', $_41 . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($divisions as $division) {
                $results[] = ['id' => $division->id, 'value' => strtoupper($division->name)];
            }

            return response()->json($results);
        }
    }
}
