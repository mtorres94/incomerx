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
use Sass\CargoLoader;
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
                ->leftJoin('mst_customers AS c3', 'exp_booking_entries.forwarding_agent_id', '=', 'c3.id')
                ->leftJoin('mst_customers AS c5', 'exp_booking_entries.supplier_id', '=', 'c5.id')
                ->leftJoin('mst_customers AS c6', 'exp_booking_entries.notify_id', '=', 'c6.id')
                ->leftJoin('mst_states AS s1', 'exp_booking_entries.supplier_state_id', '=', 's1.id')
                ->leftJoin('mst_states AS s2', 'exp_booking_entries.notify_state_id', '=', 's2.id')
                ->leftJoin('mst_countries AS co1', 'exp_booking_entries.supplier_country_id', '=', 'co1.id')
                ->leftJoin('mst_countries AS co2', 'exp_booking_entries.notify_country_id', '=', 'co2.id')
                ->leftJoin('mst_zip_codes AS z1', 'exp_booking_entries.supplier_zip_code_id', '=', 'z1.id')
                ->leftJoin('mst_zip_codes AS z2', 'exp_booking_entries.notify_zip_code_id', '=', 'z2.id')

                ->select(['exp_booking_entries.*','c2.name AS consignee_name','c1.name AS shipper_name','c3.name AS forwarding_agent_name','c5.name AS supplier_name', 'c6.name as notify_name', 's1.name as supplier_state_name', 's2.name as notify_state_name', 'co1.name as supplier_country_name', 'co1.name as notify_country_name', 'z1.code as supplier_zip_code_code', 'z2.code as notify_zip_code_code' ])
                ->where(function ($query) use ($request) {
                    if ($term = $request->get('term')) {
                        $query->orWhere('booking_code', 'LIKE', $term . '%');
                    }

                })->take(10)->get();

            $results = [];
            foreach ($bookingEntries as $bookingEntry) {
                $results[] = [
                    'id'                        => $bookingEntry->id,
                    'code'                     => strtoupper($bookingEntry->booking_code),
                    'date_in'                   => strtoupper($bookingEntry->date_in),
                    'division_name'             => strtoupper($bookingEntry->division_name),
                    'division_id'               => strtoupper($bookingEntry->division_id),
                    'booked_on_date'            => $bookingEntry->booked_on_date,
                    'loading_date'               => $bookingEntry->loading_date,
                    'cut_off_date'               => $bookingEntry->cut_off_date,
                    'shipper_name'              => strtoupper($bookingEntry->shipper_name),
                    'consignee_name'            => strtoupper($bookingEntry->consignee_name),
                    'forwarding_agent_id'            => $bookingEntry->forwarding_agent_id,
                    'forwarding_agent_name'            => strtoupper($bookingEntry->forwarding_agent_name),

                    'agent_name'                => strtoupper($bookingEntry->agent_name),
                    'supplier_id'               => $bookingEntry->supplier_id,
                    'supplier_name'             => strtoupper($bookingEntry->supplier_name),
                    'supplier_address'             => strtoupper($bookingEntry->supplier_address),
                    'supplier_city'             => strtoupper($bookingEntry->supplier_city),
                    'supplier_state_id'         => $bookingEntry->supplier_state_id,
                    'supplier_state_name'       => strtoupper($bookingEntry->supplier_state_name),
                    'supplier_country_id'       => $bookingEntry->supplier_country_id,
                    'supplier_country_name'     => strtoupper($bookingEntry->supplier_country_name),
                    'supplier_zip_code_id'      => $bookingEntry->supplier_zip_code_id,
                    'supplier_zip_code_code'    => strtoupper($bookingEntry->supplier_zip_code_code),
                    'supplier_phone'            => $bookingEntry->supplier_phone,
                    'supplier_fax'              => $bookingEntry->supplier_fax,

                    'notify_id'                 => $bookingEntry->notify_id,
                    'notify_name'               => strtoupper($bookingEntry->notify_name),
                    'notify_address'               => strtoupper($bookingEntry->notify_address),
                    'notify_city'             => strtoupper($bookingEntry->notify_city),
                    'notify_state_id'           => $bookingEntry->notify_state_id,
                    'notify_state_name'         => strtoupper($bookingEntry->notify_state_name),
                    'notify_country_id'         => $bookingEntry->notify_country_id,
                    'notify_country_name'       => strtoupper($bookingEntry->notify_country_name),
                    'notify_zip_code_id'        => $bookingEntry->notify_zip_code_id,
                    'notify_zip_code_code'      => strtoupper($bookingEntry->notify_zip_code_code),
                    'notify_phone'            => $bookingEntry->notify_phone,
                    'notify_fax'              => $bookingEntry->notify_fax,
                ];
            }

            return response()->json($results);
        }
    }


    public function pdf($token, $id)
    {
        if (strlen($token) == 60) {
            try {
                $booking_entry= BookingEntry::findOrFail($id);
                return \PDF::loadView('export.oceans.booking_entries.pdf', compact('booking_entry'))->stream('DO '.$booking_entry->code.'.pdf');
            } catch (ModelNotFoundException $e) {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

}
