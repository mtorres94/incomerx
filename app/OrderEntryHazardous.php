<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderEntryHazardous extends Model
{
    protected $table = 'whr_orders_entries_hazardous';

    protected $fillable = [
        'order_entry_id', 'line', 'uns_id', 'description', 'notes',
    ];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
       if (isset($data['hazardous_uns_line'])){
           $details= DB::table('whr_orders_entries_hazardous')->where('order_entry_id', '=', $id)->delete();
           while($a < count($data['hazardous_uns_line'])){
               $i++;
               if(isset( $data['hazardous_uns_line'][$i])){
                   $obj = new OrderEntryHazardous();
                   $obj->order_entry_id = $id;
                   $obj->line=  $a + 1;
                   $obj-> uns_id = $data['hazardous_uns_id'][$i];
                   $obj->description = $data['hazardous_uns_desc'][$i];
                   $obj->notes = $data['hazardous_uns_note'][$i];
                   $obj->save();
                   $a++;
               }
           }
       }
    }
    public static function Search($id){
        return self::where('order_entry_id', $id)->get();
    }


    public function hazardous_uns()
    {
        return $this->belongsTo('Sass\UnsCode', 'uns_id');
    }
    public function order_entry()
    {
        return $this->belongsTo('Sass\OrderEntry', 'order_entry_id');
    }
}
