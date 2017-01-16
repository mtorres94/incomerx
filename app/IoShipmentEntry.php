<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class IoShipmentEntry extends Model
{
    protected $table = "io_shipment_entries";

    protected $fillable = [
        'id', 'user_create_id', 'user_update_id', 'created_at', 'updated_at', 'code', 'shipment_type', 'date_today', 'division_id',  'shipment_status', 'customs_number', 'country_origin_id','agent_id', 'bl_reference','carrier_id', 'vessel_name', 'voyage_name', 'departure_date', 'arrival_date','custom_reg','bl_type','bl_number',
        'port_loading_id', 'place_delivery_id', 'port_unloading_id','place_receipt_id',
        'shipper_id', 'shipper_address', 'shipper_city', 'shipper_state_id', 'shipper_zip_code_id', 'shipper_phone', 'shipper_fax',
        'consignee_id', 'consignee_address', 'consignee_city', 'consignee_state_id', 'consignee_zip_code_id', 'consignee_phone', 'consignee_fax',
        'total_quantity', 'total_house', 'total_cubic', 'total_weight_unit', 'total_weight',
        'broker_id', 'broker_phone', 'broker_contact', 'broker_fax',
        'entry_number', 'it_number', 'entry_date','it_date', 'it_port', 'go_number', 'go_available', 'go_date', 'go_expired_date',
        'location_id', 'location_address', 'location_city', 'location_state_id', 'location_zip_code_id', 'location_phone', 'location_fax','user_open_id'
    ];


    public function division()
    {
        return $this->belongsTo('Sass\Division', 'division_id');
    }
    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }
    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }
    public function port_loading()
    {
        return $this->belongsTo('Sass\OceanPort', 'port_loading_id');
    }
    public function country_origin()
    {
        return $this->belongsTo('Sass\Country', 'country_origin_id');
    }
    public function port_unloading()
    {
        return $this->belongsTo('Sass\OceanPort', 'port_unloading_id');
    }
    public function place_delivery()
    {
        return $this->belongsTo('Sass\WorldLocation', 'place_delivery_id');
    }
    public function place_receipt()
    {
        return $this->belongsTo('Sass\WorldLocation', 'place_receipt_id');
    }
    public function shipper()
    {
        return $this->belongsTo('Sass\Customer', 'shipper_id');
    }

    public function consignee()
    {
        return $this->belongsTo('Sass\Customer', 'consignee_id');
    }

    public function location()
    {
        return $this->belongsTo('Sass\Customer', 'location_id');
    }
    public function broker()
    {
        return $this->belongsTo('Sass\Customer', 'broker_id');
    }
    public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }
    public function shipper_state()
    {
        return $this->belongsTo('Sass\State', 'shipper_state_id');
    }
    public function consignee_state()
    {
        return $this->belongsTo('Sass\State', 'consignee_state_id');
    }

    public function location_state()
    {
        return $this->belongsTo('Sass\State', 'location_state_id');
    }
    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'carrier_id');
    }
    public function shipper_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'shipper_zip_code_id');
    }
    public function consignee_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'consignee_zip_code_id');
    }
    public function location_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'location_zip_code_id');
    }
    public function container_details()
    {
        return $this->hasMany('Sass\IoShipmentEntryContainer', 'shipment_entry_id');
    }

}
