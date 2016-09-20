<?php

namespace Sass\Http\Controllers\Maintenance\CountriesDestinations;


use Illuminate\Support\Facades\Auth;
use Sass\City;
use Sass\DataTables\Maintenance\CountriesDestinations\CityDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\CountriesDestinations\CityRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CityDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(CityDataTable $dataTable)
    {
        return $dataTable->render('maintenance.countries_destinations.cities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.countries_destinations.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CityRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $city = $request->all();
        $city['user_create_id'] = Auth::user()->id;
        $city['user_update_id'] = Auth::user()->id;
        City::create($city);
        return redirect()->route('maintenance.countries_destinations.cities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::findOrFail($id);
        return view('maintenance.countries_destinations.cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('maintenance.countries_destinations.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CityRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        $city = City::findOrFail($id);
        $city['user_update_id'] = Auth::user()->id;
        $city->fill($request->all());
        $city->save();
        return redirect()->route('maintenance.countries_destinations.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();
    }
}
