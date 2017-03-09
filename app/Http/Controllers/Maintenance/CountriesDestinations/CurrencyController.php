<?php

namespace Sass\Http\Controllers\Maintenance\CountriesDestinations;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Sass\Currency;
use Sass\DataTables\Maintenance\CountriesDestinations\CurrencyDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests\Maintenance\CountriesDestinations\CurrencyRequest;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CurrencyDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(CurrencyDataTable $dataTable)
    {
        return $dataTable->render('maintenance.countries_destinations.currencies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_open_id = Auth::user()->id;
        return view('maintenance.countries_destinations.currencies.create', compact('user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currency = $request->all();
        $currency['user_create_id'] = Auth::user()->id;
        $currency['user_update_id'] = Auth::user()->id;
        $currencies = Currency::create($currency);
        $id= $currencies->id;
        return redirect()->route('maintenance.countries_destinations.currencies.edit', [$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currency = Currency::findOrFail($id);
        return view('maintenance.countries_destinations.currencies.show', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currency = Currency::findOrFail($id);
        $user_open_id =  ($currency->user_open_id == 0) ? Auth::user()->id : $currency->user_open_id;
        $currency = self::updateOpenStatus($currency);
        $currency->save();
        return view('maintenance.countries_destinations.currencies.edit', compact('currency', 'user_open_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CurrencyRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $currency = Currency::findOrFail($id);
        $currency['user_update_id'] = Auth::user()->id;
        $currency->fill($request->all());
        $currency->save();
        return redirect()->route('maintenance.countries_destinations.currencies.edit', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency = Currency::find($id);
        $currency->delete();
    }


    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        if($id > 0){
            $type = Currency::findOrFail($id);
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
        $type = Currency::findOrFail($data['id']);
        return [
            'id'   => $type->user_open_id,
            'name' => $type->user_open_id > 0 ? $type->user_open->name : '',
        ];
    }
}
