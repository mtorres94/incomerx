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
        $user_open_id = Auth::user()->id;
        return view('maintenance.divisions_departments.divisions.create', compact('user_open_id'));
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
        $divisions= Division::create($division);
        $id = $divisions->id;
        return redirect()->route('maintenance.divisions_departments.divisions.edit', [$id]);
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
        $user_open_id =  ($division->user_open_id == 0) ? Auth::user()->id : $division->user_open_id;
        $division = self::updateOpenStatus($division);
        $division->save();
        return view('maintenance.divisions_departments.divisions.edit', compact('division', 'user_open_id'));
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
        return redirect()->route('maintenance.divisions_departments.divisions.edit', [$id]);
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

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $type = Division::findOrFail($id);
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
        $type = Division::findOrFail($data['id']);
        return [
            'id'   => $type->user_open_id,
            'name' => $type->user_open_id > 0 ? $type->user_open->name : '',
        ];
    }
}
