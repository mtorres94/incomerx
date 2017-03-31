<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class EaBookingEntry extends Model
{
    protected $table= 'ea_booking_entries';
    protected $fillable = [
        'id', 'created_at', 'updated_at', 'user_create_id', 'user_update_id', 'user_open_id', 'shipment_id', 'code', 'shipment_type', 'status', 'date', 'carrier_id', 'awb_number', 'first_flight', 'last_flight', 'origin_id', 'destination_id', 'booking_agent', 'agent_id', 'agent_contact', 'agent_phone', 'agent_fax', 'agent_commission', 'departure_date', 'arrival_date', 'service_id', 'shipper_id', 'shipper_address', 'shipper_state_id', 'shipper_country_id', 'shipper_zip_code_id', 'shipper_city', 'shipper_phone', 'shipper_fax', 'shipper_contact', 'consignee_id', 'consignee_address', 'consignee_state_id', 'consignee_country_id', 'consignee_zip_code_id', 'consignee_city', 'consignee_phone', 'consignee_fax',
    ];

    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }

    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }

    public function shipment()
    {
        return $this->belongsTo('Sass\EaShipmentEntry', 'shipment_id');
    }

    public function service()
    {
        return $this->belongsTo('Sass\Service', 'service_id');
    }

    public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }

    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'carrier_id');
    }

    public function shipper()
    {
        return $this->belongsTo('Sass\Customer', 'shipper_id');
    }

    public function shipper_state()
    {
        return $this->belongsTo('Sass\State', 'shipper_state_id');
    }

    public function shipper_country()
    {
        return $this->belongsTo('Sass\Country', 'shipper_country_id');
    }

    public function shipper_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'shipper_zip_code_id');
    }

    public function consignee()
    {
        return $this->belongsTo('Sass\Customer', 'consignee_id');
    }

    public function consignee_state()
    {
        return $this->belongsTo('Sass\State', 'consignee_state_id');
    }

    public function consignee_country()
    {
        return $this->belongsTo('Sass\Country', 'consignee_country_id');
    }

    public function consignee_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'consignee_zip_code_id');
    }

    public function origin()
    {
        return $this->belongsTo('Sass\Airport', 'origin_id');
    }

    public function destination()
    {
        return $this->belongsTo('Sass\Airport', 'destination_id');
    }
    public function airwaybill()
    {
        return $this->hasMany('Sass\EaAirwayBill', 'booking_id');
    }



}
