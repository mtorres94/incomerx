<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderEntrySO extends Model
{
    protected $table = 'whr_orders_entries_SOs';

    protected $fillable = [
        'order_entry_id', 'line', 'so_number', 'so_detail', 'so_comment',
    ];

    public static function saveDetail($id, $data) {
        $i=0; $a=0;
        if (isset($data['SO_line'])){
            $i++;
            while($a < count($data['SO_line'])){
                if (isset($data['SO_line'][$i])){
                    $obj = new OrderEntrySO();
                    $obj->order_entry_id = $id;
                    $obj->line=  $data['SO_line'][$i];
                    $obj-> so_number = $data['SO_number'][$i];
                    $obj->so_detail = $data['SO_reference'][$i];
                    $obj->so_comment = $data['SO_remarks'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }
    }

    public static function updateDetail($id, $data) {
        if (isset($data['SO_line'])){
            $details= DB::table('whr_orders_entries_SOs')->where('order_entry_id', '=', $id)->delete();
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
