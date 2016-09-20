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
        return view('maintenance.customers.identification_types.create');
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
        IdentificationType::create($identification_type);
        return redirect()->route('maintenance.customers.identification_types.index');
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
        return view('maintenance.customers.identification_types.edit', compact('identification_type'));
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
        return redirect()->route('maintenance.customers.identification_types.index');
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
}
