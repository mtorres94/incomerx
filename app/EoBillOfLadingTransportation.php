<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class EoBillOfLadingTransportation extends Model
{
    protected $table = "eo_bill_of_lading_transportation";

    protected $fillable = [
        'id', 'bill_of_lading_id','created_at', 'updated_at','line','leg', 'mode', 'carrier_id', 'loading_location_id', 'unloading_location_id', 'ETD_date', 'ETA_date', 'leg_status', 'amount', 'billing_id', 'description', 'service_id', 'notify', 'loading_reference', 'unloading_reference', 'origin_from_type', 'origin_from_shipper_id', 'origin_from_address', 'origin_from_city', 'origin_from_state_id', 'origin_from_country_id', 'origin_from_zip_code_id', 'origin_from_contact', 'origin_from_phone', 'origin_from_fax', 'origin_to_consignee_id', 'origin_to_address','origin_to_city', 'origin_to_state_id','origin_to_country_id', 'origin_to_zip_code_id', 'origin_to_contact', 'origin_to_phone', 'origin_to_fax'];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        if (isset($data['transportation_id'])){
            $details= DB::table('eo_bill_of_lading_transportation')->where('bill_of_lading_id', '=', $id)->delete();
            while($a < count($data['transportation_id'])){
                $i++;
                if (isset($data['transportation_id'][$i])){
                    $obj = new EoBillOfLadingTransportation();

                    $obj->bill_of_lading_id = $id;
                    $obj->line=  $a + 1;
                    $obj-> leg = $data['transportation_leg'][$i];
                    $obj-> mode = $data['transportation_mode'][$i];
                    $obj-> carrier_id = $data['transportation_carrier_id'][$i];
                    $obj-> loading_location_id = $data['transportation_loading_location_id'][$i];
                    $obj-> unloading_location_id = $data['transportation_unloading_location_id'][$i];
                    $obj-> ETD_date = $data['transportation_ETD_date'][$i];
                    $obj-> ETA_date = $data['transportation_ETA_date'][$i];
                    $obj-> leg_status = $data['transportation_leg_status'][$i];
                    $obj-> amount = $data['transportation_amount'][$i];
                    $obj-> billing_id = $data['transportation_billing_id'][$i];
                    $obj-> description = $data['transportation_description'][$i];
                    $obj-> service_id = $data['transportation_service_id'][$i];
                    $obj-> notify = $data['transportation_notify'][$i];
                    $obj-> loading_reference = $data['transportation_loading_reference'][$i];
                    $obj-> unloading_reference = $data['transportation_unloading_reference'][$i];
                    $obj-> origin_from_type = $data['origin_from_type'][$i];
                    $obj-> origin_from_shipper_id = $data['origin_from_shipper_id'][$i];
                    $obj-> origin_from_address = $data['origin_from_address'][$i];
                    $obj-> origin_from_city = $data['origin_from_city'][$i];
                    $obj-> origin_from_state_id = $data['origin_from_state_id'][$i];
                    $obj-> origin_from_country_id = $data['origin_from_country_id'][$i];
                    $obj-> origin_from_zip_code_id = $data['origin_from_zip_code_id'][$i];
                    $obj-> origin_from_contact = $data['origin_from_contact'][$i];
                    $obj-> origin_from_phone = $data['origin_from_phone'][$i];
                    $obj-> origin_from_fax = $data['origin_from_fax'][$i];
                    $obj-> origin_to_consignee_id = $data['origin_to_consignee_id'][$i];
                    $obj-> origin_to_address = $data['origin_to_address'][$i];
                    $obj-> origin_to_city = $data['origin_to_city'][$i];
                    $obj-> origin_to_state_id = $data['origin_to_state_id'][$i];
                    $obj-> origin_to_country_id = $data['origin_to_country_id'][$i];
                    $obj-> origin_to_zip_code_id = $data['origin_to_zip_code_id'][$i];
                    $obj-> origin_to_contact = $data['origin_to_contact'][$i];
                    $obj-> origin_to_phone = $data['origin_to_phone'][$i];
                    $obj-> origin_to_fax = $data['origin_to_fax'][$i];
                    $obj->save();
                    $a++;
                }

            }
        }

    }


    public static function Search($id){
        return self::where('bill_of_lading_id', $id)->get();
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
    public function origin_from_shipper()
    {
        return $this->belongsTo('Sass\Customer', 'origin_from_shipper_id');
    }
    public function origin_to_consignee()
    {
        return $this->belongsTo('Sass\Customer', 'origin_to_consignee_id');
    }
    public function bill_of_lading()
    {
        return $this->belongsTo('Sass\EoBillOfLading', 'bill_of_lading_id');
    }
    public function origin_from_state()
    {
        return $this->belongsTo('Sass\State', 'origin_from_state_id');
    }
    public function origin_to_state()
    {
        return $this->belongsTo('Sass\State', 'origin_to_state_id');
    }

    public function origin_from_country()
    {
        return $this->belongsTo('Sass\State', 'origin_from_country_id');
    }
    public function origin_to_country()
    {
        return $this->belongsTo('Sass\State', 'origin_to_country_id');
    }
    public function billing()
    {
        return $this->belongsTo('Sass\BillingCode', 'billing_id');
    }
    public function service()
    {
        return $this->belongsTo('Sass\Service', 'service_id');
    }

    public function origin_from_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'origin_from_zip_code_id');
    }
    public function origin_to_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'origin_to_zip_code_id');
    }

}
