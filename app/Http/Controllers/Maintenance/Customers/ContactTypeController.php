<?php

namespace Sass\Http\Controllers\Maintenance\Customers;

use Illuminate\Support\Facades\Auth;
use Sass\ContactType;
use Sass\DataTables\Maintenance\Customers\ContactTypeDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\Customers\ContactTypeRequest;

class ContactTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ContactTypeDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(ContactTypeDataTable $dataTable)
    {
        return $dataTable->render('maintenance.customers.contact_types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.customers.contact_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactTypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactTypeRequest $request)
    {
        $contact_type = $request->all();
        $contact_type['user_create_id'] = Auth::user()->id;
        $contact_type['user_update_id'] = Auth::user()->id;
        ContactType::create($contact_type);
        return redirect()->route('maintenance.customers.contact_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact_type = ContactType::findOrFail($id);
        return view('maintenance.customers.contact_types.show', compact('contact_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact_type = ContactType::findOrFail($id);
        return view('maintenance.customers.contact_types.edit', compact('contact_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ContactTypeRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactTypeRequest $request, $id)
    {
        $contact_type = ContactType::findOrFail($id);
        $contact_type['user_update_id'] = Auth::user()->id;
        $contact_type->fill($request->all());
        $contact_type->save();
        return redirect()->route('maintenance.customers.contact_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact_type = ContactType::findOrFail($id);
        $contact_type->delete();
    }
}
