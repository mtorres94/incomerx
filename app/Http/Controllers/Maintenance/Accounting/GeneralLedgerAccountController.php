<?php

namespace Sass\Http\Controllers\Maintenance\Accounting;

use Illuminate\Http\Request;

use Sass\DataTables\Maintenance\Accounting\GeneralLedgerAccountDataTable;
use Sass\GeneralLedgerAccount;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GeneralLedgerAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GeneralLedgerAccountDataTable $dataTable)
    {
        return $dataTable->render('maintenance.accounting.general.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('maintenance.accounting.general.create', compact('user_open_id'));
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
            $general = $request->all();
            $general['user_create_id'] = Auth::user()->id;
            $general['user_update_id'] = Auth::user()->id;
            $general['user_open_id'] = Auth::user()->id;

            $id=GeneralLedgerAccount::create($general)->id;

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('maintenance.accounting.general.edit', [$id]);
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
        $general= GeneralLedgerAccount::findOrFail($id);
        $user_open_id =  ($general->user_open_id == 0) ? Auth::user()->id : $general->user_open_id;
        $general = self::updateOpenStatus($general);
        $general->save();
        return view('maintenance.accounting.general.edit', compact('general', 'user_open_id'));
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
            $general = $request->all();
            $general['user_update_id'] = Auth::user()->id;
            $sent = GeneralLedgerAccount::findorfail($id);
            $sent->update($general);

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('maintenance.accounting.general.edit', [$id]);
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
            $general = GeneralLedgerAccount::findOrFail($id);
            if (Auth::user()->id == $general->user_open_id)
            {

                $general = self::updateCloseStatus($general);
                $general->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $general = GeneralLedgerAccount::findOrFail($data['id']);
        return [
            'id'   => $general->user_open_id,
            'name' => $general->user_open_id > 0 ? $general->user_open->name : '',
        ];
    }

    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $generals = GeneralLedgerAccount::where(function ($query) use ($request) {
                if ($term = $request->get('term')) {
                    $query->orWhere('code', 'LIKE', $term . '%');
                    $query->orWhere('description', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($generals as $general) {
                $results[] = [
                    'id'    => $general->id,
                    'code'  => strtoupper($general->code),
                    'description' => strtoupper($general->description),
                ];
            }

            return response()->json($results);
        }
    }
}
