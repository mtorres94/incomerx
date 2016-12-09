<?php

namespace Sass\Http\Controllers\Maintenance\Warehouse;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\LocationBin;

class LocationBinController extends Controller
{
    /**
     * Search for records that match the parameter received.
     *
     * @param Request $request
     * @return mixed
     */
    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $location_bins = LocationBin::where(function ($query) use ($request) {
                # $location_id = Input::get('cargo_location_id');
                if ($term = $request->get('term')) {
                    # $query->where('location_id', '=', $location_id);
                    $query->where('code', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($location_bins as $location_bin) {
                $results[] = [
                    'id' => $location_bin->id,
                    'value' => strtoupper($location_bin->code),
                ];
            }

            return response()->json($results);
        }
    }

    public function get(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $location= LocationBin::find($id);
            $results[] = [
                'code'   => strtoupper($location->code),
            ];
            return response()->json($results);
        }
    }
}
