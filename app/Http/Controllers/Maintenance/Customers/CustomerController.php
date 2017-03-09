<?php

namespace Sass\Http\Controllers\Maintenance\Customers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Sass\Customer;
use Sass\DataTables\Maintenance\Customers\CustomerDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\Customers\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CustomerDataTable $dataTable
     * @return \Illuminate\View\View
     */
    public function index(CustomerDataTable $dataTable)
    {
        return $dataTable->render('maintenance.customers.customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.customers.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $customer = $request->all();
        $customer['code'] = generate_code('Sass\Customer', 'code', $customer['name']);
        $customer['user_create_id'] = auth()->user()->id;
        $customer['user_update_id'] = auth()->user()->id;
        $customer = Customer::create($customer);

        return redirect()->route('maintenance.customers.customers.edit', [$customer->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('maintenance.customers.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('maintenance.customers.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CustomerRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer['user_update_id'] = auth()->user()->id;
        $customer->fill($request->all());
        $customer->save();
        return redirect()->route('maintenance.customers.customers.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
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
            $customers = Customer::where(function ($query) use ($request) {
                if ($term = $request->get('term')) {
                    $query->orWhere('code', 'LIKE', $term . '%');
                    $query->orWhere('name', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($customers as $customer) {
                $results[] = [
                    'id'                => $customer->id,
                    'value'             => strtoupper($customer->name),
                    'address'           => $customer->address,
                    'city'              => $customer->city,
                    'state_id'          => $customer->state_id,
                    'state_name'        => $customer->state_id > 0 ? $customer->state->name : "",
                    'zip_code_id'       => $customer->zip_code_id,
                    'zip_code_code'     => $customer->zip_code_id > 0 ? $customer->zip_code->code : "",
                    'phone'             => $customer->phone,
                    'fax'               => $customer->fax,
                    'third_party_id'    => $customer->agent_id,
                    'third_party_name'  => $customer->agent_id > 0 ? $customer->third_party()->first()->name : "",
                    'third_party_phone' => $customer->agent_id > 0 ? $customer->third_party()->first()->phone : "",
                    'third_party_fax'   => $customer->agent_id > 0 ? $customer->third_party()->first()->fax : "",
                    'agent_id'          => $customer->agent_id,
                    'agent_name'        => $customer->agent_id > 0 ? $customer->agent()->first()->name : "",
                    'coloader_id'       => $customer->coloader_id,
                    'coloader_name'     => $customer->coloader_id > 0 ? $customer->coloader()->first()->name : "",
                    'country_id'     => $customer->country_id,
                    'country_name'     => strtoupper($customer->country_id > 0 ? $customer->country->name : ""),
                ];
            }

            return response()->json($results);
        }
    }

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];

        if ($id > 0)
        {
            $customer = Customer::findOrFail($id);

            if (auth()->user()->id == $customer->user_open_id)
            {
                $customer = self::updateCloseStatus($customer);
                $customer->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $customer = Customer::findOrFail($data['id']);
        return [
            'id'   => $customer->user_open_id,
            'name' => $customer->user_open_id > 0 ? $customer->user_open->name : '',
        ];
    }
}
