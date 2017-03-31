<?php

namespace Sass\Http\Controllers\Maintenance\Accounting;

use Illuminate\Http\Request;

use Sass\BillingCode;
use Sass\BillingCodeAccount;
use Sass\DataTables\Maintenance\Accounting\BillingCodeDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BillingCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BillingCodeDataTable $dataTable)
    {
        return $dataTable->render('maintenance.accounting.billing_codes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('maintenance.accounting.billing_codes.create', compact('user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $billing = $request->all();
            $billing['code'] = generate_code('Sass\BillingCode', 'code', $billing['name']);
            $billing['user_create_id'] = Auth::user()->id;
            $billing['user_update_id'] = Auth::user()->id;
            $billing['user_open_id'] = Auth::user()->id;

            $id=BillingCode::create($billing)->id;
            BillingCodeAccount::saveDetail($id, $billing);

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('maintenance.accounting.billing_codes.edit', [$id]);
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
        $billing= BillingCode::findOrFail($id);
        $user_open_id =  ($billing->user_open_id == 0) ? Auth::user()->id : $billing->user_open_id;
        $billing = self::updateOpenStatus($billing);
        $billing->save();
        return view('maintenance.accounting.billing_codes.edit', compact('billing', 'user_open_id'));
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
        DB::beginTransaction();
        try {
            $billing = $request->all();
            $billing['user_update_id'] = Auth::user()->id;
            $sent = BillingCode::findorfail($id);
            $sent->update($billing);
            BillingCodeAccount::saveDetail($id, $billing);

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('maintenance.accounting.billing_codes.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $billing = BillingCode::findOrFail($id);
            if (Auth::user()->id == $billing->user_open_id)
            {

                $billing = self::updateCloseStatus($billing);
                $billing->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $billing = BillingCode::findOrFail($data['id']);
        return [
            'id'   => $billing->user_open_id,
            'name' => $billing->user_open_id > 0 ? $billing->user_open->name : '',
        ];
    }

    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $billing_codes = BillingCode::where(function ($query) use ($request) {
                if ($term = $request->get('term')) {
                    $query->orWhere('code', 'LIKE', $term . '%');
                    $query->orWhere('name', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($billing_codes as $billing_code) {
                $results[] = [
                    'id'    => $billing_code->id,
                    'code'  => strtoupper($billing_code->code),
                    'value' => strtoupper($billing_code->name),
                ];
            }

            return response()->json($results);
        }
    }
}
