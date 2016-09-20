<?php

namespace Sass\Http\Controllers\Admin\Management;

use Illuminate\Http\Request;

use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\Option;

class OptionController extends Controller
{
    public function panel(Request $request)
    {
        if ($request->ajax()) {
            if ($id = $request->get('id')) {
                $options = Option::where(function ($query) use ($request) {
                    if ($id = $request->get('id')) {
                        $query->where('active', 1);
                        $query->where('menu_id', $id);
                    }
                })->get();

                $results = [];
                foreach ($options as $option) {
                    $results[] = [
                        'id' => $option->id,
                        'name' => ucfirst(trans($option->name)),
                        'icon' => $option->icon,
                        'route' => route($option->route),
                        'menu' => $option->menu_id
                    ];
                }
                return response()->json($results);
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
}
