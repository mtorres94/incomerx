<?php

namespace Sass\Http\Controllers\Maintenance\Customers;

use Sass\CustomerType;
use Sass\DataTables\Maintenance\Customers\CustomerTypeDataTable;
use Sass\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Sass\Http\Requests\Maintenance\Customers\CustomerTypeRequest;

class CustomerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CustomerTypeDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(CustomerTypeDataTable $dataTable)
    {
        return $dataTable->render('maintenance.customers.customer_types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.customers.customer_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomerTypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerTypeRequest $request)
    {
        $customer_type = $request->all();
        $customer_type['user_create_id'] = Auth::user()->id;
        $customer_type['user_update_id'] = Auth::user()->id;
        CustomerType::create($customer_type);
        return redirect()->route('maintenance.customers.customer_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer_type = CustomerType::findOrFail($id);
        return view('maintenance.customers.customer_types.show', compact('customer_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer_type = CustomerType::findOrFail($id);
        return view('maintenance.customers.customer_types.edit', compact('customer_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CustomerTypeRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerTypeRequest $request, $id)
    {
        $customer_type = CustomerType::findOrFail($id);
        $customer_type['user_update_id'] = Auth::user()->id;
        $customer_type->fill($request->all());
        $customer_type->save();
        return redirect()->route('maintenance.customers.customer_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer_type = CustomerType::find($id);
        $customer_type->delete();
    }
}
