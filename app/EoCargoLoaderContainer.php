<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class EoCargoLoaderContainer extends Model
{
    protected $table = "eo_cargo_loader_container";

    protected $fillable = ['id', 'cargo_loader_id','created_at', 'updated_at','line','equipment_type_id', 'container_number', 'container_seal_number', 'container_seal_number_2','container_order_number','container_hazardous_contact', 'container_hazardous_phone', 'container_comments', 'container_degrees', 'container_temperature', 'container_max', 'container_min', 'cubic_max', 'cubic_load', 'cubic_load_p','cubic_excess', 'pieces_loaded', 'total_weight_unit', 'max_weight', 'container_net_weight', 'weight_load_p', 'weight_excess',
        'spotting_date','pull_date','pd_status','carrier_id','ventilation','inner_code','inner_quantity','equipment_number','pickup_id', 'pickup_type', 'pickup_address', 'pickup_city', 'pickup_state_id', 'pickup_zip_code_id', 'pickup_phone', 'pickup_contact', 'pickup_date', 'pickup_number', 'delivery_id', 'delivery_type', 'delivery_address', 'delivery_city', 'delivery_state_id', 'delivery_zip_code_id', 'delivery_phone', 'delivery_contact', 'delivery_date', 'drop_id',
'drop_type', 'drop_address', 'drop_city', 'drop_zip_code_id', 'drop_phone', 'drop_contact', 'drop_date', 'drop_number', 'outer_code', 'outer_quantity', 'release_number', 'requested_number', 'drop_state_id','container_commodity', 'tare_weight'
    ];


    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        DB::table('eo_cargo_loader_container')->where('cargo_loader_id', '=', $id)->delete();
        if (isset($data['container_line'])){

            while($a < count($data['container_line'])){
                $i++;
                if (isset($data['container_line'][$i])){
                    $obj = new EoCargoLoaderContainer();
                    $obj->cargo_loader_id = $id;
                    $obj->line= $data['container_line'][$i];
                    $obj-> equipment_type_id = $data['equipment_type_id'][$i];
                    $obj-> container_number = $data['container_number'][$i];
                    $obj-> container_seal_number = $data['container_seal_number'][$i];
                    $obj-> container_seal_number_2 = $data['container_seal_number2'][$i];
                    $obj-> container_commodity= $data['container_commodity_name'][$i];
                    $obj-> container_order_number = $data['container_order_number'][$i];
                    $obj-> container_hazardous_contact = $data['container_hazardous_contact'][$i];
                    $obj-> container_hazardous_phone = $data['container_hazardous_phone'][$i];
                    $obj-> container_comments = $data['container_comments'][$i];
                    $obj-> container_degrees = $data['container_degrees'][$i];
                    $obj-> container_temperature= $data['container_temperature'][$i];
                    $obj-> container_max= $data['container_max'][$i];
                    $obj-> container_min = $data['container_min'][$i];
                    $obj-> cubic_max = $data['cubic_max'][$i];
                    $obj-> cubic_load = $data['cubic_load'][$i];
                    $obj-> cubic_load_p = $data['cubic_load_p'][$i];
                    $obj-> cubic_excess = $data['cubic_excess'][$i];
                    $obj-> pieces_loaded = $data['pieces_loaded'][$i];
                    $obj-> total_weight_unit = $data['total_weight_unit'][$i];
                    $obj-> max_weight = $data['max_weight'][$i];
                    $obj-> container_net_weight = $data['weight_load'][$i];
                    $obj-> weight_load_p = $data['weight_load_p'][$i];
                    $obj-> weight_excess = $data['weight_excess'][$i];
                    $obj-> tare_weight= $data['container_tare_weight'][$i];

                    $obj-> spotting_date= $data['container_spotting_date'][$i];
                    $obj-> pull_date= $data['container_pull_date'][$i];
                    $obj-> pd_status= $data['pd_status'][$i];
                    $obj-> carrier_id = $data['container_carrier_id'][$i];
                    $obj-> ventilation = $data['container_ventilation'][$i];
                    $obj-> inner_code= $data['container_inner_code'][$i];
                    $obj-> inner_quantity= $data['container_inner_quantity'][$i];
                    $obj-> equipment_number= $data['container_number_equipment'][$i];
                    $obj-> pickup_id = $data['container_pickup_id'][$i];
                    $obj-> pickup_type = $data['container_pickup_type'][$i];
                    $obj-> pickup_address = $data['container_pickup_address'][$i];
                    $obj-> pickup_city= $data['container_pickup_city'][$i];
                    $obj-> pickup_state_id= $data['container_pickup_state_id'][$i];
                    $obj-> pickup_zip_code_id= $data['container_pickup_zip_code_id'][$i];
                    $obj-> pickup_phone= $data['container_pickup_phone'][$i];
                    $obj-> pickup_contact = $data['container_pickup_contact'][$i];
                    $obj-> pickup_date= $data['container_pickup_date'][$i];
                    $obj-> pickup_number= $data['container_pickup_number'][$i];
                    $obj-> delivery_id= $data['container_delivery_id'][$i];
                    $obj-> delivery_type= $data['container_delivery_type'][$i];
                    $obj-> delivery_address = $data['container_delivery_address'][$i];
                    $obj-> delivery_city = $data['container_delivery_city'][$i];
                    $obj-> delivery_state_id = $data['container_delivery_state_id'][$i];
                    $obj-> delivery_zip_code_id= $data['container_delivery_zip_code_id'][$i];
                    $obj-> delivery_phone= $data['container_delivery_phone'][$i];
                    $obj-> delivery_contact= $data['container_delivery_contact'][$i];
                    $obj-> delivery_date= $data['container_delivery_date'][$i];
                    $obj-> delivery_number= $data['container_delivery_number'][$i];
                    $obj-> drop_id= $data['container_drop_id'][$i];
                    $obj-> drop_type= $data['container_drop_type'][$i];
                    $obj-> drop_address= $data['container_drop_address'][$i];
                    $obj-> drop_city= $data['container_drop_city'][$i];
                    $obj-> drop_zip_code_id= $data['container_drop_zip_code_id'][$i];
                    $obj-> drop_phone= $data['container_drop_phone'][$i];
                    $obj-> drop_contact= $data['container_drop_contact'][$i];
                    $obj-> drop_date= $data['container_drop_date'][$i];
                    $obj-> drop_number= $data['container_drop_number'][$i];
                    $obj-> outer_code= $data['container_outer_code'][$i];
                    $obj-> outer_quantity= $data['container_outer_quantity'][$i];
                    $obj-> release_number= $data['container_release_number'][$i];
                    $obj-> requested_number= $data['container_requested_equipment'][$i];
                    $obj-> drop_state_id= $data['container_drop_state_id'][$i];
                    $obj->save();
                    $a++;
                }

            }
        }


    }

     public function equipment_type()
    {
        return $this->belongsTo('Sass\CargoType', 'equipment_type_id');
    }

    public static function Search($id){
        return self::where('cargo_loader_id', $id)->get();
    }
    public function pickup_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'pickup_zip_code_id');
    }
    public function delivery_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'delivery_zip_code_id');
    }
    public function drop_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'drop_zip_code_id');
    }

    public function pickup()
    {
        $mode = $this->attributes['pickup_type'];
        switch ($mode) {
            case "01":
                return $this->belongsTo('Sass\Carrier', 'pickup_id');
            case "02":
                return $this->belongsTo('Sass\Customer', 'pickup_id');
        }
    }
    public function delivery()
    {
        $mode = $this->attributes['delivery_type'];
        switch ($mode) {
            case "01":
                return $this->belongsTo('Sass\Carrier', 'delivery_id');
            case "02":
                return $this->belongsTo('Sass\Customer', 'delivery_id');
        }
    }
    public function drop()
    {
        $mode = $this->attributes['drop_type'];
        switch ($mode) {
            case "01":
                return $this->belongsTo('Sass\Carrier', 'drop_id');
            case "02":
                return $this->belongsTo('Sass\Customer', 'drop_id');
        }
    }
    public function pickup_state()
    {
        return $this->belongsTo('Sass\State', 'pickup_state_id');
    }
    public function delivery_state()
    {
        return $this->belongsTo('Sass\State', 'delivery_state_id');
    }
    public function drop_state()
    {
        return $this->belongsTo('Sass\State', 'drop_state_id');
    }
    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'carrier_id');
    }

}
