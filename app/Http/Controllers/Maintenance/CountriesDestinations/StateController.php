<?php

namespace Sass\Http\Controllers\Maintenance\CountriesDestinations;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\CountriesDestinations\StateDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\CountriesDestinations\StateRequest;
use Sass\State;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param StateDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(StateDataTable $dataTable)
    {
        return $dataTable->render('maintenance.countries_destinations.states.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.countries_destinations.states.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateRequest $request)
    {
        $state = $request->all();
        $state['user_create_id'] = Auth::user()->id;
        $state['user_update_id'] = Auth::user()->id;
        State::create($state);
        return redirect()->route('maintenance.countries_destinations.states.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $state = State::findOrFail($id);
        return view('maintenance.countries_destinations.states.show', compact('state'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = State::findOrFail($id);
        return view('maintenance.countries_destinations.states.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StateRequest $request, $id)
    {
        $state = State::findOrFail($id);
        $state['user_update_id'] = Auth::user()->id;
        $state->fill($request->all());
        $state->save();
        return redirect()->route('maintenance.countries_destinations.states.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = State::find($id);
        $state->delete();
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
            $states = State::where(function ($query) use ($request) {
                if ($_57 = $request->get('term')) {
                    $query->orWhere('code', 'LIKE', $_57 . '%');
                    $query->orWhere('name', 'LIKE', $_57 . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($states as $state) {
                $results[] = [
                    'id' => $state->id,
                    'value' => strtoupper($state->name),
                    'country_name' => ($state->country_id >0 ? $state->country->name : ""),
                    'country_id' => $state->country_id
                ];
            }

            return response()->json($results);
        }
    }
}
