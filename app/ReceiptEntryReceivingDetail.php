<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class ReceiptEntryReceivingDetail extends Model
{
    protected $table = 'whr_receipts_entries_receiving_details';

    protected $fillable = [
        'receipt_entry_id', 'line', 'pro_number', 'details', 'notes',
    ];

    public static function saveDetail($id, $data)
    {
        for ($i = 0; $i < count($data['receiving_line']); $i++) {
            $obj = new ReceiptEntryReceivingDetail();

            $obj->receipt_entry_id = $id;
            $obj->line             = $data['receiving_line'][$i];
            $obj->pro_number       = $data['receiving_pro_number'][$i];
            $obj->details          = $data['receiving_details'][$i];
            $obj->notes            = $data['receiving_remarks'][$i];

            $obj->save();
        }
    }
}
