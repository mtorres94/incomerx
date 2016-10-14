<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderEntryCargoItemDetail extends Model
{
    protected $table = 'whr_orders_entries_cargo_items_details';

    protected $fillable = [
        'order_entry_id', 'cargo_id','line', 'item_pieces', 'item_detail_id', 'item_unit_weight', 'item_brand', 'vendor_id', 'item_origin', 'item_exp_date', 'created_at', 'updated_at'
    ];

    public static function saveDetail($id,  $data) {
        $i=-1; $a=0;
        if (isset($data['cargo_whr_id'])){
            $details= DB::table('whr_orders_entries_cargo_items_details')->where('order_entry_id', '=', $id)->delete();
            while($a < count($data['cargo_whr_id'])){
                $i++;
                if (isset($data['item_whr_line'][$i])){
                    $obj = new OrderEntryCargoItemDetail();
                    $obj->order_entry_id = $id;
                    $obj->line =  $a + 1;
                    $obj->cargo_id =  $data['cargo_whr_id'][$i];
                    $obj-> item_pieces = $data['item_whr_pieces'][$i];
                    $obj-> item_detail_id = $data['item_whr_item_id'][$i];
                    $obj->item_unit_weight = $data['item_whr_unit_weight'][$i];
                    $obj->item_brand = $data['item_whr_brand'][$i];
                    $obj->vendor_id = $data['item_whr_vendor_code'][$i];
                    $obj->item_origin=  $data['item_whr_origin'][$i];
                    $obj-> item_exp_date = $data['item_whr_exp_date'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }
    }


    public static function Search($id){
        return self::where('order_entry_id', $id)->get();
    }
    public function item_detail()
    {
        return $this->belongsTo('Sass\Item', 'item_detail_id');
    }
    public function vendors()
    {
        return $this->belongsTo('Sass\Vendor', 'vendor_id');
    }




}
