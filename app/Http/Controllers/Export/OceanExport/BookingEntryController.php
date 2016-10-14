<?php

namespace Sass\Http\Controllers\Export\OceanExport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Sass\BookingEntry;
use Sass\BookingEntryCargo;
use Sass\BookingEntryCargoDetail;
use Sass\BookingEntryCharge;
use Sass\BookingEntryContainer;
use Sass\BookingEntryHazardous;
use Sass\DataTables\Export\Ocean\BookingEntryDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;

class BookingEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookingEntryDataTable $dataTable)
    {
        return $dataTable->render('export.oceans.booking_entries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('export.oceans.booking_entries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $count = BookingEntry::count() + 1;
            $booking_code= str_pad($count, 10, '0', STR_PAD_LEFT);
            $booking_entry = $request->all();
            $booking_entry['booking_code'] = $booking_code;
            $booking_entry['user_create_id'] = Auth::user()->id;
            $booking_entry['user_update_id'] = Auth::user()->id;

            $whr=BookingEntry::create($booking_entry);
            BookingEntryCargo::saveDetail($whr->id, $booking_entry);
            BookingEntryCargoDetail::saveDetail($whr->id, $booking_entry);
            BookingEntryContainer::saveDetail($whr->id, $booking_entry);
            BookingEntryCharge::saveDetail($whr->id, $booking_entry);
            BookingEntryHazardous::saveDetail($whr->id, $booking_entry);

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.oceans.booking_entries.index');

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
        $booking_entry = BookingEntry::findOrFail($id);
        $cargos = BookingEntryCargo::search($id);
        $cargo_details = BookingEntryCargoDetail::search($id);
        $charges = BookingEntryCharge::search($id);
        $containers = BookingEntryContainer::search($id);
        $hazardous_details = BookingEntryHazardous::search($id);

        return view('export.oceans.booking_entries.edit', compact('booking_entry', 'cargos', 'cargo_details', 'charges', 'containers', 'hazardous_details'));
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


        DB::beginTransaction();
        try {
            $booking_entry = $request->all();
            $sent = BookingEntry::findorfail($id);
            $whr = $sent->update($booking_entry);
            $booking_entry['user_update_id'] = Auth::user()->id;
            BookingEntryCargo::saveDetail($id, $booking_entry);
            BookingEntryCargoDetail::saveDetail($id, $booking_entry);
            BookingEntryContainer::saveDetail($id, $booking_entry);
            BookingEntryCharge::saveDetail($id, $booking_entry);
            BookingEntryHazardous::saveDetail($id, $booking_entry);

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('export.oceans.booking_entries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking_entry = BookingEntry::find($id);
        $booking_entry->delete();
        $booking_entry_cargo= DB::table('exp_booking_entries_cargo')->where('booking_entry_id', '=', $id)->delete();
        $booking_entry_cargo_details= DB::table('exp_booking_entries_cargo_details')->where('booking_entry_id', '=', $id)->delete();
        $booking_entry_container= DB::table('exp_booking_entries_container')->where('booking_entry_id', '=', $id)->delete();
        $booking_entry_charge= DB::table('exp_booking_entries_charge')->where('booking_entry_id', '=', $id)->delete();
        $booking_entry_hazardous= DB::table('exp_booking_entries_hazardous_details')->where('booking_entry_id', '=', $id)->delete();
    }

    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $bookingEntries = BookingEntry::leftJoin('mst_divisions', 'exp_booking_entries.division_id', '=', 'mst_divisions.id')
                ->leftJoin('mst_customers AS c1', 'exp_booking_entries.shipper_id', '=', 'c1.id')
                ->leftJoin('mst_customers AS c2', 'exp_booking_entries.consignee_id', '=', 'c2.id')
                ->leftJoin('mst_customers AS c3', 'exp_booking_entries.third_party_id', '=', 'c3.id')
                ->leftJoin('mst_customers AS c4', 'exp_booking_entries.agent_id', '=', 'c4.id')
                ->leftJoin('mst_customers AS c5', 'exp_booking_entries.supplier_id', '=', 'c5.id')

                ->select(['exp_booking_entries.id', 'exp_booking_entries.booking_code','exp_booking_entries.origin_port_id', 'exp_booking_entries.destination_port_id',  'c4.name AS agent_name', ])
                ->where(function ($query) use ($request) {
                    if ($term = $request->get('term')) {
                        $query->orWhere('booking_code', 'LIKE', $term . '%');
                    }

                })->take(10)->get();

            $results = [];
            foreach ($bookingEntries as $bookingEntry) {
                $results[] = [
                    'id'                => $bookingEntry->id,
                    'value'             => strtoupper($bookingEntry->warehouse_code),
                    'date_in'           => strtoupper($bookingEntry->date_in),
                    'division_name'     => strtoupper($bookingEntry->division_name),
                    'shipper_name'      => strtoupper($bookingEntry->shipper_name),
                    'consignee_name'    => strtoupper($bookingEntry->consignee_name),
                    'third_party_name'  => strtoupper($bookingEntry->third_party_name),
                    'agent_name'        => strtoupper($bookingEntry->agent_name),
                    'quantity'          => strtoupper($bookingEntry->agent_name),
                    'weight'            => strtoupper($bookingEntry->agent_name),
                    'cubic'             => strtoupper($bookingEntry->agent_name),
                ];
            }

            return response()->json($results);
        }
    }
}
