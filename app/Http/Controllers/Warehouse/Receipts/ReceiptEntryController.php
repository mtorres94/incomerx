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
        $unique_str = str_random(25);
        return view('warehouse.receipts.receipts_entries.create', compact('unique_str'));
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

            ReceiptEntryReceivingDetail::saveDetail($whr->id, $receipt_entry);
            ReceiptEntryReferenceDetail::saveDetail($whr->id, $receipt_entry);
            ReceiptEntryHazardousDetail::saveDetail($whr->id, $receipt_entry);

        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();
        return view('warehouse.receipts.receipts_entries.create');
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

    public function get ($id)
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

    public function upload (Request $request)
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

    public function delete ()
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
}
