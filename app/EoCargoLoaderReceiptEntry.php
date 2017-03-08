<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class EoCargoLoaderReceiptEntry extends Model
{
    protected $table = 'eo_cargo_loader_receipt_entries';

    protected $fillable = [
         'line','receipt_entry_id', 'cargo_loader_id', 'container_line', 'group_by'];
    public $timestamps = false;
    public static function saveDetail($id, $data)
    {
        $i = 0;
        $a = 0;
        DB::table('eo_cargo_loader_receipt_entries')->where('cargo_loader_id', $id)->delete();
        DB::table('whr_receipts_entries')->where('cargo_loader_id', $id)->update(['cargo_loader_id' => 0, 'status' => 'O']);
        if (isset($data['hidden_warehouse_line'])) {

            while ($a < count($data['hidden_warehouse_line'])) {

                if (isset($data['hidden_warehouse_line'][$i])) {
                    $obj = new EoCargoLoaderReceiptEntry();
                    $obj->line = $a + 1;
                    $obj->cargo_loader_id = $id;
                    $obj->container_line = $data['hidden_container_id'][$i];
                    $obj->receipt_entry_id = $data['hidden_warehouse_line'][$i];
                    $obj->group_by = $data['hidden_flag'][$i];
                    ReceiptEntry::where('id', $data['hidden_warehouse_line'][$i])->update(['cargo_loader_id' => $id,'status' =>'P']);
                    $obj->save();
                    $a++;
                }
                $i++;
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

?>