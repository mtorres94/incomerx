<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReceiptEntryHazardousDetail extends Model
{
    protected $table = 'whr_receipts_entries_hazardous_details';

    protected $fillable = [
        'receipt_entry_id', 'line', 'uns_id', 'uns_description', 'notes',
    ];

   public function uns_code()
   {
       return $this->belongsTo('Sass\UnsCode', 'uns_id');
   }

    /**
     * @param $id   int
     * @param $data array
     */
    public static function createDetail($id, $data)
    {
        $a = 0; $i = 0;
        DB::table('whr_receipts_entries_hazardous_details')->where('receipt_entry_id', '=', $id)->delete();

        if (array_key_exists('hazardous_uns_line', $data)) {
            // for ($i = 0; $i < count($data['hazardous_uns_line']); $i++) {
            while ($a < count($data['hazardous_uns_line'])) {
                if (isset($data['hazardous_uns_line'][$i])) {
                    $obj = new ReceiptEntryHazardousDetail();

                    $obj->receipt_entry_id = $id;
                    $obj->uns_id = $data['hazardous_uns_id'][$i];
                    $obj->line = $a + 1;
                    $obj->uns_description = $data['hazardous_uns_desc'][$i];
                    $obj->notes = $data['hazardous_uns_note'][$i];

                    $obj->save();
                    $a++;
                }
                $i++;
            }
        }
    }
}
