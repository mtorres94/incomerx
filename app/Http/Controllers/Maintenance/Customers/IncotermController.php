<?php

namespace Sass\Http\Controllers\Maintenance\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sass\DataTables\Maintenance\Customers\IncotermDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\Customers\IncotermRequest;
use Sass\Incoterm;

class IncotermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IncotermDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(IncotermDataTable $dataTable)
    {
        return $dataTable->render('maintenance.customers.incoterms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('maintenance.customers.incoterms.create', compact('user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IncotermRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncotermRequest $request)
    {
        $incoterm = $request->all();
        $incoterm['code'] = generate_code('Sass\Incoterm', 'code', $incoterm['name']);
        $incoterm['user_create_id'] = Auth::user()->id;
        $incoterm['user_update_id'] = Auth::user()->id;
        $incoterm = Incoterm::create($incoterm);
        $id= $incoterm->id;
        return redirect()->route('maintenance.customers.incoterms.edit', [$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incoterm = Incoterm::findOrFail($id);
        return view('maintenance.customers.incoterms.show', compact('incoterm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incoterm = Incoterm::findOrFail($id);
        $user_open_id =  ($incoterm->user_open_id == 0) ? Auth::user()->id : $incoterm->user_open_id;
        return view('maintenance.customers.incoterms.edit', compact('incoterm', 'user_open_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param IncotermRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(IncotermRequest $request, $id)
    {
        $incoterm = Incoterm::findOrFail($id);
        $incoterm['user_update_id'] = Auth::user()->id;
        $incoterm->fill($request->all());
        $incoterm->save();
        return redirect()->route('maintenance.customers.incoterms.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incoterm = Incoterm::find($id);
        $incoterm->delete();
    }


    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $type = Incoterm::findOrFail($id);
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
        $type = Incoterm::findOrFail($data['id']);
        return [
            'id'   => $type->user_open_id,
            'name' => $type->user_open_id > 0 ? $type->user_open->name : '',
        ];
    }
}
