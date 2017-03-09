<?php

namespace Sass\Http\Controllers\Maintenance\DivisionsDepartments;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        $user_open_id = Auth::user()->id;
        return view('maintenance.divisions_departments.departments.create', compact('user_open_id'));
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
        $departments= Department::create($department);
        $id = $departments->id;
        return redirect()->route('maintenance.divisions_departments.departments.edit', [$id]);
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
        $user_open_id =  ($department->user_open_id == 0) ? Auth::user()->id : $department->user_open_id;
        $department = self::updateOpenStatus($department);
        $department->save();
        return view('maintenance.divisions_departments.departments.edit', compact('department', 'user_open_id'));
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
        return redirect()->route('maintenance.divisions_departments.departments.edit', [$id]);
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


    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $type = Department::findOrFail($id);
            if (Auth::user()->id == $type->user_open_id)
            {
                $type = self::updateCloseStatus($type);
                $type->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $type = Department::findOrFail($data['id']);
        return [
            'id'   => $type->user_open_id,
            'name' => $type->user_open_id > 0 ? $type->user_open->name : '',
        ];
    }
}
