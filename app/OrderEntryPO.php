<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderEntryPO extends Model
{
    protected $table = 'whr_orders_entries_POs';

    protected $fillable = [
        'order_entry_id', 'line', 'po_number', 'ref_number', 'notes',
    ];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        $details= DB::table('whr_orders_entries_POs')->where('order_entry_id', '=', $id)->delete();
        if (isset($data['references_line']) ){

            while($a < count($data['references_line'])){
                $i++;
                if (isset($data['references_line'][$i])){
                    $obj = new OrderEntryPO();
                    $obj->order_entry_id = $id;
                    $obj->line=  $a + 1 ;
                    $obj-> po_number = $data['references_po_number'][$i];
                    $obj->ref_number = $data['references_ref_number'][$i];
                    $obj->notes = $data['references_note'][$i];
                    $obj->save();
                    $a++;
                }
            }
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
