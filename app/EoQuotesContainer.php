<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class EoQuotesContainer extends Model
{
    protected $table = "eo_quotes_container";

    protected $fillable = [
        'id' , 'created_at', 'updated_at','line', 'quotes_id', 'equipment_type_id' , 'container_number', 'seal_number', 'seal_number2', 'pieces', 'gross_weight', 'cubic' , 'pd_status', 'carrier_id' , 'ventilation', 'degrees' , 'temperature', 'temperature_max', 'temperature_min' , 'pickup_id' , 'pickup_type', 'pickup_address' , 'pickup_city' , 'pickup_state_id' , 'pickup_zip_code_id','pickup_phone' ,'pickup_date','pickup_number' ,'delivery_id' ,'delivery_address','delivery_type','delivery_city','delivery_state_id' ,'delivery_zip_code_id' ,'delivery_phone' ,'delivery_date','delivery_number' ,'drop_id' ,'drop_type' ,'drop_address','drop_city','drop_state_id' ,'drop_zip_code_id' ,'drop_phone' ,'drop_date','total_weight_unit'];

    public static function saveDetail($id, $data) {
        $i=0; $a=0;
        DB::table('eo_quotes_container')->where('quotes_id', '=', $id)->delete();
        if (isset($data['container_line'])){

            while($a < count($data['container_line'])){
                if (isset($data['container_line'][$i])){
                    $obj = new EoQuotesContainer();

                    $obj->quotes_id= $id;
                    $obj->line=  $a + 1;
                    $obj-> equipment_type_id = $data['equipment_type_id'][$i];
                    $obj-> container_number = $data['container_number'][$i];
                    $obj-> seal_number = $data['container_seal_number'][$i];
                    $obj-> pieces= $data['container_pieces'][$i];
                    $obj-> gross_weight= $data['container_gross_weight'][$i];
                    $obj-> cubic = $data['container_cubic'][$i];
                    $obj-> seal_number2 = $data['container_seal_number2'][$i];
                    $obj-> pd_status = $data['pd_status'][$i];
                    $obj-> carrier_id = $data['container_carrier_id'][$i];
                    $obj-> ventilation = $data['container_ventilation'][$i];
                    $obj-> degrees = $data['container_degrees'][$i];
                    $obj-> temperature = $data['container_temperature'][$i];
                    $obj-> temperature_max = $data['container_max'][$i];
                    $obj-> temperature_min= $data['container_min'][$i];
                    $obj-> pickup_id= $data['container_pickup_id'][$i];
                    $obj-> pickup_type= $data['container_pickup_type'][$i];
                    $obj-> pickup_address= $data['container_pickup_address'][$i];
                    $obj-> pickup_city= $data['container_pickup_city'][$i];
                    $obj-> pickup_state_id= $data['container_pickup_state_id'][$i];
                    $obj-> pickup_zip_code_id= $data['container_pickup_zip_code_id'][$i];
                    $obj-> pickup_phone= $data['container_pickup_phone'][$i];
                    $obj-> pickup_date = $data['container_pickup_date'][$i];
                    $obj-> pickup_number= $data['container_pickup_number'][$i];
                    $obj-> delivery_id = $data['container_delivery_id'][$i];
                    $obj-> delivery_address = $data['container_delivery_address'][$i];
                    $obj-> delivery_type = $data['container_delivery_type'][$i];
                    $obj-> delivery_city= $data['container_delivery_city'][$i];
                    $obj-> delivery_state_id= $data['container_delivery_state_id'][$i];
                    $obj-> delivery_zip_code_id = $data['container_delivery_zip_code_id'][$i];
                    $obj-> delivery_phone = $data['container_delivery_phone'][$i];
                    $obj-> delivery_date= $data['container_delivery_date'][$i];
                    $obj-> delivery_number= $data['container_delivery_number'][$i];
                    $obj-> drop_id= $data['container_drop_id'][$i];
                    $obj-> drop_type= $data['container_drop_type'][$i];
                    $obj-> drop_address= $data['container_drop_address'][$i];
                    $obj-> drop_city= $data['container_drop_city'][$i];
                    $obj-> drop_state_id= $data['container_drop_state_id'][$i];
                    $obj-> drop_zip_code_id= $data['container_drop_zip_code_id'][$i];
                    $obj-> drop_phone = $data['container_drop_phone'][$i];
                    $obj-> drop_date = $data['container_drop_date'][$i];
                    $obj-> total_weight_unit= $data['container_total_weight_unit'][$i];
                    $obj->save();
                    $a++;
                }
                $i++;
            }
        }

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
        return $this->belongsTo('Sass\State', 'pickup_id');
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
    public static function Search($id){
        return self::where('quotes_id', $id)->get();
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
    public function equipment_type()
    {
        return $this->belongsTo('Sass\CargoType', 'equipment_type_id');
    }
}
