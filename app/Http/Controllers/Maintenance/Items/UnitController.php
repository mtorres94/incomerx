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
        $user_open_id = Auth::user()->id;
        return view('maintenance.items.units.create', compact('user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UnitRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit = $request->all();

        $unit['user_create_id'] = Auth::user()->id;
        $unit['user_update_id'] = Auth::user()->id;
        $units =Unit::create($unit);
        $id= $units->id;
        return redirect()->route('maintenance.items.units.edit', [$id]);
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
        $user_open_id =  ($unit->user_open_id == 0) ? Auth::user()->id : $unit->user_open_id;

        $unit = self::updateOpenStatus($unit);
        $unit->save();
        return view('maintenance.items.units.edit', compact('unit', 'user_open_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UnitRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);
        $unit['user_update_id'] = Auth::user()->id;
        $unit->fill($request->all());
        $unit->save();
        return redirect()->route('maintenance.items.units.edit', [$id]);
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

    public function get(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $unit= Unit::find($id);
            $results[] = [
                'code'   => strtoupper($unit->code),
            ];
            return response()->json($results);
        }
    }


    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $type = Unit::findOrFail($id);
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
        $type = Unit::findOrFail($data['id']);
        return [
            'id'   => $type->user_open_id,
            'name' => $type->user_open_id > 0 ? $type->user_open->name : '',
        ];
    }
}
