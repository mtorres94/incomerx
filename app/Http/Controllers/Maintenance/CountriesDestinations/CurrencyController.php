<?php

namespace Sass\Http\Controllers\Maintenance\CountriesDestinations;


use Illuminate\Support\Facades\Auth;
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
        return view('maintenance.countries_destinations.currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CurrencyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {
        $currency = $request->all();
        $currency['user_create_id'] = Auth::user()->id;
        $currency['user_update_id'] = Auth::user()->id;
        Currency::create($currency);
        return redirect()->route('maintenance.countries_destinations.currencies.index');
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
        return view('maintenance.countries_destinations.currencies.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CurrencyRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyRequest $request, $id)
    {
        $currency = Currency::findOrFail($id);
        $currency['user_update_id'] = Auth::user()->id;
        $currency->fill($request->all());
        $currency->save();
        return redirect()->route('maintenance.countries_destinations.currencies.index');
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
}
