<?php

namespace Sass\Http\Controllers\Maintenance\ReasonsComments;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Sass\Adjustment;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;

class AdjustmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adjustments = Adjustment::paginate(env('APP_PAGINATE'));
        return view('maintenance.reasons_comments.adjustments.index', compact('adjustments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.reasons_comments.adjustments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adjustment = $request->all();
        $adjustment['user_create_id'] = Auth::user()->id;
        $adjustment['user_update_id'] = Auth::user()->id;
        Adjustment::create($adjustment);
        return redirect()->route('maintenance.reasons_comments.adjustments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adjustment = Adjustment::findOrFail($id);
        return view('maintenance.reasons_comments.adjustments.show', compact('adjustment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adjustment = Adjustment::findOrFail($id);
        return view('maintenance.reasons_comments.adjustments.edit', compact('adjustment'));
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
        $adjustment = Adjustment::findOrFail($id);
        $adjustment['user_update_id'] = Auth::user()->id;
        $adjustment->fill($request->all());
        $adjustment->save();
        return redirect()->route('maintenance.reasons_comments.adjustments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adjustment = Adjustment::find($id);
        $adjustment->delete();
    }
}
