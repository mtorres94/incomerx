<?php

namespace Sass\Http\Controllers\Admin\Management;

use Illuminate\Http\Request;

use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;
use Sass\Menu;

class MenuController extends Controller
{
    public function panel(Request $request)
    {
        if ($request->ajax()) {
            if ($id = $request->get('id')) {
                $menus = Menu::where(function ($query) use ($request) {
                    if ($id = $request->get('id')) {
                        $query->where('active', 1);
                        $query->where('module_id', $id);
                    }
                })->get();

                $results = [];
                foreach ($menus as $menu) {
                    $results[] = ['id' => $menu->id, 'name' => strtoupper(trans($menu->name)), 'icon' => $menu->icon, 'module' => $menu->module_id];
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
