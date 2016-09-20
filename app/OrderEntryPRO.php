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
        $i=0; $a=0;
        if (isset($data['PRO_line'])){
            while($a < count($data['PRO_line'])){
                $i++;
                if (isset($data['PRO_line'][$i])){
                    $obj = new OrderEntryPRO();

                    $obj->order_entry_id = $id;
                    $obj->line=  $data['PRO_line'][$i];
                    $obj-> pro_number = $data['PRO_number'][$i];
                    $obj->pro_detail = $data['PRO_reference'][$i];
                    $obj->pro_comment = $data['PRO_remarks'][$i];
                    $obj->save();
                    $a++;
                }

            }
        }

    }

    public static function updateDetail($id, $data) {
        if (isset($data['PRO_line'])){
            $details= DB::table('whr_orders_entries_PROs')->where('order_entry_id', '=', $id)->delete();
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
