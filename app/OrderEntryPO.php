<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderEntryPO extends Model
{
    protected $table = 'whr_orders_entries_POs';

    protected $fillable = [
        'order_entry_id', 'line', 'po_number', 'project_number', 'po_comment',
    ];

    public static function saveDetail($id, $data) {
        $i=0; $a=0;
        if (isset($data['PO_line']) ){

            while($a < count($data['PO_line'])){
                $i++;
                if (isset($data['PO_line'][$i])){
                    $obj = new OrderEntryPO();
                    $obj->order_entry_id = $id;
                    $obj->line=  $data['PO_line'][$i];
                    $obj-> po_number = $data['PO_number'][$i];
                    $obj->project_number = $data['PO_project_reference'][$i];
                    $obj->po_comment = $data['PO_remarks'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }

    }

    public static function updateDetail($id, $data) {
        if (isset($data['PO_line']) ){
            $details= DB::table('whr_orders_entries_POs')->where('order_entry_id', '=', $id)->delete();
            self::saveDetail($id, $data);
        }
    }

    public static function Search($id){
        return self::where('order_entry_id', $id)->get();
    }
    public function order_entry()
    {
        return $this->belongsTo('Sass\OrderEntry', 'order_entry_id');
    }
}
