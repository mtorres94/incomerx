<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class EoHblReceiptEntry extends Model
{
    protected $table = 'eo_hbl_receipt_entries';

    protected $fillable = [
        'line','receipt_entry_id', 'bill_of_lading_id', 'cargo_loader_id'];
    public $timestamps = false;
    public static function saveDetail($id, $data)
    {
        $i = 0;
        $a = 0;
        DB::table('eo_hbl_receipt_entries')->where('cargo_loader_id', '=', $id)->delete();
        if (isset($data['hidden_warehouse_line'])) {

            while ($a < count($data['hidden_warehouse_line'])) {
                if (isset($data['hidden_warehouse_line'][$i])) {

                    $obj = new EoHblReceiptEntry();
                    $obj->line = $a + 1;
                    $obj->bill_of_lading_id =  $data['hbl_line_id'][$i];
                    $obj->receipt_entry_id = $data['hidden_warehouse_line'][$i];
                    $obj->cargo_loader_id = $id;
                    $obj->save();
                    $a++;
                }
                $i++;
            }
        }
    }

    public function bill_of_lading()
    {
        return $this->belongsTo('Sass\EoBillOfLading','bill_of_lading_id');
    }

    public function receipt_entry()
    {
        return $this->belongsTo('Sass\ReceiptEntry', 'receipt_entry_id');
    }

    public function receipt_entry_details()
    {
        return $this->hasMany('Sass\ReceiptEntryCargoDetail', 'receipt_entry_id');
    }
}
