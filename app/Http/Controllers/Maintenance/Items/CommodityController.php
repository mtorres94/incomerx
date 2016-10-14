<?php

namespace Sass\Http\Controllers\Maintenance\Items;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sass\Commodity;
use Sass\DataTables\Maintenance\Items\CommodityDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\Items\CommodityRequest;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CommodityDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(CommodityDataTable $dataTable)
    {
        return $dataTable->render('maintenance.items.commodities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.items.commodities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CommodityRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommodityRequest $request)
    {
        $commodity = $request->all();
        $commodity['user_create_id'] = Auth::user()->id;
        $commodity['user_update_id'] = Auth::user()->id;
        Commodity::create($commodity);
        return redirect()->route('maintenance.items.commodities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commodity = Commodity::findOrFail($id);
        return view('maintenance.items.commodities.show', compact('commodity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commodity = Commodity::findOrFail($id);
        return view('maintenance.items.commodities.edit', compact('commodity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CommodityRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommodityRequest $request, $id)
    {
        $commodity = Commodity::findOrFail($id);
        $commodity['user_update_id'] = Auth::user()->id;
        $commodity->fill($request->all());
        $commodity->save();
        return redirect()->route('maintenance.items.commodities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commodity = Commodity::find($id);
        $commodity->delete();
    }

    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $commodities = Commodity::where(function ($query) use ($request) {
                if ($term = $request->get('term')) {
                    $query->orWhere('id', 'LIKE', $term . '%');
                    $query->orWhere('name', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($commodities as $commodity) {
                $results[] = [
                    'id'                => $commodity->id,
                    'name'             => strtoupper($commodity->name),
                ];
            }

            return response()->json($results);
        }
    }
}
