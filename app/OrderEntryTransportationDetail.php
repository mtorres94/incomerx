<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderEntryTransportationDetail extends Model
{
    protected $table = 'whr_orders_entries_transportation_details';

    protected $fillable = [
        'order_entry_id', 'line','leg', 'mode', 'billing_id', 'description', 'amount','leg_status', 'service_id', 'carrier_id', 'notify', 'loading_location_id', 'loading_reference', 'ETD_date', 'unloading_location_id','unloading_reference', 'ETA_date',
        'origin_from_type', 'origin_from_shipper_id', 'origin_from_address', 'origin_from_city', 'origin_from_state_id', 'origin_from_country_id','origin_from_zip_code_id', 'origin_from_phone', 'origin_from_fax', 'origin_to_type', 'origin_to_consignee_id', 'origin_to_address', 'origin_to_city', 'origin_to_state_id', 'origin_to_country_id', 'origin_to_zip_code_id', 'origin_to_contact', 'origin_to_phone', 'origin_to_fax', 'origin_from_contact','created_at', 'updated_at'
    ];

    public static function saveDetail($id, $data) {
        $i=0; $a=0;
        if (isset($data['transportation_id'])){
            $i++;
            while($a < count($data['transportation_id'])){
                if( isset($data['transportation_id'][$i])){
                    $obj = new OrderEntryTransportationDetail();
                    $obj->order_entry_id = $id;
                    $obj->line=  $data['transportation_id'][$i];
                    $obj->leg = $data['transportation_leg'][$i];
                    $obj->mode = $data['transportation_mode'][$i];
                    $obj->billing_id = $data['transportation_billing_id'][$i];
                    $obj->description =  $data['transportation_description'][$i];
                    $obj->amount = $data['transportation_amount'][$i];
                    $obj->leg_status = $data['transportation_leg_status'][$i];
                    $obj->service_id = $data['transportation_service_id'][$i];
                    $obj->carrier_id = $data['transportation_carrier_id'][$i];
                    $obj->notify = $data['transportation_notify'][$i];
                    $obj->loading_location_id = $data['transportation_loading_location_id'][$i];
                    $obj->loading_reference = $data['transportation_loading_reference'][$i];
                    $obj->ETD_date = $data['transportation_ETD_date'][$i];
                    $obj->unloading_location_id = $data['transportation_unloading_location_id'][$i];
                    $obj->unloading_reference = $data['transportation_unloading_reference'][$i];
                    $obj->ETA_date = $data['transportation_ETA_date'][$i];

                    $obj->origin_from_type = $data['origin_from_type'][$i];
                    $obj->origin_from_shipper_id=  $data['origin_from_shipper_id'][$i];
                    $obj->origin_from_address = $data['origin_from_address'][$i];
                    $obj->origin_from_city = $data['origin_from_city'][$i];
                    $obj->origin_from_state_id = $data['origin_from_state_id'][$i];
                    $obj->origin_from_country_id =  $data['origin_from_country_id'][$i];
                    $obj->origin_from_zip_code_id = $data['origin_from_zip_code_id'][$i];
                    $obj->origin_from_phone = $data['origin_from_phone'][$i];
                    $obj->origin_from_fax = $data['origin_from_fax'][$i];
                    $obj->origin_from_contact = $data['origin_from_contact'][$i];

                    $obj->origin_to_type = $data['origin_to_type'][$i];
                    $obj->origin_to_consignee_id=  $data['origin_to_consignee_id'][$i];
                    $obj->origin_to_address = $data['origin_to_address'][$i];
                    $obj->origin_to_city = $data['origin_to_city'][$i];
                    $obj->origin_to_state_id = $data['origin_to_state_id'][$i];
                    $obj->origin_to_country_id =  $data['origin_to_country_id'][$i];
                    $obj->origin_to_zip_code_id = $data['origin_to_zip_code_id'][$i];
                    $obj->origin_to_contact = $data['origin_to_contact'][$i];
                    $obj->origin_to_phone = $data['origin_to_phone'][$i];
                    $obj->origin_to_fax = $data['origin_to_fax'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }
    }

    public static function updateDetail($id, $data) {
        if (isset($data['transportation_id'])){
            $details= DB::table('whr_orders_entries_transportation_details')->where('order_entry_id', '=', $id)->delete();
            self::saveDetail($id, $data);
        }

    }


    public static function Search($id){
        return self::where('order_entry_id', $id)->get();
    }

    public function transportation_service()
    {
        return $this->belongsTo('Sass\Service', 'service_id');
    }

    public function transportation_carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'carrier_id');
    }
    public function transportation_loading_location()
    {
        return $this->belongsTo('Sass\WorldLocation', 'loading_location_id');
    }

    public function transportation_unloading_location()
    {
        return $this->belongsTo('Sass\WorldLocation', 'unloading_location_id');
    }

    public function transportation_billing()
    {
        return $this->belongsTo('Sass\BillingCode', 'billing_id');
    }
    public function origin_from_shipper()
    {
        return $this->belongsTo('Sass\Customer', 'origin_from_shipper_id');
    }

    public function origin_to_consignee()
    {
        return $this->belongsTo('Sass\Customer', 'origin_to_consignee_id');
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
        return $this->belongsTo('Sass\Country', 'origin_from_country_id');
    }

    public function origin_to_country()
    {
        return $this->belongsTo('Sass\Country', 'origin_to_country_id');
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
