<?php

namespace Sass\Http\Controllers\Maintenance\Warehouse;

use Illuminate\Http\Request;

use Sass\ExportCode;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;

class ExportCodeController extends Controller
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
    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $export_codes = ExportCode::where(function ($query) use ($request) {
                # $location_id = Input::get('cargo_location_id');
                if ($term = $request->get('term')) {
                    # $query->where('location_id', '=', $location_id);
                    $query->where('code', 'LIKE', $term . '%');
                    $query->where('name', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($export_codes as $export_code) {
                $results[] = [
                    'id' => strtoupper($export_code->code),
                    'value' => strtoupper($export_code->name),
                ];
            }
            return response()->json($results);
        }
    }
}
