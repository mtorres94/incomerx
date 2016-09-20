<?php

namespace Sass\Http\Controllers\Maintenance\CountriesDestinations;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Sass\DataTables\Maintenance\CountriesDestinations\ScheduleDkDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\Http\Requests\Maintenance\CountriesDestinations\Create\CreateScheduleDkRequest;
use Sass\Http\Requests\Maintenance\CountriesDestinations\Edit\EditScheduleDkRequest;
use Sass\Http\Requests\Maintenance\CountriesDestinations\ScheduleDkRequest;
use Sass\ScheduleDk;

class ScheduleDkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ScheduleDkDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(ScheduleDkDataTable $dataTable)
    {
        return $dataTable->render('maintenance.countries_destinations.schedule_dks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.countries_destinations.schedule_dks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ScheduleDkRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleDkRequest $request)
    {
        $scheduled = $request->all();
        $scheduled['user_create_id'] = Auth::user()->id;
        $scheduled['user_update_id'] = Auth::user()->id;
        ScheduleDk::create($scheduled);
        return redirect()->route('maintenance.countries_destinations.schedule_dks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scheduled = ScheduleDk::findOrFail($id);
        return view('maintenance.countries_destinations.schedule_dks.show', compact('scheduled'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scheduled = ScheduleDk::findOrFail($id);
        return view('maintenance.countries_destinations.schedule_dks.edit', compact('scheduled'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ScheduleDkRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleDkRequest $request, $id)
    {
        $scheduled = ScheduleDk::findOrFail($id);
        $scheduled['user_update_id'] = Auth::user()->id;
        $scheduled->fill($request->all());
        $scheduled->save();
        return redirect()->route('maintenance.countries_destinations.schedule_dks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scheduled = ScheduleDk::find($id);
        $scheduled->delete();
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
            $schedule_dks = ScheduleDk::where(function ($query) use ($request) {
                if ($term = $request->get('term')) {
                    $query->orWhere('code', 'LIKE', '%' . $term . '%');
                    $query->orWhere('name', 'LIKE', '%' . $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($schedule_dks as $schedule_dk) {
                $results[] = ['id' => $schedule_dk->id, 'value' => strtoupper($schedule_dk->name)];
            }

            return response()->json($results);
        }
    }
}
