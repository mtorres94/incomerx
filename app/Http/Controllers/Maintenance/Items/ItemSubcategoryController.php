<?php

namespace Sass\Http\Controllers\Maintenance\Items;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        $user_open_id = Auth::user()->id;
        return view('maintenance.items.item_subcategories.create', compact('user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item_subcategory = $request->all();
        $item_subcategory['code'] = generate_code('Sass\ItemSubcategory', 'code', $item_subcategory['name']);

        $item_subcategory['user_create_id'] = Auth::user()->id;
        $item_subcategory['user_update_id'] = Auth::user()->id;
        $subcategory = ItemSubcategory::create($item_subcategory);
        $id = $subcategory->id;
        return redirect()->route('maintenance.items.item_subcategories.edit', [$id]);
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
        $user_open_id =  ($item_subcategory->user_open_id == 0) ? Auth::user()->id : $item_subcategory->user_open_id;
        $item_subcategory = self::updateOpenStatus($item_subcategory);
        $item_subcategory->save();
        return view('maintenance.items.item_subcategories.edit', compact('item_subcategory', 'user_open_id'));
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
        $item_subcategory = ItemSubcategory::findOrFail($id);
        $item_subcategory['user_update_id'] = Auth::user()->id;
        $item_subcategory->fill($request->all());
        $item_subcategory->save();
        return redirect()->route('maintenance.items.item_subcategories.edit', [$id]);
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

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $type = ItemSubcategory::findOrFail($id);
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
        $type = ItemSubcategory::findOrFail($data['id']);
        return [
            'id'   => $type->user_open_id,
            'name' => $type->user_open_id > 0 ? $type->user_open->name : '',
        ];
    }
}
