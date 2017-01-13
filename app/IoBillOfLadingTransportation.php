<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class IoBillOfLadingTransportation extends Model
{
    protected $table = "io_bill_of_lading_transportation";

    protected $fillable = [
        'id' , 'created_at', 'updated_at', 'leg' , 'mode' , 'carrier_id' , 'loading_location_id' , 'unloading_location_id' , 'ETD_date' , 'ETA_date', 'leg_status', 'amount' , 'billing_id', 'description', 'service_id', 'notify' , 'loading_reference' , 'unloading_reference', 'from_type' , 'from_shipper_id' , 'from_address' , 'from_city' , 'from_state_id' , 'from_country_id' , 'from_zip_code_id', 'from_contact', 'from_phone', 'from_fax' , 'to_type' , 'to_consignee_id', 'to_address' , 'to_city', 'to_state_id', 'to_country_id' , 'to_zip_code_id' , 'to_contact' , 'to_phone' , 'to_fax' , 'bill_of_lading_id', 'line'];

    public static function saveDetail($id, $data)
    {
        $i = -1;
        $a = 0;
        if (isset($data['transportation_id'])) {
            $details = DB::table('io_bill_of_lading_transportation')->where('bill_of_lading_id', '=', $id)->delete();
            while ($a < count($data['transportation_id'])) {
                $i++;
                if (isset($data['transportation_id'][$i])) {
                    $obj = new IoBillOfLadingTransportation();

                    $obj->bill_of_lading_id = $id;
                    $obj->line = $a + 1;
                    $obj->leg = $data['transportation_leg'][$i];
                    $obj->mode = $data['transportation_mode'][$i];
                    $obj->carrier_id = $data['transportation_carrier_id'][$i];
                    $obj->loading_location_id = $data['transportation_loading_location_id'][$i];
                    $obj->unloading_location_id = $data['transportation_unloading_location_id'][$i];
                    $obj->ETD_date= $data['transportation_ETD_date'][$i];
                    $obj->ETA_date = $data['transportation_ETA_date'][$i];
                    $obj->leg_status= $data['transportation_leg_status'][$i];
                    $obj->amount= $data['transportation_amount'][$i];
                    $obj->billing_id= $data['transportation_billing_id'][$i];
                    $obj->description= $data['transportation_description'][$i];
                    $obj->service_id= $data['transportation_service_id'][$i];
                    $obj->notify= $data['transportation_notify'][$i];
                    $obj->loading_reference= $data['transportation_loading_reference'][$i];
                    $obj->unloading_reference= $data['transportation_unloading_reference'][$i];
                    $obj->from_type= $data['origin_from_type'][$i];
                    $obj->from_shipper_id= $data['origin_from_shipper_id'][$i];
                    $obj->from_address= $data['origin_from_address'][$i];
                    $obj->from_city= $data['origin_from_city'][$i];
                    $obj->from_state_id= $data['origin_from_state_id'][$i];
                    $obj->from_country_id = $data['origin_from_country_id'][$i];
                    $obj->from_zip_code_id= $data['origin_from_zip_code_id'][$i];
                    $obj->from_contact= $data['origin_from_contact'][$i];
                    $obj->from_phone = $data['origin_from_phone'][$i];
                    $obj->from_fax= $data['origin_from_fax'][$i];
                    $obj->to_type= $data['origin_to_type'][$i];
                    $obj->to_consignee_id= $data['origin_to_consignee_id'][$i];
                    $obj->to_address= $data['origin_to_address'][$i];
                    $obj->to_city= $data['origin_to_city'][$i];
                    $obj->to_state_id= $data['origin_to_state_id'][$i];
                    $obj->to_country_id= $data['origin_to_country_id'][$i];
                    $obj->to_zip_code_id= $data['origin_to_zip_code_id'][$i];
                    $obj->to_contact= $data['origin_to_contact'][$i];
                    $obj->to_phone= $data['origin_to_phone'][$i];
                    $obj->to_fax= $data['origin_to_fax'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }
    }
    public static function Search($id){
        return self::where('bill_of_lading_id', $id)->get();
    }
    public function billing()
    {
        return $this->belongsTo('Sass\BillingCode', 'billing_id');
    }
    public function container_drop_state()
    {
        return $this->belongsTo('Sass\State', 'container_drop_state_id');
    }
    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'carrier_id');
    }
    public function loading_location()
    {
        return $this->belongsTo('Sass\WorldLocation', 'loading_location_id');
    }
    public function unloading_location()
    {
        return $this->belongsTo('Sass\WorldLocation', 'unloading_location_id');
    }
    public function service()
    {
        return $this->belongsTo('Sass\Service', 'service_id');
    }

    public function from_state()
    {
        return $this->belongsTo('Sass\State', 'from_state_id');
    }
    public function to_state()
    {
        return $this->belongsTo('Sass\State', 'to_state_id');
    }

    public function from_country()
    {
        return $this->belongsTo('Sass\Country', 'from_country_id');
    }
    public function to_country()
    {
        return $this->belongsTo('Sass\Country', 'to_country_id');
    }
    public function from_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'from_zip_code_id');
    }
    public function to_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'to_zip_code_id');
    }
    public function from_shipper()
    {
        $mode = $this->attributes['from_type'];
        switch ($mode) {
            case "01":
                return $this->belongsTo('Sass\Carrier', 'from_shipper_id');
            case "02":
                return $this->belongsTo('Sass\Customer', 'from_shipper_id');
        }
    }
    public function to_shipper()
    {
        $mode = $this->attributes['to_type'];
        switch ($mode) {
            case "01":
                return $this->belongsTo('Sass\Carrier', 'to_consignee_id');
            case "02":
                return $this->belongsTo('Sass\Customer', 'to_consignee_id');
        }
    }
}
