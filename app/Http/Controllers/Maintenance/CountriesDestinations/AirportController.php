<?php

namespace Sass\Http\Controllers\Maintenance\CountriesDestinations;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Sass\Airport;
use Sass\DataTables\Maintenance\CountriesDestinations\AirportDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\CountriesDestinations\AirportRequest;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AirportDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(AirportDataTable $dataTable)
    {
        return $dataTable->render('maintenance.countries_destinations.airports.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.countries_destinations.airports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AirportRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AirportRequest $request)
    {
        $airport = $request->all();
        $airport['user_create_id'] = Auth::user()->id;
        $airport['user_update_id'] = Auth::user()->id;
        Airport::create($airport);
        return redirect()->route('maintenance.countries_destinations.airports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $airport = Airport::findOrFail($id);
        return view('maintenance.countries_destinations.airports.show', compact('airport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $airport = Airport::findOrFail($id);
        return view('maintenance.countries_destinations.airports.edit', compact('airport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AirportRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AirportRequest $request, $id)
    {
        $airport = Airport::findOrFail($id);
        $airport['user_update_id'] = Auth::user()->id;
        $airport->fill($request->all());
        $airport->save();
        return redirect()->route('maintenance.countries_destinations.airports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $airport = Airport::find($id);
        $airport->delete();
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
            $airports = Airport::where(function ($query) use ($request) {
                if ($term = $request->get('term')) {
                    $query->orWhere('code', 'LIKE', $term . '%');
                    $query->orWhere('name', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($airports as $airport) {
                $results[] = [
                    'id' => $airport->id,
                    'code' => strtoupper($airport->code),
                    'name' => strtoupper($airport->name),
                    'country_id' => $airport->country_id,
                    'country_name' => $airport->country_id > 0 ? $airport->country->name : "",
                ];
            }

            return response()->json($results);
        }
    }
}
