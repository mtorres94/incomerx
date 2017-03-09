<?php

namespace Sass\Http\Controllers\Maintenance\CountriesDestinations;
use Illuminate\Http\Request;

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
        $user_open_id = Auth::user()->id;
        return view('maintenance.countries_destinations.cities.create', compact('user_open_id'));
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
        $city = City::create($city);
        $id = $city->id;
        return redirect()->route('maintenance.countries_destinations.cities.edit', [$id]);
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
        $user_open_id =  ($city->user_open_id == 0) ? Auth::user()->id : $city->user_open_id;
        $city = self::updateOpenStatus($city);
        $city->save();
        return view('maintenance.countries_destinations.cities.edit', compact('city', 'user_open_id'));
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
        return redirect()->route('maintenance.countries_destinations.cities.edit', [$id]);
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


    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $type = City::findOrFail($id);
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
        $type = City::findOrFail($data['id']);
        return [
            'id'   => $type->user_open_id,
            'name' => $type->user_open_id > 0 ? $type->user_open->name : '',
        ];
    }
}
