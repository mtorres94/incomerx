<?php

namespace Sass\Http\Controllers\Maintenance\CountriesDestinations;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\CountriesDestinations\WorldLocationDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\CountriesDestinations\WorldLocationRequest;
use Sass\WorldLocation;

class WorldLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param WorldLocationDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(WorldLocationDataTable $dataTable)
    {
        return $dataTable->render('maintenance.countries_destinations.world_locations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.countries_destinations.world_locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param WorldLocationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorldLocationRequest $request)
    {
        $world_location = $request->all();
        $world_location['user_create_id'] = Auth::user()->id;
        $world_location['user_update_id'] = Auth::user()->id;
        WorldLocation::create($world_location);
        return redirect()->route('maintenance.countries_destinations.world_locations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $world_location = WorldLocation::findOrFail($id);
        return view('maintenance.countries_destinations.world_locations.show', compact('world_location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $world_location = WorldLocation::findOrFail($id);
        return view('maintenance.countries_destinations.world_locations.edit', compact('world_location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WorldLocationRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorldLocationRequest $request, $id)
    {
        $world_location = WorldLocation::findOrFail($id);
        $world_location['user_update_id'] = Auth::user()->id;
        $world_location->fill($request->all());
        $world_location->save();
        return redirect()->route('maintenance.countries_destinations.world_locations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $world_location = WorldLocation::find($id);
        $world_location->delete();
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
            $world_locations = WorldLocation::where(function ($query) use ($request) {
                if ($_22 = $request->get('term')) {
                    $query->orWhere('code', 'LIKE',  $_22 . '%');
                    $query->orWhere('name', 'LIKE',  $_22 . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($world_locations as $world_location) {
                $results[] = ['id' => $world_location->id, 'value' => strtoupper($world_location->name)];
            }

            return response()->json($results);
        }
    }
}
