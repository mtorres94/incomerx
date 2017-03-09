<?php

namespace Sass\Http\Controllers\Maintenance\CountriesDestinations;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Sass\Country;
use Sass\DataTables\Maintenance\CountriesDestinations\CountryDataTable;
use Sass\Http\Controllers\Controller;


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
        $user_open_id = Auth::user()->id;
        return view('maintenance.countries_destinations.countries.create', compact('user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = $request->all();
        $country['user_create_id'] = Auth::user()->id;
        $country['user_update_id'] = Auth::user()->id;
        $countries= Country::create($country);
        $id= $countries->id;
        return redirect()->route('maintenance.countries_destinations.countries.edit', [$id]);
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
        $user_open_id =  ($country->user_open_id == 0) ? Auth::user()->id : $country->user_open_id;
        $country = self::updateOpenStatus($country);
        $country->save();
        return view('maintenance.countries_destinations.countries.edit', compact('country', 'user_open_id'));
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
        $country = Country::findOrFail($id);
        $country['user_update_id'] = Auth::user()->id;
        $country->fill($request->all());
        $country->save();
        return redirect()->route('maintenance.countries_destinations.countries.edit', [$id]);
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

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $type = Country::findOrFail($id);
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
        $type = Country::findOrFail($data['id']);
        return [
            'id'   => $type->user_open_id,
            'name' => $type->user_open_id > 0 ? $type->user_open->name : '',
        ];
    }
}
