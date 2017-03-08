<?php

namespace Sass\Http\Controllers\Maintenance\Customers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\Customers\IdentificationTypeDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\Customers\IdentificationTypeRequest;
use Sass\IdentificationType;

class IdentificationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IdentificationTypeDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(IdentificationTypeDataTable $dataTable)
    {
        return $dataTable->render('maintenance.customers.identification_types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('maintenance.customers.identification_types.create', compact('user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IdentificationTypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(IdentificationTypeRequest $request)
    {
        $identification_type = $request->all();
        $identification_type['user_create_id'] = Auth::user()->id;
        $identification_type['user_update_id'] = Auth::user()->id;
        $type= IdentificationType::create($identification_type);
        $id= $type->id;
        return redirect()->route('maintenance.customers.identification_types.edit', [$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $identification_type = IdentificationType::findOrFail($id);
        return view('maintenance.customers.identification_types.show', compact('identification_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $identification_type = IdentificationType::findOrFail($id);
        $user_open_id =  ($identification_type->user_open_id == 0) ? Auth::user()->id : $identification_type->user_open_id;

        $identification_type = self::updateOpenStatus($identification_type);
        $identification_type->save();

        return view('maintenance.customers.identification_types.edit', compact('identification_type', 'user_open_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param IdentificationTypeRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(IdentificationTypeRequest $request, $id)
    {
        $identification_type = IdentificationType::findOrFail($id);
        $identification_type['user_update_id'] = Auth::user()->id;
        $identification_type->fill($request->all());
        $identification_type->save();
        return redirect()->route('maintenance.customers.identification_types.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $identification_type = IdentificationType::find($id);
        $identification_type->delete();
    }

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $type = IdentificationType::findOrFail($id);
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
        $type = IdentificationType::findOrFail($data['id']);
        return [
            'id'   => $type->user_open_id,
            'name' => $type->user_open_id > 0 ? $type->user_open->name : '',
        ];
    }
}
