<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class EoBillOfLadingItem extends Model
{
    protected $table = "eo_bill_of_lading_items";

    protected $fillable = [
        'id', 'bill_of_lading_id','created_at', 'updated_at','line','item_id', 'customer_id', 'item_quantity', 'item_type_code', 'item_weight', 'item_unit' ];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        if (isset($data['item_line'])){
            $details= DB::table('eo_bill_of_lading_items')->where('bill_of_lading_id', '=', $id)->delete();
            while($a < count($data['item_line'])){
                $i++;
                if (isset($data['item_line'][$i])){
                    $obj = new EoBillOfLadingItem();
                    $obj->bill_of_lading_id = $id;
                    $obj->line=  $a + 1;
                    $obj-> item_id = $data['item_id'][$i];
                    $obj-> customer_id = $data['customer_id'][$i];
                    $obj-> item_quantity = $data['item_quantity'][$i];
                    $obj-> item_type_code = $data['item_type_code'][$i];
                    $obj-> item_weight = $data['item_weight'][$i];
                    $obj-> item_unit = $data['item_unit'][$i];
                    $obj->save();
                    $a++;
                }

            }
        }

    }


    public static function Search($id){
        return self::where('bill_of_lading_id', $id)->get();
    }

    public function items()
    {
        return $this->belongsTo('Sass\Item', 'item_id');
    }
    public function item_type()
    {
        return $this->belongsTo('Sass\CargoType', 'item_type_code');
    }
    public function customers()
    {
        return $this->belongsTo('Sass\Customer', 'customer_id');
    }
    public function bill_of_lading()
    {
        return $this->belongsTo('Sass\EoBillOfLading', 'bill_of_lading_id');
    }
}
