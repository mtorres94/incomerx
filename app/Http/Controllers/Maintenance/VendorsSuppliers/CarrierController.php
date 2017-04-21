<?php

namespace Sass\Http\Controllers\Maintenance\VendorsSuppliers;

use Illuminate\Http\Request;

use Sass\Carrier;
use Sass\CarrierAwbDetail;
use Sass\CarrierContact;
use Sass\DataTables\Maintenance\VendorsSuppliers\CarrierDataTable;
use Sass\Http\Controllers\Controller;


class CarrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CarrierDataTable $dataTable)
    {
        return $dataTable->render('maintenance.vendors_suppliers.carriers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = auth()->user()->id;
        return view('maintenance.vendors_suppliers.carriers.create', compact('user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carrier = $request->all();
        $carrier['code'] = generate_code('Sass\Carrier', 'code', $carrier['name']);
        $carrier['user_create_id'] = auth()->user()->id;
        $carrier['user_update_id'] = auth()->user()->id;
        $id = Carrier::create($carrier)->id;
        CarrierAwbDetail::saveDetail($id, $carrier);

        return redirect()->route('maintenance.vendors_suppliers.carriers.edit', [$id]);
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
        $carrier = Carrier::findOrFail($id);

        $user_open_id =  ($carrier->user_open_id == 0) ? auth()->user()->id : $carrier->user_open_id;

        $carrier = self::updateOpenStatus($carrier);
        $carrier->save();
        return view('maintenance.vendors_suppliers.carriers.edit', compact('carrier', 'user_open_id'));
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
        $carrier = Carrier::findOrFail($id);
        $carrier['user_update_id'] = auth()->user()->id;
        $carrier->fill($request->all());

        $carrier->save();
        CarrierAwbDetail::saveDetail($id, $request->only([
            'awb_number',
            'sequence_type',
            'awb_type',
            'awb_status',
            'agent_id',
            'division_id']));
        //CarrierAwbDetail::saveDetail($id, $request->all());
        //CarrierContact::saveDetail($id, $request->all());
        return redirect()->route('maintenance.vendors_suppliers.carriers.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrier = Carrier::find($id);
        CarrierAwbDetail::where('mst_carriers_awb_details.carrier_id', $id )->delete();
        $carrier->delete();
    }

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];

        if ($id > 0)
        {
            $carrier = Carrier::findOrFail($id);

            if (auth()->user()->id == $carrier->user_open_id)
            {
                $carrier = self::updateCloseStatus($carrier);
                $carrier->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $carrier = Carrier::findOrFail($data['id']);
        return [
            'id'   => $carrier->user_open_id,
            'name' => $carrier->user_open_id > 0 ? $carrier->user_open->name : '',
        ];
    }

    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $carriers = Carrier::where(function ($query) use ($request) {
                if ($term = $request->get('term')) {
                    $query->orWhere('code', 'LIKE', $term . '%');
                    $query->orWhere('name', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($carriers as $carrier) {
                $results[] = ['id' => $carrier->id, 'name' => strtoupper($carrier->name)];
            }

            return response()->json($results);
        }
    }

    public function get_awb_number(Request $request){
        if ($request->ajax()) {
            $carriers = CarrierAwbDetail::where(function ($query) use ($request) {
                if ($term = $request->get('id')) {
                    $query->where('carrier_id', $term );
                    $query->where('awb_status', '1');
                }
            })->get();

            $results = [];
            foreach ($carriers as $carrier) {
                $results[] = [
                    'id' => $carrier->id,
                    'number' => strtoupper($carrier->awb_number),
                    'awb_type' => strtoupper($carrier->awb_type),
                ];
            }

            return response()->json($results);
        }
    }

}
