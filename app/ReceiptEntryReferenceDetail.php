<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class ReceiptEntryReferenceDetail extends Model
{
    protected $table = 'whr_receipts_entries_references_details';

    protected $fillable = [
        'receipt_entry_id', 'po_number', 'ref_number', 'booking_number', 'invoice_number', 'invoice_amount', 'notes',
    ];

    public static function saveDetail($id, $data) {
        for ($i = 0; $i < count($data['references_line']); $i++) {
            $obj = new ReceiptEntryReferenceDetail();

            $obj->receipt_entry_id = $id;
            $obj->po_number        = $data['references_po_number'][$i];
            $obj->ref_number       = $data['references_ref_number'][$i];
            $obj->booking_number   = $data['references_booking_number'][$i];
            $obj->invoice_number   = $data['references_inv_number'][$i];
            $obj->invoice_amount   = $data['references_invoice_amount'][$i];
            $obj->notes            = $data['references_note'][$i];

            $obj->save();
        }
    }
}
