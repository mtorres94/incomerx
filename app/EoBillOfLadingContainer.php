<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class EoBillOfLadingContainer extends Model
{
    protected $table = "eo_bill_of_lading_container";

    protected $fillable = [
        'id', 'bill_of_lading_id','created_at', 'updated_at','line','equipment_type_id', 'container_number', 'container_seal_number', 'container_seal_number2','container_commodity', 'pd_status', 'container_spotting_date', 'container_pull_date', 'container_carrier_id', 'container_ventilation', 'container_degrees', 'container_temperature', 'container_max', 'container_min', 'container_pickup_id', 'container_pickup_type', 'container_pickup_address', 'container_pickup_city', 'container_pickup_state_id', 'container_pickup_zip_code_id', 'container_pickup_phone', 'container_pickup_contact', 'container_pickup_date', 'container_pickup_number','container_delivery_id', 'container_delivery_type', 'container_delivery_address', 'container_delivery_city', 'container_delivery_state_id', 'container_delivery_zip_code_id', 'container_delivery_phone', 'container_delivery_contact', 'container_delivery_date', 'container_delivery_number', 'container_drop_id', 'container_drop_type', 'container_drop_city', 'container_drop_state_id', 'container_drop_zip_code_id', 'container_drop_phone', 'container_drop_contact', 'container_drop_date', 'container_drop_number', 'container_hazardous_contact', 'container_hazardous_phone', 'container_comments'  ];

    public static function saveDetail($id, $data) {
        $i=0; $a=0;
        DB::table('eo_bill_of_lading_container')->where('bill_of_lading_id', '=', $id)->delete();
        if (isset($data['container_line'])){

            while($a < count($data['container_line'])){

                if (isset($data['container_line'][$i])){
                    $obj = new EoBillOfLadingContainer();

                    $obj->bill_of_lading_id = $id;
                    $obj->line=  $a + 1;
                    $obj-> equipment_type_id = $data['equipment_type_id'][$i];
                    $obj-> container_number = $data['container_number'][$i];
                    $obj-> container_seal_number = $data['container_seal_number'][$i];
                    $obj-> container_seal_number2 = $data['container_seal_number2'][$i];
                    $obj-> container_commodity= $data['container_commodity_name'][$i];
                    $obj-> pd_status = $data['pd_status'][$i];
                    $obj-> container_spotting_date = $data['container_spotting_date'][$i];
                    $obj-> container_pull_date = $data['container_pull_date'][$i];
                    $obj-> container_carrier_id = $data['container_carrier_id'][$i];
                    $obj-> container_ventilation = $data['container_ventilation'][$i];
                    $obj-> container_degrees = $data['container_degrees'][$i];
                    $obj-> container_temperature = $data['container_temperature'][$i];
                    $obj-> container_max = $data['container_max'][$i];
                    $obj-> container_min = $data['container_min'][$i];
                    $obj-> container_pickup_id = $data['container_pickup_id'][$i];
                    $obj-> container_pickup_type = $data['container_pickup_type'][$i];
                    $obj-> container_pickup_address = $data['container_pickup_address'][$i];
                    $obj-> container_pickup_city = $data['container_pickup_city'][$i];
                    $obj-> container_pickup_state_id = $data['container_pickup_state_id'][$i];
                    $obj-> container_pickup_zip_code_id = $data['container_pickup_zip_code_id'][$i];
                    $obj-> container_pickup_phone = $data['container_pickup_phone'][$i];
                    $obj-> container_pickup_contact = $data['container_pickup_contact'][$i];
                    $obj-> container_pickup_date = $data['container_pickup_date'][$i];
                    $obj-> container_pickup_number = $data['container_pickup_number'][$i];
                    $obj-> container_delivery_id = $data['container_delivery_id'][$i];
                    $obj-> container_delivery_type = $data['container_delivery_type'][$i];
                    $obj-> container_delivery_address = $data['container_delivery_address'][$i];
                    $obj-> container_delivery_city = $data['container_delivery_city'][$i];
                    $obj-> container_delivery_state_id = $data['container_delivery_state_id'][$i];
                    $obj-> container_delivery_zip_code_id = $data['container_delivery_zip_code_id'][$i];
                    $obj-> container_delivery_phone = $data['container_delivery_phone'][$i];
                    $obj-> container_delivery_contact = $data['container_delivery_contact'][$i];
                    $obj-> container_delivery_date = $data['container_delivery_date'][$i];
                    $obj-> container_delivery_number = $data['container_delivery_number'][$i];
                    $obj-> container_drop_id = $data['container_drop_id'][$i];
                    $obj-> container_drop_type = $data['container_drop_type'][$i];
                    $obj-> container_drop_city = $data['container_drop_city'][$i];
                    $obj-> container_drop_state_id = $data['container_drop_state_id'][$i];
                    $obj-> container_drop_zip_code_id = $data['container_drop_zip_code_id'][$i];
                    $obj-> container_drop_phone = $data['container_drop_phone'][$i];
                    $obj-> container_drop_contact = $data['container_drop_contact'][$i];
                    $obj-> container_drop_date = $data['container_drop_date'][$i];
                    $obj-> container_drop_number = $data['container_drop_number'][$i];
                    $obj-> container_hazardous_contact = $data['container_hazardous_contact'][$i];
                    $obj-> container_hazardous_phone = $data['container_hazardous_phone'][$i];
                    $obj-> container_comments = $data['container_comments'][$i];
                    $obj->save();
                    $a++;
                }
                $i++;
            }
        }

    }


    public static function Search($id){
        return self::where('bill_of_lading_id', $id)->get();
    }


    public function container_pickup_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'container_pickup_zip_code_id');
    }

    public function container_delivery_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'container_delivery_zip_code_id');
    }
    public function container_drop_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'container_drop_zip_code_id');
    }
    public function equipment_type()
    {
        return $this->belongsTo('Sass\CargoType', 'equipment_type_id');
    }

    public function bill_of_lading()
    {
        return $this->belongsTo('Sass\EoBillOfLading', 'bill_of_lading_id');
    }
    public function container_pickup()
    {
        return $this->belongsTo('Sass\Customer', 'container_pickup_id');
    }
    public function container_delivery()
    {
        return $this->belongsTo('Sass\Customer', 'container_delivery_id');
    }
    public function container_drop()
    {
        return $this->belongsTo('Sass\Customer', 'container_drop_id');
    }
    public function container_pickup_state()
    {
        return $this->belongsTo('Sass\State', 'container_pickup_state_id');
    }
    public function container_delivery_state()
    {
        return $this->belongsTo('Sass\State', 'container_delivery_state_id');
    }
    public function container_drop_state()
    {
        return $this->belongsTo('Sass\State', 'container_drop_state_id');
    }
    public function container_carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'container_carrier_id');
    }


}

