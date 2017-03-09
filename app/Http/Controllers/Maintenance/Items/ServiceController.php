<?php

namespace Sass\Http\Controllers\Maintenance\Items;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\Items\ServiceDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ServiceDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(ServiceDataTable $dataTable)
    {
        return $dataTable->render('maintenance.items.services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('maintenance.items.services.create', compact('user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = $request->all();
        $service['code'] = generate_code('Sass\Service', 'code', $service['name']);

        $service['user_create_id'] = Auth::user()->id;
        $service['user_update_id'] = Auth::user()->id;
        //$service['code'] = substr($service['name'], 0, 3);

        $type= Service::create($service);
        $id= $type->id;
        return redirect()->route('maintenance.items.services.edit', [$id]);
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
        $service = Service::findOrFail($id);
        $user_open_id =  ($service->user_open_id == 0) ? Auth::user()->id : $service->user_open_id;

        $service = self::updateOpenStatus($service);
        $service->save();

        return view('maintenance.items.services.edit', compact('service', 'user_open_id'));
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
        $service = Service::findOrFail($id);
        $service['user_update_id'] = Auth::user()->id;
        $service->fill($request->all());
        $service->save();
        return redirect()->route('maintenance.items.services.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
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
            $services = Service::where(function ($query) use ($request) {
                if ($term = $request->get('term')) {
                    $query->orWhere('code', 'LIKE', $term . '%');
                    $query->orWhere('name', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($services as $service) {
                $results[] = [
                    'id' => $service->id,
                    'code' => strtoupper($service->code),
                    'name' => strtoupper($service->name),
                ];
            }

            return response()->json($results);
        }
    }


    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $type = Service::findOrFail($id);
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
        $type = Service::findOrFail($data['id']);
        return [
            'id'   => $type->user_open_id,
            'name' => $type->user_open_id > 0 ? $type->user_open->name : '',
        ];
    }
}
