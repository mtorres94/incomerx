<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderEntryDockReceiptDetail extends Model
{
    protected $table = 'whr_orders_entries_dock_receipts_details';

    protected $fillable = [
        'order_entry_id', 'line', 'dr_marks', 'dr_pieces', 'dr_description', 'dr_container', 'commodity_id', 'dr_weight_metric', 'dr_grossw', 'dr_cubic', 'dr_chgrw', 'dr_rate', 'dr_amount', 'dr_comments', 'created_at', 'updated_at'
    ];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        $details= DB::table('whr_orders_entries_dock_receipts_details')->where('order_entry_id', '=', $id)->delete();
        if (isset($data['dr_line'])){

            while( $a < count($data['dr_line'])){
                $i++;
                if(isset($data['dr_line'][$i])){
                    $obj = new OrderEntryDockReceiptDetail();

                    $obj->order_entry_id = $id;
                    $obj->line=  $a + 1;
                    $obj-> dr_marks = $data['dr_cargo_marks'][$i];
                    $obj->dr_pieces = $data['dr_cargo_pieces'][$i];
                    $obj->dr_description = $data['dr_cargo_description'][$i];
                    $obj->dr_container=  $data['dr_cargo_container'][$i];
                    $obj-> commodity_id = $data['dr_cargo_commodity_id'][$i];
                    $obj->dr_weight_metric = $data['dr_cargo_weight_metric'][$i];
                    $obj->dr_grossw = $data['dr_cargo_grossw'][$i];
                    $obj->dr_cubic=  $data['dr_cargo_cubic'][$i];
                    $obj-> dr_chgrw = $data['dr_cargo_chgrw'][$i];
                    $obj->dr_rate = $data['dr_cargo_rate'][$i];
                    $obj->dr_amount = $data['dr_cargo_amount'][$i];
                    $obj->dr_comments = $data['dr_cargo_comments'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }
    }

    public static function Search($id)
    {
        return self::where('order_entry_id', $id)->get();
    }
    public function cargo_commodity()
    {
        return $this->belongsTo('Sass\Commodity', 'commodity_id');
    }
    public function order_entry()
    {
        return $this->belongsTo('Sass\OrderEntry', 'order_entry_id');
    }
}
