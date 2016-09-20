<?php

namespace Sass\Http\Controllers\Maintenance\CountriesDestinations;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Sass\Country;
use Sass\DataTables\Maintenance\CountriesDestinations\CountryDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\CountriesDestinations\CountryRequest;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CountryDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(CountryDataTable $dataTable)
    {
        return $dataTable->render('maintenance.countries_destinations.countries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.countries_destinations.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $country = $request->all();
        $country['user_create_id'] = Auth::user()->id;
        $country['user_update_id'] = Auth::user()->id;
        Country::create($country);
        return redirect()->route('maintenance.countries_destinations.countries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::findOrFail($id);
        return view('maintenance.countries_destinations.countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('maintenance.countries_destinations.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CountryRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        $country = Country::findOrFail($id);
        $country['user_update_id'] = Auth::user()->id;
        $country->fill($request->all());
        $country->save();
        return redirect()->route('maintenance.countries_destinations.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
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
            $countries = Country::where(function ($query) use ($request) {
                if ($term = $request->get('term')) {
                    $query->orWhere('code', 'LIKE', $term . '%');
                    $query->orWhere('name', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($countries as $country) {
                $results[] = ['id' => $country->id, 'value' => strtoupper($country->name)];
            }

            return response()->json($results);
        }
    }
}
