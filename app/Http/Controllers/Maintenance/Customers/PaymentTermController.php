<?php

namespace Sass\Http\Controllers\Maintenance\Customers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\Customers\PaymentTermDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\Http\Requests\Maintenance\Customers\PaymentTermRequest;
use Sass\PaymentTerm;

class PaymentTermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param PaymentTermDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(PaymentTermDataTable $dataTable)
    {
        return $dataTable->render('maintenance.customers.payment_terms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.customers.payment_terms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PaymentTermRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentTermRequest $request)
    {
        $payment_term = $request->all();
        $payment_term['user_create_id'] = Auth::user()->id;
        $payment_term['user_update_id'] = Auth::user()->id;
        PaymentTerm::create($payment_term);
        return redirect()->route('maintenance.customers.payment_terms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment_term = PaymentTerm::findOrFail($id);
        return view('maintenance.customers.payment_terms.show', compact('payment_term'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment_term = PaymentTerm::findOrFail($id);
        return view('maintenance.customers.payment_terms.edit', compact('payment_term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PaymentTermRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentTermRequest $request, $id)
    {
        $payment_term = PaymentTerm::findOrFail($id);
        $payment_term['user_update_id'] = Auth::user()->id;
        $payment_term->fill($request->all());
        $payment_term->save();
        return redirect()->route('maintenance.customers.payment_terms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment_term = PaymentTerm::find($id);
        $payment_term->delete();
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
            $payment_terms = PaymentTerm::where(function ($query) use ($request) {
                if ($_6 = $request->get('term')) {
                    $query->orWhere('abbreviation', 'LIKE', '%' . $_6 . '%');
                    $query->orWhere('name', 'LIKE', '%' . $_6 . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($payment_terms as $payment_term) {
                $results[] = ['id' => $payment_term->id, 'value' => strtoupper($payment_term->name)];
            }

            return response()->json($results);
        }
    }
}
