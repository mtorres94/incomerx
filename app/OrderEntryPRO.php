<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderEntryPRO extends Model
{
    protected $table = 'whr_orders_entries_PROs';

    protected $fillable = [
        'order_entry_id', 'line', 'pro_number', 'pro_detail', 'pro_comment',
    ];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        $details= DB::table('whr_orders_entries_PROs')->where('order_entry_id', '=', $id)->delete();
        if (isset($data['PRO_line'])){

            while($a < count($data['PRO_line'])){
                $i++;
                if (isset($data['PRO_line'][$i])){
                    $obj = new OrderEntryPRO();

                    $obj->order_entry_id = $id;
                    $obj->line=  $a + 1;
                    $obj-> pro_number = $data['PRO_number'][$i];
                    $obj->pro_detail = $data['PRO_reference'][$i];
                    $obj->pro_comment = $data['PRO_remarks'][$i];
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
