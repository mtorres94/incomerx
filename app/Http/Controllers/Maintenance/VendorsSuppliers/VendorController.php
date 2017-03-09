<?php

namespace Sass\Http\Controllers\Maintenance\VendorsSuppliers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\VendorsSuppliers\VendorDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\VendorsSuppliers\VendorRequest;
use Sass\Vendor;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param VendorDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(VendorDataTable $dataTable)
    {
        return $dataTable->render('maintenance.vendors_suppliers.vendors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = auth()->user()->id;
        return view('maintenance.vendors_suppliers.vendors.create', compact('user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VendorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorRequest $request)
    {
        $vendor = $request->all();
        $vendor['user_create_id'] = auth()->user()->id;
        $vendor['user_update_id'] = auth()->user()->id;
        $vendor = Vendor::create($vendor);

        return redirect()->route('maintenance.vendors_suppliers.vendors.edit', [$vendor->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('maintenance.vendors_suppliers.vendors.show', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        $user_open_id =  ($vendor->user_open_id == 0) ? auth()->user()->id : $vendor->user_open_id;

        $vendor = self::updateOpenStatus($vendor);
        $vendor->save();
        return view('maintenance.vendors_suppliers.vendors.edit', compact('vendor', 'user_open_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VendorRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(VendorRequest $request, $id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor['user_update_id'] = auth()->user()->id;
        $vendor->fill($request->all());
        $vendor->save();
        return redirect()->route('maintenance.vendors_suppliers.vendors.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();
    }

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];

        if ($id > 0)
        {
            $vendor = Vendor::findOrFail($id);

            if (auth()->user()->id == $vendor->user_open_id)
            {
                $vendor = self::updateCloseStatus($vendor);
                $vendor->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $vendor = Vendor::findOrFail($data['id']);
        return [
            'id'   => $vendor->user_open_id,
            'name' => $vendor->user_open_id > 0 ? $vendor->user_open->name : '',
        ];
    }

    public function autocomplete (Request $request)
    {
        if ($request->ajax()) {
            $vendors = Vendor::where(function ($query) use ($request) {
                if ($term = $request->get('term')) {
                    $query->orWhere('code', 'LIKE', $term . '%');
                    $query->orWhere('name', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($vendors as $vendor) {
                $results[] = [
                    'id'    => $vendor->id,
                    'code'  => strtoupper($vendor->code),
                    'name'  => strtoupper($vendor->name),
                    'phone' => $vendor->phone,
                ];
            }

            return response()->json($results);
        }
    }
}
