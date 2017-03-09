<?php

namespace Sass\Http\Controllers\Maintenance\DivisionsDepartments;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\DivisionsDepartments\SubdepartmentDataTable;
use Sass\Http\Controllers\Controller;

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
        $user_open_id = Auth::user()->id;
        return view('maintenance.divisions_departments.subdepartments.create', compact('user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subdepartment = $request->all();
        $subdepartment['user_create_id'] = Auth::user()->id;
        $subdepartment['user_update_id'] = Auth::user()->id;
        $sub= Subdepartment::create($subdepartment);
        $id = $sub->id;
        return redirect()->route('maintenance.divisions_departments.subdepartments.edit', [$id]);
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
        $user_open_id =  ($subdepartment->user_open_id == 0) ? Auth::user()->id : $subdepartment->user_open_id;
        $subdepartment = self::updateOpenStatus($subdepartment);
        $subdepartment->save();
        return view('maintenance.divisions_departments.subdepartments.edit', compact('subdepartment', 'user_open_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subdepartment = Subdepartment::findOrFail($id);
        $subdepartment['user_update_id'] = Auth::user()->id;
        $subdepartment->fill($request->all());
        $subdepartment->save();
        return redirect()->route('maintenance.divisions_departments.subdepartments.edit', [$id]);
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

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $type = Subdepartment::findOrFail($id);
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
        $type = Subdepartment::findOrFail($data['id']);
        return [
            'id'   => $type->user_open_id,
            'name' => $type->user_open_id > 0 ? $type->user_open->name : '',
        ];
    }
}
