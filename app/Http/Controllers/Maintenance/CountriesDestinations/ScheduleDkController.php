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
        $user_open_id = Auth::user()->id;
        return view('maintenance.countries_destinations.schedule_dks.create', compact('user_open_id'));
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
        $schedule = ScheduleDk::create($scheduled);
        $id = $schedule->id;
        return redirect()->route('maintenance.countries_destinations.schedule_dks.edit', [$id]);
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
        $user_open_id =  ($scheduled->user_open_id == 0) ? Auth::user()->id : $scheduled->user_open_id;
        $scheduled = self::updateOpenStatus($scheduled);
        $scheduled->save();
        return view('maintenance.countries_destinations.schedule_dks.edit', compact('scheduled', 'user_open_id'));
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
        return redirect()->route('maintenance.countries_destinations.schedule_dks.edit', [$id]);
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

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $type = ScheduleDk::findOrFail($id);
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
        $type = ScheduleDk::findOrFail($data['id']);
        return [
            'id'   => $type->user_open_id,
            'name' => $type->user_open_id > 0 ? $type->user_open->name : '',
        ];
    }

}
