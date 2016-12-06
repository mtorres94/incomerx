<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReceiptEntryReferenceDetail extends Model
{
    protected $table = 'whr_receipts_entries_references_details';

    protected $fillable = [
        'receipt_entry_id', 'po_number', 'ref_number', 'booking_number', 'invoice_number', 'invoice_amount', 'notes',
    ];

    /**
     * @param $id   int
     * @param $data array
     */
    public static function createDetail($id, $data) {
        DB::table('whr_receipts_entries_references_details')->where('receipt_entry_id', '=', $id)->delete();

        if (array_key_exists('references_line', $data)) {
            $j = 0;
            for ($i = 0; $i < count($data['references_line']); $i++) {
                $obj = new ReceiptEntryReferenceDetail();
                $j++;

                $obj->receipt_entry_id = $id;
                $obj->line             = $j;
                $obj->po_number        = $data['references_po_number'][$i];
                $obj->ref_number       = $data['references_ref_number'][$i];
                $obj->booking_number   = (isset($data['references_booking_number'][$i])? $data['references_booking_number'][$i] : "");
                $obj->invoice_number   = (isset($data['references_inv_number'][$i])? $data['references_inv_number'][$i] : "");
                $obj->invoice_amount   = (isset($data['references_invoice_amount'][$i])? $data['references_invoice_amount'][$i] : "");
                $obj->notes            = $data['references_note'][$i];
                $obj->line            = $data['references_line'][$i];

                $obj->save();
            }
        }
    }
}
