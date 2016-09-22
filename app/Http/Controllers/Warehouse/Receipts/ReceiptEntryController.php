<?php

namespace Sass\Http\Controllers\Warehouse\Receipts;

use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Sass\DataTables\Warehouse\Receipts\ReceiptEntryDataTable;
use Sass\Http\Controllers\Controller;
use Sass\Http\Requests;

use Sass\Http\Requests\Warehouse\Receipts\Create\CreateReceiptEntryRequest;
use Sass\Logic\File\FileRepository;
use Sass\ReceiptEntry;
use Sass\ReceiptEntryAttachment;
use Sass\ReceiptEntryCargoDetail;
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
     * @return \Illuminate\Http\Response
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
        #$unique_str = str_random(25);
        return view('warehouse.receipts.receipts_entries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateReceiptEntryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReceiptEntryRequest $request)
    {
        DB::beginTransaction();
        try {
            $count = ReceiptEntry::count() + 1;
            $warehouse_code = str_pad($count, 10, '0', STR_PAD_LEFT);

            $receipt_entry = $request->all();
            $receipt_entry['warehouse_code'] = $warehouse_code;
            $receipt_entry['user_create_id'] = Auth::user()->id;
            $receipt_entry['user_update_id'] = Auth::user()->id;

            $whr = ReceiptEntry::create($receipt_entry);

            ReceiptEntryReceivingDetail::createDetail($whr->id, $receipt_entry);
            ReceiptEntryReferenceDetail::createDetail($whr->id, $receipt_entry);
            ReceiptEntryHazardousDetail::createDetail($whr->id, $receipt_entry);
            ReceiptEntryCargoDetail::createDetail($whr->id, $receipt_entry);

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();

        $unique_str = str_random(25);
        return view('warehouse.receipts.receipts_entries.create', compact('unique_str'));
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
        return view('warehouse.receipts.receipts_entries.edit', compact('receipt_entry', 'unique_str'));
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

                ->select(['whr_receipts_entries.id', 'whr_receipts_entries.warehouse_code', 'whr_receipts_entries.date_in', 'mst_divisions.name AS division_name', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS third_party_name', 'c4.name AS agent_name', ])
                ->where(function ($query) use ($request) {
                    $type = $request->get('type_for');
                    if ($term = $request->get('term')) {
                        switch($type ){
                            case 1: $query->orWhere('warehouse_code', 'LIKE', $term . '%');
                                break;
                            case 2: $query ->orWhere('mst_divisions.code', 'LIKE', $term . '%');
                                $query ->orWhere('mst_divisions.name', 'LIKE', $term . '%');
                                break;
                            case 3: $query ->orWhere('c1.code', 'LIKE', $term . '%');
                                $query ->orWhere('c1.name', 'LIKE', $term . '%');
                                break;
                            case 4: $query ->orWhere('c2.code', 'LIKE', $term . '%');
                                $query ->orWhere('c2.name', 'LIKE', $term . '%');
                                break;
                            case 5: $query ->orWhere('c4.code', 'LIKE', $term . '%');
                                $query ->orWhere('c4.name', 'LIKE', $term . '%');
                                break;
                            case 6: $query ->orWhere('c3.code', 'LIKE', $term . '%');
                                $query ->orWhere('c3.name', 'LIKE', $term . '%');
                                break;
                            case 7: $query ->orWhere('date_in', 'LIKE', $term . '%');
                                break;
                        }
                    }
                })->take(10)->get();

            $results = [];
            foreach ($receipts_entries as $receipt_entry) {
                $results[] = [
                    'id'                => $receipt_entry->id,
                    'value'             => strtoupper($receipt_entry->warehouse_code),
                    'date_in'           => strtoupper($receipt_entry->date_in),
                    'division_name'     => strtoupper($receipt_entry->division_name),
                    'shipper_name'      => strtoupper($receipt_entry->shipper_name),
                    'consignee_name'    => strtoupper($receipt_entry->consignee_name),
                    'third_party_name'  => strtoupper($receipt_entry->third_party_name),
                    'agent_name'        => strtoupper($receipt_entry->agent_name),
                    'quantity'          => strtoupper($receipt_entry->agent_name),
                    'weight'            => strtoupper($receipt_entry->agent_name),
                    'cubic'             => strtoupper($receipt_entry->agent_name),
                ];
            }

            return response()->json($results);
        }
    }

    public function pdf($id)
    {
        $receipt_entry = ReceiptEntry::find($id);

        # return view('warehouse.receipts.receipts_entries.pdf', compact('receipt_entry'));

        return \PDF::loadView('warehouse.receipts.receipts_entries.pdf', compact('receipt_entry'))->stream('example.pdf');
    }
}
