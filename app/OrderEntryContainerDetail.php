<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderEntryContainerDetail extends Model
{
    protected $table = 'whr_orders_entries_container_details';

    protected $fillable = [
        'order_entry_id', 'line', 'container_equipment_type_id', 'container_container', 'container_seal_number', 'container_comments', 'created_at', 'updated_at'
    ];

    public static function saveDetail($id, $data)
    {
        $i=0; $a=0;
        if (isset($data['container_line'])) {
            while($a < count($data['container_line'])){
                $i++;
                if(isset($data['container_line'][$i])){
                    $obj = new OrderEntryContainerDetail();

                    $obj->order_entry_id = $id;
                    $obj->line = $data['container_line'][$i];
                    $obj->container_equipment_type_id = $data['container_equipment_type_id'][$i];
                    $obj->container_container = $data['container_container'][$i];
                    $obj->container_seal_number = $data['container_seal_number'][$i];
                    $obj->container_comments = $data['container_comments'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }
    }

    public static function updateDetail($id, $data)
    {
        if (isset($data['container_line'])) {
            $details= DB::table('whr_orders_entries_container_details')->where('order_entry_id', '=', $id)->delete();
            self::saveDetail($id, $data);
        }
    }

        public static function Search($id)
        {
            return self::where('order_entry_id', $id)->get();
        }

    public function container_equipment_type()
    {
        return $this->belongsTo('Sass\CargoType', 'container_equipment_type_id');
    }
    public function order_entry()
    {
        return $this->belongsTo('Sass\OrderEntry', 'order_entry_id');
    }
}
