<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EoBookingContainer extends Model
{
    protected $table = "eo_booking_container";

    protected $fillable = [
        'id', 'line', 'created_at', 'updated_at', 'equipment_type_id', 'container_number', 'container_seal_number', 'container_seal_number2', 'total_weight_unit', 'container_commodity', 'pd_status', 'spotting_date', 'pull_date', 'carrier_id', 'ventilation', 'temperature', 'degrees', 'temperature_max', 'temperature_min',
        'pickup_id', 'pickup_type', 'pickup_address', 'pickup_city', 'pickup_state_id', 'pickup_zip_code_id', 'pickup_phone', 'pickup_contact', 'pickup_date', 'pickup_number',
        'delivery_id', 'delivery_type', 'delivery_address', 'delivery_city', 'delivery_state_id', 'delivery_zip_code_id', 'delivery_phone', 'delivery_contact', 'delivery_date', 'delivery_number',
        'drop_id', 'drop_type', 'drop_address', 'drop_city', 'drop_state_id', 'drop_zip_code_id', 'drop_phone', 'drop_contact', 'drop_date', 'drop_number', 'hazardous_contact', 'hazardous_phone', 'inner_code', 'inner_quantity', 'net_weight', 'number_equipment', 'outer_code', 'outer_quantity', 'release_number', 'requested_equipment', 'tare_weight',  'container_comments', 'shipment_id', 'booking_id'
    ];


    public static function saveDetail($id, $data)
    {
        $i = -1;
        $a = 0;
       DB::table('eo_booking_container')->where('booking_id', '=', $id)->delete();
        if (isset($data['container_line']) and $id > 0) {

            while ($a < count($data['container_line'])) {
                $i++;
                if (isset($data['container_line'][$i])) {
                    $obj = new EoBookingContainer();

                    $obj->booking_id = $id;
                    $obj->shipment_id = $data['shipment_id'];
                    $obj->line = $data['container_line'][$i] ;
                    $obj->equipment_type_id = $data['equipment_type_id'][$i];
                    $obj->container_number = $data['container_number'][$i];
                    $obj->container_seal_number = $data['container_seal_number'][$i];
                    $obj->container_seal_number2 = $data['container_seal_number2'][$i];
                    $obj->total_weight_unit = $data['total_weight_unit'][$i];
                    $obj->container_commodity= $data['container_commodity_name'][$i];
                    $obj->pd_status = $data['pd_status'][$i];
                    $obj->pull_date = $data['container_pull_date'][$i];
                    $obj->spotting_date = $data['container_spotting_date'][$i];
                    $obj->carrier_id = $data['container_carrier_id'][$i];
                    $obj->ventilation = $data['container_ventilation'][$i];
                    $obj->temperature = $data['container_temperature'][$i];
                    $obj->degrees = $data['container_degrees'][$i];
                    $obj->temperature_max = $data['container_max'][$i];
                    $obj->temperature_min = $data['container_min'][$i];
                    $obj->pickup_id = $data['container_pickup_id'][$i];
                    $obj->pickup_type = $data['container_pickup_type'][$i];
                    $obj->pickup_address = $data['container_pickup_address'][$i];
                    $obj->pickup_city = $data['container_pickup_city'][$i];
                    $obj->pickup_state_id = $data['container_pickup_state_id'][$i];
                    $obj->pickup_zip_code_id = $data['container_pickup_zip_code_id'][$i];
                    $obj->pickup_phone = $data['container_pickup_phone'][$i];
                    $obj->pickup_contact = $data['container_pickup_contact'][$i];
                    $obj->pickup_number = $data['container_pickup_number'][$i];
                    $obj->delivery_id = $data['container_delivery_id'][$i];
                    $obj->delivery_type = $data['container_delivery_type'][$i];
                    $obj->delivery_address = $data['container_delivery_address'][$i];
                    $obj->delivery_city = $data['container_delivery_city'][$i];
                    $obj->delivery_state_id = $data['container_delivery_state_id'][$i];
                    $obj->delivery_zip_code_id = $data['container_delivery_zip_code_id'][$i];
                    $obj->delivery_phone = $data['container_delivery_phone'][$i];
                    $obj->delivery_contact = $data['container_delivery_contact'][$i];
                    $obj->delivery_date = $data['container_delivery_date'][$i];
                    $obj->delivery_number = $data['container_delivery_number'][$i];
                    $obj->drop_id = $data['container_drop_id'][$i];
                    $obj->drop_type = $data['container_drop_type'][$i];
                    $obj->drop_address = $data['container_drop_address'][$i];
                    $obj->drop_city = $data['container_drop_city'][$i];
                    $obj->drop_state_id = $data['container_drop_state_id'][$i];
                    $obj->drop_zip_code_id = $data['container_drop_zip_code_id'][$i];
                    $obj->drop_phone = $data['container_drop_phone'][$i];
                    $obj->drop_contact = $data['container_drop_contact'][$i];
                    $obj->drop_date = $data['container_drop_date'][$i];
                    $obj->drop_number = $data['container_drop_number'][$i];
                    $obj->hazardous_contact = $data['container_hazardous_contact'][$i];
                    $obj->hazardous_phone = $data['container_hazardous_phone'][$i];
                    $obj->inner_code = $data['container_inner_code'][$i];
                    $obj->inner_quantity = $data['container_inner_quantity'][$i];
                    $obj->net_weight = $data['container_net_weight'][$i];
                    $obj->number_equipment = $data['container_number_equipment'][$i];
                    $obj->outer_code = $data['container_outer_code'][$i];
                    $obj->outer_quantity = $data['container_outer_quantity'][$i];
                    $obj->release_number = $data['container_release_number'][$i];
                    $obj->requested_equipment = $data['container_requested_equipment'][$i];
                    $obj->tare_weight = $data['container_tare_weight'][$i];
                    $obj->container_comments = $data['container_comments'][$i];

                    $obj->save();
                    $a++;
                }

            }
        }

    }

    public static function search($id){
        return self::where('shipment_id', $id)->get();
    }

    public function shipment()
    {
        return $this->belongsTo('Sass\EoShipmentEntry', 'shipment_id');
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
