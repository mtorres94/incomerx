<?php

namespace Sass\Http\Controllers\Maintenance\CountriesDestinations;

use Illuminate\Http\Request;

use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\ZipCode;

class ZipCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
            $zip_codes = ZipCode::where(function ($query) use ($request) {
                if ($term = $request->get('term')) {
                    $query->orWhere('code', 'LIKE', $term . '%');
                    $query->orWhere('city', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($zip_codes as $zip_code) {
                $results[] = [
                    'id' => $zip_code->id,
                    'code' => strtoupper($zip_code->code),
                    'name' => strtoupper($zip_code->city),
                    'country_id' => $zip_code->country_id,
                    'country_name' => $zip_code->country_id > 0 ? $zip_code->country->name : "",
                    'state_id' => $zip_code->state_id,
                    'state_name' => $zip_code->state_id > 0 ? $zip_code->state->name : "",
                ];
            }

            return response()->json($results);
        }
    }
}
