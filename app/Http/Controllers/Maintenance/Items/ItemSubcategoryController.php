<?php

namespace Sass\Http\Controllers\Maintenance\Items;

use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\Items\ItemSubcategoryDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\Items\ItemSubcategoryRequest;
use Sass\ItemSubcategory;

class ItemSubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ItemSubcategoryDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(ItemSubcategoryDataTable $dataTable)
    {
        return $dataTable->render('maintenance.items.item_subcategories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.items.item_subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ItemSubcategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemSubcategoryRequest $request)
    {
        $item_subcategory = $request->all();
        $item_subcategory['user_create_id'] = Auth::user()->id;
        $item_subcategory['user_update_id'] = Auth::user()->id;
        ItemSubcategory::create($item_subcategory);
        return redirect()->route('maintenance.items.item_subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item_subcategory = ItemSubcategory::findOrFail($id);
        return view('maintenance.items.item_subcategories.show', compact('item_subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item_subcategory = ItemSubcategory::findOrFail($id);
        return view('maintenance.items.item_subcategories.edit', compact('item_subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ItemSubcategoryRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemSubcategoryRequest $request, $id)
    {
        $item_subcategory = ItemSubcategory::findOrFail($id);
        $item_subcategory['user_update_id'] = Auth::user()->id;
        $item_subcategory->fill($request->all());
        $item_subcategory->save();
        return redirect()->route('maintenance.items.item_subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item_subcategory = ItemSubcategory::find($id);
        $item_subcategory->delete();
    }
}
