<?php

namespace Sass\Http\Controllers\Maintenance\VendorsSuppliers;

use Illuminate\Http\Request;

use Sass\DataTables\Maintenance\VendorsSuppliers\VendorTypeDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\VendorType;

class VendorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param VendorTypeDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(VendorTypeDataTable $dataTable)
    {
        return $dataTable->render('maintenance.vendors_suppliers.vendor_types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('maintenance.vendors_suppliers.vendor_types.create', 'user_open_id');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor_type = $request->all();
        $vendor_type['user_create_id'] = Auth::user()->id;
        $vendor_type['user_update_id'] = Auth::user()->id;
        $vendor= VendorType::create($vendor_type);
        $id= $vendor->id;
        return redirect()->route('maintenance.vendors_suppliers.vendor_types.edit', compact('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor_type = VendorType::findOrFail($id);
        return view('maintenance.vendors_suppliers.vendor_types.show', compact('vendor_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor_type = VendorType::findOrFail($id);
        $user_open_id =  ($vendor_type->user_open_id == 0) ? Auth::user()->id : $vendor_type->user_open_id;
        return view('maintenance.vendors_suppliers.vendor_types.edit', compact('vendor_type', 'user_open_id'));
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
        $vendor_type = VendorType::findOrFail($id);
        $vendor_type['user_update_id'] = Auth::user()->id;
        $vendor_type->fill($request->all());
        $vendor_type->save();
        return redirect()->route('maintenance.vendors_suppliers.vendor_types.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor_type = VendorType::find($id);
        $vendor_type->delete();
    }
    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $type = VendorType::findOrFail($id);
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
        $type = VendorType::findOrFail($data['id']);
        return [
            'id'   => $type->user_open_id,
            'name' => $type->user_open_id > 0 ? $type->user_open->name : '',
        ];
    }
}
