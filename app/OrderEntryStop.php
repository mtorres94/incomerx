<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderEntryStop extends Model
{
    protected $table = 'whr_orders_entries_stops';

    protected $fillable = [
        'order_entry_id', 'line', 'stop_type', 'stop_quantity', 'stop_cargo_type_id', 'stop_length', 'stop_width', 'stop_height', 'stop_weight', 'stop_appt', 'stop_date','stop_city', 'stop_state_id','stop_zip_code_id', 'stop_contact','stop_phone', 'stop_ref', 'stop_reference', 'stop_direction', 'stop_instruction','created_at', 'updated_at'
    ];

    public static function saveDetail($id, $data) {
        $i=0; $a =0;
        if (isset($data['stop_id'])){
            $i++;
            while ($a < count($data['stop_id'])){
                if (isset($data['stop_id'][$i] )){
                    $obj = new OrderEntryStop();
                    $obj->order_entry_id = $id;
                    $obj->line=  $data['stop_id'][$i];
                    $obj-> stop_type = $data['stop_type'][$i];
                    $obj->stop_quantity = $data['stop_quantity'][$i];
                    $obj->stop_cargo_type_id = $data['stop_cargo_type_id'][$i];
                    $obj-> stop_length = $data['stop_length'][$i];
                    $obj->stop_width = $data['stop_width'][$i];
                    $obj->stop_height = $data['stop_height'][$i];
                    $obj-> stop_weight = $data['stop_weight'][$i];
                    $obj->stop_appt = $data['stop_appt'][$i];
                    $obj->stop_date = $data['stop_date'][$i];
                    $obj-> stop_city = $data['stop_city'][$i];
                    $obj->stop_state_id = $data['stop_state_id'][$i];
                    $obj->stop_zip_code_id = $data['stop_zip_code_id'][$i];
                    $obj-> stop_contact = $data['stop_contact'][$i];
                    $obj->stop_phone = $data['stop_phone'][$i];
                    $obj->stop_ref = $data['stop_ref'][$i];
                    $obj-> stop_reference = $data['stop_reference'][$i];
                    $obj->stop_direction = $data['stop_direction'][$i];
                    $obj->stop_instruction = $data['stop_instruction'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }

    }

    public static function updateDetail($id, $data) {
        if (isset($data['stop_id'])) {
            $details = DB::table('whr_orders_entries_Stops')->where('order_entry_id', '=', $id)->delete();
            self::saveDetail($id, $data);
        }
    }

    public static function Search($id){
        return self::where('order_entry_id', $id)->get();
    }

    public function stop_cargo_type()
    {
        return $this->belongsTo('Sass\CargoType', 'stop_cargo_type_id');
    }

    public function stop_customer()
    {
        return $this->belongsTo('Sass\Customer', 'stop_customer_id');
    }

    public function stop_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'stop_zip_code_id');
    }

    public function stop_state()
    {
        return $this->belongsTo('Sass\State', 'stop_state_id');
    }
    public function order_entry()
    {
        return $this->belongsTo('Sass\OrderEntry', 'order_entry_id');
    }


}
