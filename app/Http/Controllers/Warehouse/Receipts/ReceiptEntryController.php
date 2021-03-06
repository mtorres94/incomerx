<?php

namespace Sass\Http\Controllers\Warehouse\Receipts;

use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Sass\DataTables\Warehouse\Receipts\ReceiptEntryDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;

use Sass\Http\Requests\Warehouse\Receipts\Create\CreateReceiptEntryRequest;
use Sass\Logic\File\FileRepository;
use Sass\ReceiptEntry;
use Sass\ReceiptEntryAttachment;
use Sass\ReceiptEntryCargoDetail;
use Sass\ReceiptEntryChargeDetail;
use Sass\ReceiptEntryHazardousDetail;
use Sass\ReceiptEntryReceivingDetail;
use Sass\ReceiptEntryReferenceDetail;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ReceiptEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ReceiptEntryDataTable $dataTable
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ReceiptEntryDataTable $dataTable)
    {
        return $dataTable->render('warehouse.receipts.receipts_entries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unique_str = str_random(25);
        $user_open_id = auth()->user()->id;

        return view('warehouse.receipts.receipts_entries.create', compact('unique_str', 'user_open_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $last = ReceiptEntry::orderBy('code','desc')->first();
            $frmt = $last == null ? 1 : intval(substr($last->code, 3)) + 1;
            $code = 'WH-'.str_pad($frmt, 7, '0', 0);
            # $code = str_pad($count, 10, '0', STR_PAD_LEFT);

            $receipt_entry = $request->all();

            $receipt_entry['code'] = $code;
            $receipt_entry['user_create_id'] = auth()->user()->id;
            $receipt_entry['user_update_id'] = auth()->user()->id;
            $receipt_entry['cargo_loader_id'] = 0;

            $whr = ReceiptEntry::create($receipt_entry);

            ReceiptEntryReceivingDetail::createDetail($whr->id, $receipt_entry);
            ReceiptEntryReferenceDetail::createDetail($whr->id, $receipt_entry);
            ReceiptEntryHazardousDetail::createDetail($whr->id, $receipt_entry);
            ReceiptEntryCargoDetail::createDetail($whr->id, $receipt_entry);
            ReceiptEntryChargeDetail::createDetail($whr->id, $receipt_entry);

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();

        # $this->mail($whr->id);

        return redirect()->route('warehouse.receipts.receipts_entries.edit', [$whr->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receipt_entry = ReceiptEntry::findOrFail($id);
        return view('warehouse.receipts.receipts_entries.show', compact('receipt_entry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receipt_entry = ReceiptEntry::findOrFail($id);
        $unique_str = $receipt_entry->unique_str;
        $user_open_id =  ($receipt_entry->user_open_id == 0) ? auth()->user()->id : $receipt_entry->user_open_id;

        $receipt_entry = self::updateOpenStatus($receipt_entry);
        $receipt_entry->save();

        return view('warehouse.receipts.receipts_entries.edit', compact('receipt_entry', 'unique_str', 'user_open_id'));
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
            $details = $request->all();
            $receipt_entry = ReceiptEntry::findOrFail($id);
            $receipt_entry['user_update_id'] = auth()->user()->id;
            $receipt_entry->fill($request->all());
            $receipt_entry->save();

            ReceiptEntryReceivingDetail::createDetail($id, $details);
            ReceiptEntryReferenceDetail::createDetail($id, $details);
            ReceiptEntryHazardousDetail::createDetail($id, $details);
            ReceiptEntryCargoDetail::createDetail($id, $details);
            ReceiptEntryChargeDetail::createDetail($id, $details);

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();

        # $this->mail($id);

        return redirect()->route('warehouse.receipts.receipts_entries.edit', [$id]);
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

    public function updateClose(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];

        if ($id > 0)
        {
            $receipt_entry = ReceiptEntry::findOrFail($id);

            if (auth()->user()->id == $receipt_entry->user_open_id)
            {
                $receipt_entry = self::updateCloseStatus($receipt_entry);
                $receipt_entry->save();
            }
        }

        return response()->json(['status' => 'close']);
    }

    public function getOpenStatus(Request $request)
    {
        $data = $request->all();
        $receipt_entry = ReceiptEntry::findOrFail($data['id']);
        return [
            'id'   => $receipt_entry->user_open_id,
            'name' => $receipt_entry->user_open_id > 0 ? $receipt_entry->user_open->name : '',
        ];
    }

    public function get($id)
    {
        $files = ReceiptEntryAttachment::where('unique_str', $id)->get();
        $path = public_path()."/storage/";

        $rtn = [];
        foreach ($files as $file) {
            if (File::exists($path.$file->temp_name))
            {
                $rtn[] = [
                    'original_name' => $file->original_name,
                    'temp_name' => $file->temp_name,
                    'type' => strtolower(File::extension($file->original_name)),
                    'route' => asset(Storage::disk('storage')->url($file->temp_name)),
                    'key' => $file->id,
                    'size' => File::size($path.$file->temp_name),
                ];
            }
        }
        return response()->json(['files' => $rtn]);
    }

    public function upload(Request $request)
    {
        $upload = $request->all();
        $unique_str = $upload['unique_str'];
        try {
            $path = public_path().'/storage/';
            $file = $request->file('file')[0];

            $tmp = FileRepository::generate($file);
            $file->move($path, $tmp['temp_name']);
            ReceiptEntryAttachment::saveAttachment($unique_str, $tmp);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'The file could not be uploaded']);
        }
        return response()->json();
    }

    public function download ()
    {
        //
    }

    public function delete()
    {
        $key = Input::get('key');
        if (!$key) return response()->json(['error' => 'The file could not be deleted']);

        $sessionFile = ReceiptEntryAttachment::findOrFail($key);
        $path_file = public_path().'/storage/'.$sessionFile->temp_name;

        try {
            if (!empty($sessionFile)) { $sessionFile->delete(); }
            if (File::exists($path_file)) { File::delete($path_file); }
        } catch (FileException $e) {
            return response()->json(['error' => 'The file could not be deleted']);
        }
        return response()->json();
    }

    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            $receipts_entries = ReceiptEntry::leftJoin('mst_divisions', 'whr_receipts_entries.division_id', '=', 'mst_divisions.id')
                ->leftJoin('mst_customers AS c1', 'whr_receipts_entries.shipper_id', '=', 'c1.id')
                ->leftJoin('mst_customers AS c2', 'whr_receipts_entries.consignee_id', '=', 'c2.id')
                ->leftJoin('mst_customers AS c3', 'whr_receipts_entries.third_party_id', '=', 'c3.id')
                ->leftJoin('mst_customers AS c4', 'whr_receipts_entries.agent_id', '=', 'c4.id')
                ->select(['whr_receipts_entries.*', 'mst_divisions.name AS division_name', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS third_party_name', 'c4.name AS agent_name'])
                ->where(function ($query) use ($request) {
                    $type = $request->get('type_for');

                    $query->where('whr_receipts_entries.cargo_loader_id', '=', 0);
                    $query->where('whr_receipts_entries.status', 'O');


                    if ($term = $request->get('term')) {
                        switch ($type) {
                            case 1:
                                $query->where('whr_receipts_entries.id', $term);
                                break;
                            case 2:
                                $query->where('whr_receipts_entries.division_id', $term);
                                break;
                            case 3:
                                $query->where('whr_receipts_entries.shipper_id', $term);
                                break;
                            case 4:
                                $query->where('whr_receipts_entries.consignee_id',$term);
                                break;
                            case 5:
                                $query->where('whr_receipts_entries.agent_id',$term);
                                break;
                            case 6:
                                $query->where('whr_receipts_entries.third_party_id',$term);
                                break;
                            case 7:
                                $query->Where('whr_receipts_entries.date_in', $term);
                                break;
                            default:
                                $query->where('whr_receipts_entries.code','like', $term.'%');
                                break;
                        }
                    }
                })->take(10)->get();

            $results = [];
            foreach ($receipts_entries as $receipt_entry) {
                $results[] = [
                    'id' => $receipt_entry->id,
                    'value' => strtoupper($receipt_entry->code),
                    'date_in' => strtoupper($receipt_entry->date_in),
                    'status' => strtoupper($receipt_entry->status),
                    'division_name' => strtoupper($receipt_entry->division_name),
                    'shipper_name' => strtoupper($receipt_entry->shipper_name),
                    'shipper_id' => strtoupper($receipt_entry->shipper_id),
                    'shipper_address' => strtoupper($receipt_entry->shipper_address),
                    'shipper_city' => strtoupper($receipt_entry->shipper_city),
                    'shipper_state_id' => strtoupper($receipt_entry->shipper_state_id),
                    'shipper_state_name' => strtoupper(($receipt_entry->shipper_state_id > 0 ? $receipt_entry->shipper_state->name : "")),
                    'shipper_zip_code_id' => strtoupper($receipt_entry->shipper_zip_code_id),
                    'shipper_zip_code_code' => strtoupper(($receipt_entry->shipper_zip_code_id> 0 ? $receipt_entry->shipper_zip_code->code : "")),
                    'shipper_phone' => strtoupper($receipt_entry->shipper_phone),
                    'shipper_fax' => strtoupper($receipt_entry->shipper_fax),

                    'consignee_name' => strtoupper($receipt_entry->consignee_name),
                    'consignee_id' => strtoupper($receipt_entry->consignee_id),
                    'consignee_address' => strtoupper($receipt_entry->consignee_address),
                    'consignee_city' => strtoupper($receipt_entry->consignee_city),
                    'consignee_state_id' => strtoupper($receipt_entry->consignee_state_id),
                    'consignee_state_name' => strtoupper(($receipt_entry->consigne_state_id > 0 ? $receipt_entry->consignee_state->name : "")),
                    'consignee_zip_code_id' => strtoupper($receipt_entry->consignee_zip_code_id),
                    'consignee_zip_code_code' => strtoupper(($receipt_entry->consignee_zip_code_id> 0 ? $receipt_entry->consignee_zip_code->code : "")),
                    'consignee_phone' => strtoupper($receipt_entry->consignee_phone),
                    'consignee_fax' => strtoupper($receipt_entry->consignee_fax),

                    'third_party_name' => strtoupper($receipt_entry->third_party_name),
                    'third_party_id' => strtoupper($receipt_entry->third_party_id),
                    'agent_name' => strtoupper($receipt_entry->agent_name),
                    'quantity' => strtoupper($receipt_entry->sum_pieces),
                    'sum_weight' => strtoupper($receipt_entry->sum_weight),
                    'sum_cubic' => strtoupper($receipt_entry->sum_cubic),
                    'service_name' => ($receipt_entry->location_service_id > 0 ? $receipt_entry->service->name : ""),
                    'service_id' => $receipt_entry->location_service_id,
                    'destination_id' => $receipt_entry->location_destination_id,
                    'volume_weight' => $receipt_entry->sum_volume_weight,
                    'destination_name' => ($receipt_entry->destination_id > 0 ? $receipt_entry->destination->name : ""),
                    'warehouse_id' => $receipt_entry->warehouse_id,
                    'hazardous' => $receipt_entry->is_hazardous,
                    'warehouse_name' => ($receipt_entry->warehouse_id > 0 ? $receipt_entry->warehouse->code : ""),
                    'location_destination_code' => strtoupper($receipt_entry->location_destination_code),

                ];
            }

            return response($results);
        }
    }

    public function report(Request $request) {
        $id = $request->get('_id');
        $type = $request->get('_type');
        $receipt_entry = null;

        try {
            $receipt_entry = ReceiptEntry::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        if ($type == 3 || $type == 4) {
            if ($type == 3) {
                return \PDF::loadView('warehouse.receipts.receipts_entries.label', compact('receipt_entry', 'type'))
                    ->setOption('margin-top', 5)
                    ->setOption('margin-left', 3)
                    ->setOption('margin-right', 3)
                    ->setOption('margin-bottom', 5)
                    ->setOption('page-height', 150)
                    ->setOption('page-width', 100)
                    ->stream($receipt_entry->code.'.pdf');
                # return view('warehouse.receipts.receipts_entries.label', compact('receipt_entry', 'type'));
            } else {
                return \PDF::loadView('warehouse.receipts.receipts_entries.label', compact('receipt_entry', 'type'))
                    ->setOrientation('landscape')
                    ->stream('WH '.$receipt_entry->code.'.pdf');
            }
        } else {
            return \PDF::loadView('warehouse.receipts.receipts_entries.pdf', compact('receipt_entry','type'))->stream('WH '.$receipt_entry->code.'.pdf');
        }
    }

    public function cargo_report()
    {
        return view('warehouse.receipts.reports.cargo.index');
    }

    public function cargo_report_view(Request $request)
    {
        $date = !empty($request->get('date_from')) ? 'Date: '.$request->get('date_from') : '';
        $date .= (!empty($request->get('date_to')) && !empty($date)) ? ' to '.$request->get('date_to') : '';

        $type = $request->get('type');

        $report = ReceiptEntry::where(function ($query) use ($request, $type) {
            switch ($type) {
                case 1:
                    $query->where('status', '<>', '');
                    break;
                case 2:
                    $query->where('status', '<>', 'C');
                    break;
                case 3:
                    $query->where('status', '=', 'C');
                    break;
            }
            if (!empty($request->get('shipper_id'))) {
                $query->where('shipper_id', $request->get('shipper_id'));
            }
            if (!empty($request->get('consignee_id'))) {
                $query->where('consignee_id', $request->get('consignee_id'));
            }
            if (!empty($request->get('third_party_id'))) {
                $query->where('third_party_id', $request->get('third_party_id'));
            }
            if (!empty($request->get('agent_id'))) {
                $query->where('agent_id', $request->get('agent_id'));
            }
            if (!empty($request->get('mode'))) {
                $query->where('mode', $request->get('mode'));
            }
            if (!empty($request->get('hold_status'))) {
                switch ($request->get('hold_status')) {
                    case 'E':
                        $query->where('status', '<>', 'H');
                        break;
                    case 'O':
                        $query->where('status', '=', 'H');
                        break;
                }
            }
            if (!empty($request->get('location_origin_id'))) {
                $query->where('location_origin_id', $request->get('location_origin_id'));
            }
            if (!empty($request->get('location_destination_id'))) {
                $query->where('location_destination_id', $request->get('location_destination_id'));
            }
            if (!empty($request->get('location_country_id'))) {
                $query->where('location_country_id', $request->get('location_country_id'));
            }
            if (!empty($request->get('location_service_id'))) {
                $query->where('location_service_id', $request->get('location_service_id'));
            }
            if (!empty($request->get('date_from'))) {
                $query->where('date_in', '>=', $request->get('date_from'));
            }
            if (!empty($request->get('date_to'))) {
                $query->where('date_in', '<=', $request->get('date_to'));
            }
        })->get();

        return \PDF::loadView('warehouse.receipts.reports.cargo.report', compact('report', 'type', 'date'))
            ->stream('Cargo Received Report.pdf');

        #return view('warehouse.receipts.reports.cargo.report', compact('report'));
    }

    public function mail($id)
    {
        $data = ReceiptEntry::findOrFail($id);
        Mail::send('warehouse.receipts.receipts_entries.mail', ['data' => $data], function ($msj) use ($data) {
            $msj->subject('Notifications');
            $msj->to(['mtorres@sassblum.com']);
        });
    }

    public function get_details(Request $request)
    {
        if ($request->ajax()) {
            $receipts_entries = ReceiptEntryCargoDetail::select(['whr_receipts_entries_cargo_details.*'])
                ->where(function ($query) use ($request) {
                    $whr_select = $request->get('id_select');
                    $query->orWhere('whr_receipts_entries_cargo_details.receipt_entry_id', '=', $whr_select);
                })->get();

            $results = [];
            foreach ($receipts_entries as $receipt_entry) {
                $results[] = [
                    'id' => $receipt_entry->id,
                    'receipt_entry_id' => $receipt_entry->receipt_entry_id,
                    'warehouse_code' => strtoupper(($receipt_entry->receipt_entry_id > 0 ? $receipt_entry->receipt_entry->code : "")),
                    'quantity' => $receipt_entry->quantity,
                    'cargo_type_id' => $receipt_entry->cargo_type_id,
                    'cargo_type_code' => strtoupper(($receipt_entry->cargo_type_id > 0 ? $receipt_entry->cargo_type->code : "")),
                    'pieces' => $receipt_entry->pieces,
                    'weight_unit' => strtoupper($receipt_entry->weight_unit_measurement_id),
                    'metric_unit' => strtoupper($receipt_entry->metric_unit_measurement_id),
                    'length' => $receipt_entry->length,
                    'width' => $receipt_entry->width,
                    'height' => $receipt_entry->height,
                    'total_weight' => $receipt_entry->total_weight,
                    'cubic' => $receipt_entry->cubic,
                    'volume_weight' => $receipt_entry->volume_weight,
                    'location_id' => $receipt_entry->location_id,
                    'location_name' => strtoupper(($receipt_entry->location_id > 0 ? $receipt_entry->location->name : "")),
                    'location_bin_id' => strtoupper($receipt_entry->location_bin_id),
                    'location_bin_name' => strtoupper(($receipt_entry->location_bin_id > 0 ? $receipt_entry->bin->name : "")),
                    'material_description' => strtoupper($receipt_entry->material_description),
                    'dim_fact' => $receipt_entry->dim_fact,
                    'tare_weight' => $receipt_entry->tare_weight,
                    'net_weight' => $receipt_entry->net_weight,
                ];
            }

            return response()->json($results);
        }
    }



}
