<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class CargoLoader extends Model
{
    protected $table = "exp_cargo_loader";

    protected $fillable = [
        'id', 'user_create_id', 'user_update_id', 'created_at', 'updated_at','cargo_load_code', 'carrier_id', 'place_receipt_id', 'port_loading_id', 'port_unloading_id', 'place_delivery_id',
        'consignee_id', 'consignee_address', 'consignee_city', 'consignee_state_id', 'consignee_country_id', 'consignee_zip_code_id', 'consignee_phone', 'consignee_fax',
        'booking_id', 'date_today', 'user_id', 'shipment_type', 'shipment_id', 'division_id','cargo_loader_status', 'inland_carrier_id', 'inland_driver_id', 'inland_lic_number', 'inland_mark', 'inland_comments', 'agent_id','forwarding_agent_id', 'notify_id', 'notify_address', 'notify_city', 'notify_state_id', 'notify_country_id', 'notify_zip_code_id', 'notify_contact', 'notify_contact_phone', 'notify_email', 'domestic_instruction',
        'pre_carriage_by', 'place_receipt', 'loading_terminal', 'exporting_carrier', 'port_loading', 'type_of_move', 'foreign_port', 'place_delivery', 'vessel_yes', 'vessel_no',
        'shipper_id', 'shipper_address', 'shipper_city', 'shipper_state_id', 'shipper_country_id', 'shipper_zip_code_id', 'shipper_phone', 'shipper_fax', 'vessel_name', 'voyage_name', 'release_date', 'loading_date', 'departure_date','arrival_date', 'cut_off_date'];


    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
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

    public function notify()
    {
        return $this->belongsTo('Sass\Customer', 'notify_id');
    }
    public function notify_state()
    {
        return $this->belongsTo('Sass\State', 'notify_state_id');
    }
    public function notify_country()
    {
        return $this->belongsTo('Sass\Country', 'notify_country_id');
    }
    public function notify_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'notify_zip_code_id');
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

    public function booking()
    {
        return $this->belongsTo('Sass\BookingEntry', 'booking_id');
    }
    public function forwarding_agent()
    {
        return $this->belongsTo('Sass\Customer', 'forwarding_agent_id');
    }
    public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }
    public function inland_carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'inland_carrier_id');
    }
    public function inland_driver()
    {
        return $this->belongsTo('Sass\Carrier', 'inland_driver_id');
    }
    public function shipment()
    {
        return $this->belongsTo('Sass\ShipmentEntry', 'shipment_id');
    }
    public function division()
    {
        return $this->belongsTo('Sass\Division');
    }
    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'carrier_id');
    }
    public function place_receipt()
    {
        return $this->belongsTo('Sass\WorldLocation', 'place_receipt_id');
    }
    public function place_delivery()
    {
        return $this->belongsTo('Sass\WorldLocation', 'place_delivery_id');
    }
    public function port_loading()
    {
        return $this->belongsTo('Sass\OceanPort', 'port_loading_id');
    }
    public function port_unloading()
    {
        return $this->belongsTo('Sass\OceanPort', 'port_unloading_id');
    }
}
