<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ReceiptEntryContainerDetail extends Model
{
    protected $table = 'whr_receipts_entries_container_details';
    public $timestamps = false;
    protected $fillable = [
        'receipt_entry_id', 'line', 'equipment_type_id', 'remarks', 'seal_number', 'container_number'
    ];

    public static function createDetail($id, $data)
    {
        $a = 0; $i = 0;
        DB::table('whr_receipts_entries_container_details')->where('receipt_entry_id', '=', $id)->delete();

        if (array_key_exists('container_line', $data)) {
           // for ($i = 0; $i < count($data['container_line']); $i++) {
                while ($a < count($data['container_line'])) {
                    if (isset($data['container_line'][$i])) {
                        $obj = new ReceiptEntryContainerDetail();

                        $obj->receipt_entry_id = $id;
                        $obj->line = $data['container_line'][$i];
                        $obj->equipment_type_id = $data['container_equipment_type_id'][$i];
                        $obj->seal_number = $data['container_seal_number'][$i];
                        $obj->remarks = $data['container_remarks'][$i];
                        $obj->container_number = $data['container_number'][$i];

                        $obj->save();
                        $a++;
                    }
                    $i++;
                }
        }
    }

    public function equipment_type()
    {
        return $this->belongsTo('Sass\CargoType', 'equipment_type_id');
    }
}
