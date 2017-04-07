<?php

namespace Sass\Http\Controllers;
use Illuminate\Http\Request;
use Sass\EaAirwayBill;
use Sass\EoShipmentEntry;
use Sass\Http\Requests;
use Sass\ReceiptEntry;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = ReceiptEntry::groupBy(DB::raw('year(date_in)'))
            ->select(DB::raw('year(date_in) as year'))
            ->orderBy(DB::raw('year(date_in)'), 'desc')
            ->get();
        $year = [];
        foreach ($years as $var) {
            $year[] = $var->year;
        }

        $groups = ReceiptEntry::join('mst_countries', 'whr_receipts_entries.location_country_id', '=', 'mst_countries.id')
            ->groupBy('whr_receipts_entries.location_country_id')
            ->select(['mst_countries.code AS country_code', DB::raw('count(*) as total_warehouse')])
            ->orderBy('total_warehouse', 'desc')
            ->get();

        $results = [];
        foreach ($groups as $group) {
            $results[strtoupper($group->country_code)] = $group->total_warehouse;
        }


        return view('layouts.partials.dashboard', compact('year', 'results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dashboard_values(){
        //WAREHOUSE DESTINATION
        $groups = ReceiptEntry::join('mst_countries', 'whr_receipts_entries.location_country_id', '=', 'mst_countries.id')
            ->groupBy('whr_receipts_entries.location_country_id')
            ->select(['mst_countries.code AS country_code', DB::raw('count(*) as total_warehouse')])
            ->orderBy('total_warehouse', 'desc')
            ->get();

        $destination = [];
        foreach ($groups as $group) {
            $destination[strtoupper($group->country_code)] = $group->total_warehouse;
        }
        //========================================================
        //WAREHOUSE USERS
        $groups = ReceiptEntry::join('mst_users', 'whr_receipts_entries.user_create_id', '=', 'mst_users.id')
            ->groupBy('whr_receipts_entries.user_create_id')
            ->select(['mst_users.username AS name', DB::raw('count(*) as total')])
            ->orderBy('total', 'desc')
            ->get();
        $user = [];
        foreach ($groups as $group) {
            $user[]=[
                'name' => strtoupper($group->name),
                'data' => [$group->total]
            ];
        }

        //========================================================
        // FILE CALENDAR
        $groups = EoShipmentEntry::select(['eo_shipment_entries.code', 'eo_shipment_entries.arrival_date', 'eo_shipment_entries.departure_date', 'eo_shipment_entries.vessel_name',  'eo_shipment_entries.voyage_name'])
            ->get();
        $file = [];
        foreach ($groups as $group) {
            $file[]=[
                'title' =>  "FILE#: ".$group->code." - VESSEL: ". strtoupper($group->vessel_name) ." - VOYAGE: ". strtoupper($group->vessel_name),
                'start' =>  $group->departure_date,
                'end'   =>  $group->arrival_date,
            ];
        }
        return response()->json([$destination, $file, $user]);
    }

    public function warehouse_status(Request $request)
    {
        if ($request->ajax()) {
            $groups=ReceiptEntry::groupBy(DB::raw('month(whr_receipts_entries.date_in)'), DB::raw('year(whr_receipts_entries.date_in)'))
                ->select([DB::raw('monthname(whr_receipts_entries.date_in) as month'), DB::raw('year(whr_receipts_entries.date_in) as year'), DB::raw('count(*) as total'), 'whr_receipts_entries.status'])
                ->orderBy('whr_receipts_entries.date_in')
                ->where(function ($query) use ($request) {
                    $year = $request->get('year');
                    $query->where(DB::raw('year(whr_receipts_entries.date_in)'), $year);
                    switch($request->get('status')){
                        case 1:     $query->where('whr_receipts_entries.status', 'O');      break;
                        case 2:     $query->where('whr_receipts_entries.status', 'H');      break;
                        case 3:     $query->where('whr_receipts_entries.status', 'P');      break;
                        case 4:     $query->where('whr_receipts_entries.status', 'C');      break;
                    }
                })->get();
            $status = "";
                switch($request->get('status')){
                    case 0:    $status = 'ALL WAREHOUSES'; break;
                    case 1:     $status = 'OPEN';      break;
                    case 2:     $status = 'HOLD';      break;
                    case 3:     $status = 'IN PROCESS';      break;
                    case 4:     $status = 'CLOSED';      break;
                }
            $result = []; $values = []; $month = [];
            foreach ($groups as $group) {
                $month[] = $group->month;
                $values[] = $group->total;
            }
            $result[]=[
                'name'=> $status,
                'data' => $values,
            ];
            $month = array_keys(array_flip($month));
            return response()->json([$result, $month]);
        }
    }

    public function table_warehouses(Request $request)
    {
        if ($request->ajax()) {
            $groups = ReceiptEntry::join('mst_countries', 'whr_receipts_entries.location_country_id', '=', 'mst_countries.id')
                ->groupBy('whr_receipts_entries.location_country_id')
                ->select(['mst_countries.code AS country_code', 'whr_receipts_entries.location_country_id as country_id', 'mst_countries.name AS country_name', DB::raw('count(*) as total')])
                ->orderBy('whr_receipts_entries.location_country_id', 'asc')
                ->where(DB::raw('year(whr_receipts_entries.date_in)'), $request->get('year'))
                ->get();

            $result = []; $country = []; $values = [];
            foreach($groups as $group){
                $country[] = strtoupper($group->country_code);
                $values[] = $group->total;
            }
            $result[] = [
                'name'=> 'WR',
                'data' => $values,
            ];
            return response()->json([$result, $country]);
        }
    }

    public function airway_bill_details (Request $request)
    {
        if ($request->ajax()) {
            $groups = EaAirwayBill::join('ea_shipment_entries as f', 'ea_airwaybills.shipment_id', '=', 'f.id')
                ->select([DB::raw('sum(sum_pieces) as total_pieces'), DB::raw('sum(sum_weight) as total_weight'), 'f.code as file_code'])
                ->where(DB::raw('year(ea_airwaybills.date)'),'=', $request->get('year'))
                ->groupBy('ea_airwaybills.shipment_id')
                ->get();

            $valuesX  = []; $valuesY = []; $file= [];
            foreach($groups as $group){
                $valuesX[] = floatval($group->total_pieces);
                $valuesY[] = floatval($group->total_weight);
                $file[] = $group->file_code;
            }

            return response()->json([$valuesX, $valuesY, $file]);
        }
    }

    public function table_expire_date ()
    {
        $warehouses= ReceiptEntry::join('mst_customers as c1', 'whr_receipts_entries.shipper_id', '=', 'c1.id')
            ->join('mst_customers as c2', 'whr_receipts_entries.consignee_id', '=', 'c2.id')
            ->select(['whr_receipts_entries.code','whr_receipts_entries.status','c1.name as shipper_name', 'c2.name as consignee_name',DB::raw('datediff(now(), whr_receipts_entries.expire_date) as total'),  'whr_receipts_entries.expire_date'])
            ->where(DB::raw('datediff(now(), whr_receipts_entries.expire_date)'), '>=', 0)
            ->where('whr_receipts_entries.status', '<>', 'C')
            ->orderBy('whr_receipts_entries.created_at', 'asc')
            ->get();
        return Datatables::of($warehouses)->make();

    }

}
