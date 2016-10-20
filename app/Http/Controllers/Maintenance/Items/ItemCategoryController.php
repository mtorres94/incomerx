<?php

namespace Sass\Http\Controllers\Maintenance\Items;

use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\Items\ItemCategoryDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\Items\ItemCategoryRequest;
use Sass\ItemCategory;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ItemCategoryDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(ItemCategoryDataTable $dataTable)
    {
        return $dataTable->render('maintenance.items.item_categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance.items.item_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ItemCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemCategoryRequest $request)
    {
        $item_category = $request->all();
        $item_category['user_create_id'] = Auth::user()->id;
        $item_category['user_update_id'] = Auth::user()->id;
        ItemCategory::create($item_category);
        return redirect()->route('maintenance.items.item_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item_category = ItemCategory::findOrFail($id);
        return view('maintenance.items.item_categories.show', compact('item_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item_category = ItemCategory::findOrFail($id);
        return view('maintenance.items.item_categories.edit', compact('item_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ItemCategoryRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemCategoryRequest $request, $id)
    {
        $item_category = ItemCategory::findOrFail($id);
        $item_category['user_update_id'] = Auth::user()->id;
        $item_category->fill($request->all());
        $item_category->save();
        return redirect()->route('maintenance.items.item_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item_category = ItemCategory::find($id);
        $item_category->delete();
    }
}
