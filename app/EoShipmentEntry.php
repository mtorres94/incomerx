<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class EoShipmentEntry extends Model
{
    protected $table = "eo_shipment_entries";

    protected $fillable = [
        'id', 'user_create_id', 'user_update_id', 'created_at', 'updated_at', 'code', 'shipment_type', 'date_today', 'division_id', 'user_id', 'rate_class', 'status', 'booking_code', 'bl_type', 'bl_number', 'place_receipt_id' ,'port_loading_id', 'place_delivery_id', 'port_unloading_id', 'shipper_id', 'shipper_address', 'shipper_city', 'shipper_state_id', 'shipper_zip_code_id', 'shipper_phone',  'consignee_id', 'consignee_address', 'consignee_city', 'consignee_state_id', 'consignee_zip_code_id', 'consignee_phone',  'broker_id', 'broker_phone', 'broker_contact', 'broker_fax', 'booking_agent', 'carrier_id', 'vessel_name', 'voyage_name', 'departure_date', 'arrival_date', 'agent_id', 'agent_contact', 'agent_phone', 'agent_fax', 'agent_commission_p', 'agent_commission_amount', 'confirmed', 'spot_rate', 'agent_amount', 'service_id', 'total_quantity', 'total_unit_weight', 'total_weight', 'total_cubic', 'total_dim_fact', 'total_volume_weight', 'total_cargo_type_id', 'total_commodity_name', 'freight_charges', 'other_charges','notify_id', 'notify_phone', 'notify_address', 'notify_city', 'notify_zip_code_id', 'notify_state_id', 'notify_email', 'notify_country_id', 'notify_contact', 'notify_contact_phone', 'forwarding_agent_id', 'domestic_routing', 'state_of_origin_id', 'shipment_comments', 'user_open_id', 'quote_id', 'booked_date', 'loading_date', 'equipment_cut_off_date', 'documents_cut_off_date', 'reference', 'inland_driver_id', 'inland_carrier_id', 'inland_lic_number', 'hbl_pieces', 'hbl_actual_weight', 'hbl_charge_weight'];

    public function setConfirmedAttribute($value)
    {
        $this->attributes['confirmed'] = ($value == 'on') ? 1 : 0;
    }
    public function getConfirmedAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setSpotRateAttribute($value)
    {
        $this->attributes['spot_rate'] = ($value == 'on') ? 1 : 0;
    }

    public function getSpotRateAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }



    public function total_cargo_type()
    {
        return $this->belongsTo('Sass\CargoType', 'total_cargo_type_id');
    }
    public function division()
    {
        return $this->belongsTo('Sass\Division', 'division_id');
    }
    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }
    public function port_loading()
    {
        return $this->belongsTo('Sass\OceanPort', 'port_loading_id');
    }
    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }
    public function service()
    {
        return $this->belongsTo('Sass\Service', 'service_id');
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
    public function broker()
    {
        return $this->belongsTo('Sass\Customer', 'broker_id');
    }
       public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }
    public function forwarding_agent()
    {
        return $this->belongsTo('Sass\Customer', 'forwarding_agent_id');
    }
    public function notify()
    {
        return $this->belongsTo('Sass\Customer', 'notify_id');
    }
    public function shipper_state()
    {
        return $this->belongsTo('Sass\State', 'shipper_state_id');
    }
    public function state_of_origin()
    {
        return $this->belongsTo('Sass\State', 'state_of_origin_id');
    }
    public function consignee_state()
    {
        return $this->belongsTo('Sass\State', 'consignee_state_id');
    }
    public function notify_state()
    {
        return $this->belongsTo('Sass\State', 'notify_state_id');
    }

    public function notify_country()
    {
        return $this->belongsTo('Sass\Country', 'notify_country_id');
    }
    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'carrier_id');
    }
    public function inland_carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'inland_carrier_id');
    }
    public function inland_driver()
    {
        return $this->belongsTo('Sass\Driver', 'inland_driver_id');
    }
    public function shipper_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'shipper_zip_code_id');
    }
    public function consignee_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'consignee_zip_code_id');
    }

    public function notify_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'notify_zip_code_id');
    }

    public function container()
    {
        return $this->hasMany('Sass\EoShipmentEntryContainer', 'shipment_id');
    }

    public function hazardous()
    {
        return $this->hasMany('Sass\EoShipmentEntryHazardous', 'shipment_id');
    }

    public function quotes()
    {
        return $this->belongsTo('Sass\EoQuotes', 'quote_id');
    }

    public function bill_of_lading()
    {
        return $this->hasMany('Sass\EoBillOfLading', 'shipment_id');
    }
}
