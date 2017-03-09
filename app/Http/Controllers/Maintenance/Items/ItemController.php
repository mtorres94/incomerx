<?php

namespace Sass\Http\Controllers\Maintenance\Items;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\Items\ItemDataTable;
use Sass\Http\Controllers\Controller;

use Sass\Http\Requests\Maintenance\Items\ItemRequest;
use Sass\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ItemDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(ItemDataTable $dataTable)
    {
        return $dataTable->render('maintenance.items.items.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('maintenance.items.items.create', compact('user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = $request->all();
        $item['user_create_id'] = Auth::user()->id;
        $item['user_update_id'] = Auth::user()->id;
        $item= Item::create($item);
        $id = $item->id;
        return redirect()->route('maintenance.items.items.edit', [$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('maintenance.items.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $user_open_id =  ($item->user_open_id == 0) ? Auth::user()->id : $item->user_open_id;
        $item = self::updateOpenStatus($item);
        $item->save();
        return view('maintenance.items.items.edit', compact('item', 'user_open_id'));
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
        $item = Item::findOrFail($id);
        $item['user_update_id'] = Auth::user()->id;
        $item->fill($request->all());
        $item->save();
        return redirect()->route('maintenance.items.items.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
    }

    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $items = Item::where(function ($query) use ($request) {
                if ($term = $request->get('term')) {
                    $query->orWhere('code', 'LIKE', $term . '%');
                    $query->orWhere('name', 'LIKE', $term . '%');
                }
            })->take(10)->get();

            $results = [];
            foreach ($items as $item) {
                $results[] = [
                    'id'                => $item->id,
                    'value'             => strtoupper($item->name),
                ];
            }

            return response()->json($results);
        }
    }
    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $type = Item::findOrFail($id);
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
        $type = Item::findOrFail($data['id']);
        return [
            'id'   => $type->user_open_id,
            'name' => $type->user_open_id > 0 ? $type->user_open->name : '',
        ];
    }
}
