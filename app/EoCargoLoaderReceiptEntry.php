<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class EoCargoLoaderReceiptEntry extends Model
{
    protected $table = 'exp_oceans_cargo_loader_receipt_entries';

    protected $fillable = [
         'line','receipt_entry_id', 'cargo_loader_id', 'container_line', 'created_at', 'updated_at'];

    public static function saveDetail($id, $data)
    {
        $i = -1;
        $a = 0;
        if (isset($data['hidden_warehouse_line'])) {
            $details = DB::table('exp_oceans_cargo_loader_receipt_entries')->where('cargo_loader_id', '=', $id)->delete();
            while ($a < count($data['hidden_warehouse_line'])) {
                $i++;
                if (isset($data['hidden_warehouse_line'][$i])) {
                    $obj = new EoCargoLoaderReceiptEntry();
                    $obj->line = $a + 1;
                    $obj->cargo_loader_id = $id;
                    $obj->container_line = $data['hidden_container_id'][$i];
                    $obj->receipt_entry_id = $data['hidden_warehouse_line'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }
    }

    public function receipt_entry()
    {
        return $this->belongsTo('Sass\ReceiptEntry','receipt_entry_id');
    }

    public function receipt_entry_details()
    {
        return $this->hasMany('Sass\ReceiptEntryCargoDetail', 'receipt_entry_id', 'receipt_entry_id');
    }


}

?>                                                                                                                          