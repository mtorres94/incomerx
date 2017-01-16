<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class IoShipmentEntryContainer extends Model
{
    protected $table = "io_shipment_entries_container";

    protected $fillable = [
        'id',  'created_at', 'updated_at', 'equipment_type_id', 'line', 'container_number', 'container_seal_number','container_seal_number2' , 'container_commodity_id', 'container_spotting_date', 'container_pull_date', 'container_carrier_id', 'container_ventilation', 'container_degrees', 'container_temperature', 'container_max', 'container_min','container_status',
        'container_pickup_id', 'container_pickup_type', 'container_pickup_address', 'container_pickup_city', 'container_pickup_state_id', 'container_pickup_zip_code_id', 'container_pickup_phone', 'container_pickup_contact', 'container_pickup_date', 'container_pickup_number',
        'container_delivery_id', 'container_delivery_type','container_delivery_address', 'container_delivery_city', 'container_delivery_state_id', 'container_delivery_zip_code_id', 'container_delivery_phone', 'container_delivery_contact', 'container_delivery_date', 'container_delivery_drop_off',
        'container_drop_id', 'container_drop_type','container_drop_address', 'container_drop_city', 'container_drop_state_id', 'container_drop_zip_code_id', 'container_drop_phone', 'container_drop_contact', 'container_drop_date', 'container_comments','shipment_entry_id'
    ];

    public function equipment_type()
    {
        return $this->belongsTo('Sass\CargoType', 'equipment_type_id');
    }
    public function container_commodity()
    {
        return $this->belongsTo('Sass\Commodity', 'container_commodity_id');
    }
    public function container_carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'container_carrier_id');
    }

    public function container_pickup()
    {
        $mode = $this->attributes['container_pickup_type'];
        switch ($mode) {
            case "01":
                return $this->belongsTo('Sass\Carrier', 'container_pickup_id');
            case "02":
                return $this->belongsTo('Sass\Customer', 'container_pickup_id');
        }
    }
    public function container_delivery()
    {
        $mode = $this->attributes['container_delivery_type'];
        switch ($mode) {
            case "01":
                return $this->belongsTo('Sass\Carrier', 'container_delivery_id');
            case "02":
                return $this->belongsTo('Sass\Customer', 'container_delivery_id');
        }
    }
    public function container_drop()
    {
        $mode = $this->attributes['container_drop_type'];
        switch ($mode) {
            case "01":
                return $this->belongsTo('Sass\Carrier', 'container_drop_id');
            case "02":
                return $this->belongsTo('Sass\Customer', 'container_drop_id');
        }
    }
    public function container_pickup_state()
    {
        return $this->belongsTo('Sass\Customer', 'container_pickup_state_id');
    }
    public function container_delivery_state()
    {
        return $this->belongsTo('Sass\Customer', 'container_delivery_state_id');
    }
    public function container_drop_state()
    {
        return $this->belongsTo('Sass\Customer', 'container_drop_state_id');
    }
    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        if (isset($data['container_line']) ){
            $details= DB::table('io_shipment_entries_container')->where('shipment_entry_id', '=', $id)->delete();
            while($a < count($data['container_line'])){
                $i++;
                if (isset($data['container_line'][$i])){
                    $obj = new IoShipmentEntryContainer();
                    $obj->shipment_entry_id = $id;
                    $obj->line=  $a + 1;
                    $obj->equipment_type_id=  $data['equipment_type_id'][$i];
                    $obj->container_number =  $data['container_number'][$i];
                    $obj->container_seal_number=  $data['container_seal_number'][$i];
                    $obj->container_seal_number2=  $data['container_seal_number_2'][$i];
                    $obj->container_commodity_id =  $data['container_commodity_id'][$i];
                    $obj->container_status=  $data['container_status'][$i];
                    $obj->container_spotting_date =  $data['container_spotting_date'][$i];
                    $obj->container_pull_date =  $data['container_pull_date'][$i];
                    $obj->container_carrier_id =  $data['container_carrier_id'][$i];
                    $obj->container_ventilation =  $data['container_ventilation'][$i];
                    $obj->container_degrees =  $data['container_degrees'][$i];
                    $obj->container_temperature =  $data['container_temperature'][$i];
                    $obj->container_max =  $data['container_max'][$i];
                    $obj->container_min =  $data['container_min'][$i];

                    $obj->container_pickup_id =  $data['container_pickup_id'][$i];
                    $obj->container_pickup_type =  $data['container_pickup_type'][$i];
                    $obj->container_pickup_address =  $data['container_pickup_address'][$i];
                    $obj->container_pickup_city =  $data['container_pickup_city'][$i];
                    $obj->container_pickup_state_id =  $data['container_pickup_state_id'][$i];
                    $obj->container_pickup_zip_code_id =  $data['container_pickup_zip_code_id'][$i];
                    $obj->container_pickup_phone =  $data['container_pickup_phone'][$i];
                    $obj->container_pickup_contact =  $data['container_pickup_contact'][$i];
                    $obj->container_pickup_date =  $data['container_pickup_date'][$i];
                    $obj->container_pickup_number =  $data['container_pickup_number'][$i];

                    $obj->container_delivery_id =  $data['container_delivery_id'][$i];
                    $obj->container_delivery_type =  $data['container_delivery_type'][$i];
                    $obj->container_delivery_address =  $data['container_delivery_address'][$i];
                    $obj->container_delivery_city =  $data['container_delivery_city'][$i];
                    $obj->container_delivery_state_id =  $data['container_delivery_state_id'][$i];
                    $obj->container_delivery_zip_code_id =  $data['container_delivery_zip_code_id'][$i];
                    $obj->container_delivery_phone =  $data['container_delivery_phone'][$i];
                    $obj->container_delivery_contact =  $data['container_delivery_contact'][$i];
                    $obj->container_delivery_date =  $data['container_delivery_date'][$i];
                    $obj->container_delivery_drop_off=  $data['container_delivery_drop_off'][$i];

                    $obj->container_drop_id =  $data['container_drop_id'][$i];
                    $obj->container_drop_type =  $data['container_drop_type'][$i];
                    $obj->container_drop_address =  $data['container_drop_address'][$i];
                    $obj->container_drop_city =  $data['container_drop_city'][$i];
                    $obj->container_drop_state_id =  $data['container_drop_state_id'][$i];
                    $obj->container_drop_zip_code_id =  $data['container_drop_zip_code_id'][$i];
                    $obj->container_drop_phone =  $data['container_drop_phone'][$i];
                    $obj->container_drop_contact =  $data['container_drop_contact'][$i];
                    $obj->container_drop_date =  $data['container_drop_date'][$i];
                    $obj->container_comments=  $data['container_comments'][$i];

                    $obj->save();
                    $a++;
                }
            }
        }

    }
    public static function search($id){
        return self::where('shipment_entry_id', $id)->get();
    }
    public function shipment_entry()
    {
        return $this->belongsTo('Sass\IoShipmentEntry', 'shipment_entry_id');
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
        return $this->belongsTo('Sass\ZipCode', 'container_drop_state_id');
    }

}
