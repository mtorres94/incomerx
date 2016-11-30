<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class EoHblReceiptEntry extends Model
{
    protected $table = 'exp_oceans_hbl_receipt_entries';

    protected $fillable = [
        'line','receipt_entry_id', 'bill_of_lading_id', 'created_at', 'updated_at'];

    public static function saveDetail($data)
    {
        $i = -1;
        $a = 0;
        if (isset($data['hidden_warehouse_line'])) {
            //$details = DB::table('exp_oceans_hbl_receipt_entries')->where('bill_of_lading_id', '=', $id)->delete();
            while ($a < count($data['hidden_warehouse_line'])) {
                $i++;
                if (isset($data['hidden_warehouse_line'][$i])) {
                    $obj = new EoHblReceiptEntry();
                    $obj->line = $a + 1;
                    $obj->bill_of_lading_id =  $data['hbl_line_id'][$i];
                    $obj->receipt_entry_id = $data['hidden_warehouse_line'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }
    }

    public function bill_of_lading()
    {
        return $this->belongsTo('Sass\BillOfLading','bill_of_lading_id');
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
