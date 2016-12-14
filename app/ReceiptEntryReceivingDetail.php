<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReceiptEntryReceivingDetail extends Model
{
    protected $table = 'whr_receipts_entries_receiving_details';

    protected $fillable = [
        'receipt_entry_id', 'line', 'pro_number', 'details', 'notes',
    ];

    /**
     * @param $id   int
     * @param $data array
     */
    public static function createDetail($id, $data)
    {
        $i=0; $a=0;
        DB::table('whr_receipts_entries_receiving_details')->where('receipt_entry_id', '=', $id)->delete();

        if (array_key_exists('receiving_line', $data)) {
          //  for ($i = 0; $i < count($data['receiving_line']); $i++) {
            while ($a < count($data['receiving_line'])) {
                if (isset($data['receiving_line'][$i])) {
                    $obj = new ReceiptEntryReceivingDetail();

                    $obj->receipt_entry_id = $id;
                    $obj->line = $a +1;
                    $obj->pro_number = $data['receiving_pro_number'][$i];
                    $obj->details = $data['receiving_details'][$i];
                    $obj->notes = $data['receiving_remarks'][$i];

                    $obj->save();
                    $a++;
                }
                $i++;
            }
        }
    }
}
