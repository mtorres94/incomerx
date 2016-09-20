<?php

namespace Sass\Http\Controllers\Maintenance\VendorsSuppliers;

use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\VendorsSuppliers\SupplierDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\VendorsSuppliers\SupplierRequest;
use Sass\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SupplierDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(SupplierDataTable $dataTable)
    {
        return $dataTable->render('maintenance.vendors_suppliers.suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.vendors_suppliers.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SupplierRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        $supplier = $request->all();
        $supplier['user_create_id'] = Auth::user()->id;
        $supplier['user_update_id'] = Auth::user()->id;
        Supplier::create($supplier);
        return redirect()->route('maintenance.vendors_suppliers.suppliers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('maintenance.vendors_suppliers.suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('maintenance.vendors_suppliers.suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SupplierRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier['user_update_id'] = Auth::user()->id;
        $supplier->fill($request->all());
        $supplier->save();
        return redirect()->route('maintenance.vendors_suppliers.suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
    }
}
