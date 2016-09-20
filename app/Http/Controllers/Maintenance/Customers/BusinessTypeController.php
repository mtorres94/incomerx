<?php

namespace Sass\Http\Controllers\Maintenance\Customers;

use Sass\BusinessType;
use Sass\DataTables\Maintenance\Customers\BusinessTypeDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\Customers\BusinessTypeRequest;

use Illuminate\Support\Facades\Auth;

class BusinessTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param BusinessTypeDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(BusinessTypeDataTable $dataTable)
    {
        return $dataTable->render('maintenance.customers.business_types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.customers.business_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BusinessTypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusinessTypeRequest $request)
    {
        $business_type = $request->all();
        $business_type['user_create_id'] = Auth::user()->id;
        $business_type['user_update_id'] = Auth::user()->id;
        BusinessType::create($business_type);
        return redirect()->route('maintenance.customers.business_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $business_type = BusinessType::findOrFail($id);
        return view('maintenance.customers.business_types.show', compact('business_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $business_type = BusinessType::findOrFail($id);
        return view('maintenance.customers.business_types.edit', compact('business_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BusinessTypeRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BusinessTypeRequest $request, $id)
    {
        $business_type = BusinessType::findOrFail($id);
        $business_type['user_update_id'] = Auth::user()->id;
        $business_type->fill($request->all());
        $business_type->save();
        return redirect()->route('maintenance.customers.business_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $business_type = BusinessType::find($id);
        $business_type->delete();
    }
}
