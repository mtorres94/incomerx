<?php

namespace Sass\Http\Controllers\Maintenance\DivisionsDepartments;

use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\DivisionsDepartments\SubdepartmentDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\DivisionsDepartments\SubdepartmentRequest;
use Sass\Subdepartment;

class SubdepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SubdepartmentDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(SubdepartmentDataTable $dataTable)
    {
        return $dataTable->render('maintenance.divisions_departments.subdepartments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.divisions_departments.subdepartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubdepartmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubdepartmentRequest $request)
    {
        $subdepartment = $request->all();
        $subdepartment['user_create_id'] = Auth::user()->id;
        $subdepartment['user_update_id'] = Auth::user()->id;
        Subdepartment::create($subdepartment);
        return redirect()->route('maintenance.divisions_departments.subdepartments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subdepartment = Subdepartment::findOrFail($id);
        return view('maintenance.divisions_departments.subdepartments.show', compact('subdepartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subdepartment = Subdepartment::findOrFail($id);
        return view('maintenance.divisions_departments.subdepartments.edit', compact('subdepartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SubdepartmentRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubdepartmentRequest $request, $id)
    {
        $subdepartment = Subdepartment::findOrFail($id);
        $subdepartment['user_update_id'] = Auth::user()->id;
        $subdepartment->fill($request->all());
        $subdepartment->save();
        return redirect()->route('maintenance.divisions_departments.subdepartments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subdepartment = Subdepartment::find($id);
        $subdepartment->delete();
    }
}
