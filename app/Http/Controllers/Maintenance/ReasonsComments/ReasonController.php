<?php

namespace Sass\Http\Controllers\Maintenance\ReasonsComments;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\Reason;

class ReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reasons = Reason::paginate(env('APP_PAGINATE'));
        return view('maintenance.reasons_comments.reasons.index', compact('reasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.reasons_comments.reasons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reason = $request->all();
        $reason['user_create_id'] = Auth::user()->id;
        $reason['user_update_id'] = Auth::user()->id;
        Reason::create($reason);
        return redirect()->route('maintenance.reasons_comments.reasons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reason = Reason::findOrFail($id);
        return view('maintenance.reasons_comments.reasons.show', compact('reason'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reason = Reason::findOrFail($id);
        return view('maintenance.reasons_comments.reasons.edit', compact('reason'));
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
        $reason = Reason::findOrFail($id);
        $reason['user_update_id'] = Auth::user()->id;
        $reason->fill($request->all());
        $reason->save();
        return redirect()->route('maintenance.reasons_comments.reasons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reason = Reason::find($id);
        $reason->delete();
    }
}
