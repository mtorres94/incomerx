<?php

namespace Sass\Http\Controllers\Maintenance\DivisionsDepartments;

use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\DivisionsDepartments\DepartmentDataTable;
use Sass\Department;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\DivisionsDepartments\DepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param DepartmentDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(DepartmentDataTable $dataTable)
    {
        return $dataTable->render('maintenance.divisions_departments.departments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.divisions_departments.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $department = $request->all();
        $department['user_create_id'] = Auth::user()->id;
        $department['user_update_id'] = Auth::user()->id;
        Department::create($department);
        return redirect()->route('maintenance.divisions_departments.departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('maintenance.divisions_departments.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('maintenance.divisions_departments.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        $department = Department::findOrFail($id);
        $department['user_update_id'] = Auth::user()->id;
        $department->fill($request->all());
        $department->save();
        return redirect()->route('maintenance.divisions_departments.departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
    }
}
