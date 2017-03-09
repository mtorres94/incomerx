<?php

namespace Sass\Http\Controllers\Maintenance\Items;

use Illuminate\Http\Request;
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
        $user_open_id = Auth::user()->id;
        return view('maintenance.items.item_categories.create', compact('user_open_id'));
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
        $item_category['code'] = generate_code('Sass\ItemCategory', 'code', $item_category['name']);

        $item_category['user_create_id'] = Auth::user()->id;
        $item_category['user_update_id'] = Auth::user()->id;
        $item = ItemCategory::create($item_category);
        $id = $item->id;
        return redirect()->route('maintenance.items.item_categories.edit', [$id]);
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
        $user_open_id =  ($item_category->user_open_id == 0) ? Auth::user()->id : $item_category->user_open_id;
        $item_category = self::updateOpenStatus($item_category);
        $item_category->save();
        return view('maintenance.items.item_categories.edit', compact('item_category', 'user_open_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item_category = ItemCategory::findOrFail($id);
        $item_category['user_update_id'] = Auth::user()->id;
        $item_category->fill($request->all());
        $item_category->save();
        return redirect()->route('maintenance.items.item_categories.edit', [$id]);
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

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $type = ItemCategory::findOrFail($id);
            if (Auth::user()->id == $type->user_open_id)
            {

                $type = self::updateCloseStatus($type);
                $type->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $type = ItemCategory::findOrFail($data['id']);
        return [
            'id'   => $type->user_open_id,
            'name' => $type->user_open_id > 0 ? $type->user_open->name : '',
        ];
    }
}
