<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingEntryContainer extends Model
{
    protected $table = "exp_booking_entries_container";

    protected $fillable = [
        'id',  'created_at', 'updated_at', 'equipment_type_id', 'container_number', 'container_seal_number', 'total_weight_unit_measurement', 'shipper_owned', 'container_commodity_id', 'container_spotting_date', 'container_pull_date', 'container_carrier_id', 'container_ventilation', 'container_degrees', 'container_temperature', 'container_max', 'container_min',
        'container_pickup_id', 'container_pickup_type', 'container_pickup_address', 'container_pickup_city', 'container_pickup_state_id', 'container_pickup_zip_code_id', 'container_pickup_phone', 'container_pickup_contact', 'container_pickup_date', 'container_pickup_number',
        'container_delivery_id', 'container_delivery_type','container_delivery_address', 'container_delivery_city', 'container_delivery_state_id', 'container_delivery_zip_code_id', 'container_delivery_phone', 'container_delivery_contact', 'container_delivery_date', 'container_delivery_number',
        'container_drop_id', 'container_drop_type','container_drop_address', 'container_drop_city', 'container_drop_state_id', 'container_drop_zip_code_id', 'container_drop_phone', 'container_drop_contact', 'container_drop_date', 'container_drop_number',
        'container_hazardous_phone', 'container_hazardous_contact',
        'container_inner_code', 'container_inner_quantity', 'container_net_weight', 'container_number_equipment', 'container_outer_code', 'container_outer_quantity', 'container_release_number', 'container_requested_equipment', 'container_tare_weight', 'dock_receipt', 'shipper_export', 'attachments', 'release', 'bill_of_lading', 'container_other', 'container_comments', 'booking_entry_id', 'line'
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
    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        if (isset($data['container_line']) ){
            $details= DB::table('exp_booking_entries_container')->where('booking_entry_id', '=', $id)->delete();
            while($a < count($data['container_line'])){
                $i++;
                if (isset($data['container_line'][$i])){
                    $obj = new BookingEntryContainer();
                    $obj->booking_entry_id = $id;
                    $obj->line=  $data['container_line'][$i];
                    $obj->equipment_type_id=  $data['equipment_type_id'][$i];
                    $obj->container_number =  $data['container_number'][$i];
                    $obj->container_seal_number=  $data['container_seal_number'][$i];
                    $obj->total_weight_unit =  $data['total_weight_unit'][$i];
                    $obj->shipper_owned=  $data['shipper_owned'][$i];
                    $obj->container_commodity_id =  $data['container_commodity_id'][$i];
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
                    $obj->container_delivery_number =  $data['container_delivery_number'][$i];

                    $obj->container_drop_id =  $data['container_drop_id'][$i];
                    $obj->container_drop_type =  $data['container_drop_type'][$i];
                    $obj->container_drop_address =  $data['container_drop_address'][$i];
                    $obj->container_drop_city =  $data['container_drop_city'][$i];
                    $obj->container_drop_state_id =  $data['container_drop_state_id'][$i];
                    $obj->container_drop_zip_code_id =  $data['container_drop_zip_code_id'][$i];
                    $obj->container_drop_phone =  $data['container_drop_phone'][$i];
                    $obj->container_drop_contact =  $data['container_drop_contact'][$i];
                    $obj->container_drop_date =  $data['container_drop_date'][$i];
                    $obj->container_drop_number =  $data['container_drop_number'][$i];

                    $obj->container_hazardous_contact=  $data['container_hazardous_contact'][$i];
                    $obj->container_hazardous_phone=  $data['container_hazardous_phone'][$i];
                    $obj->container_inner_code=  $data['container_inner_code'][$i];
                    $obj->container_inner_quantity=  $data['container_inner_quantity'][$i];
                    $obj->container_net_weight=  $data['container_net_weight'][$i];
                    $obj->container_number_equipment=  $data['container_number_equipment'][$i];
                    $obj->container_outer_code=  $data['container_outer_code'][$i];
                    $obj->container_outer_quantity=  $data['container_outer_quantity'][$i];
                    $obj->container_release_number=  $data['container_release_number'][$i];
                    $obj->container_requested_equipment=  $data['container_requested_equipment'][$i];
                    $obj->container_tare_weight=  $data['container_tare_weight'][$i];
                    $obj->dock_receipt=  $data['dock_receipt'][$i];
                    $obj->shipper_export=  $data['shipper_export'][$i];
                    $obj->attachments=  $data['attachments'][$i];
                    $obj->release=  $data['release'][$i];
                    $obj->bill_of_lading=  $data['bill_of_lading'][$i];
                    $obj->container_other=  $data['container_other'][$i];
                    $obj->container_comments=  $data['container_comments'][$i];

                    $obj->save();
                    $a++;
                }
            }
        }

    }
    public static function search($id){
        return self::where('booking_entry_id', $id)->get();
    }
    public function order_entry()
    {
        return $this->belongsTo('Sass\BookingEntry', 'booking_entry_id');
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
