<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class BookingEntry extends Model
{
    protected $table = "exp_booking_entries";

    protected $fillable = [
        'id', 'user_create_id', 'user_update_id', 'created_at', 'updated_at', 'booking_code', 'division_id', 'shipping_number', 'shipment_id','status','shipment_type', 'bl_type', 'currency_type', 'rate_class',
        'place_receipt_id', 'port_loading_id', 'port_unloading_id', 'place_delivery_id', 'booking_agent', 'booking_reference', 'agent_id', 'contact','phone', 'fax', 'commission', 'carrier_id', 'vessel_name', 'voyage_name', 'departure_date', 'arrival_date', 'booked_on_date', 'loading_date', 'cut_off_date', 'documents_cut_off_date',
        'shipper_id', 'shipper_address', 'shipper_city', 'shipper_state_id', 'shipper_country_id', 'shipper_zip_code_id', 'shipper_phone', 'shipper_number',
        'consignee_id', 'consignee_address', 'consignee_city', 'consignee_state_id', 'consignee_country_id', 'consignee_zip_code_id', 'consignee_phone', 'consignee_number', 'supplier_id', 'supplier_address', 'supplier_city','supplier_state_id', 'supplier_country_id', 'supplier_zip_code_id', 'supplier_phone', 'supplier_number', 'notify_id', 'notify_address', 'notify_city', 'notify_state_id', 'notify_country_id', 'notify_zip_code_id', 'notify_contact', 'notify_phone', 'notify_email', 'domestic_instructions',
        'pre_carriage_by', 'place_receipt', 'loading_terminal','exporting_carrier', 'port_loading', 'transhipment_port_id', 'foreign_port', 'place_delivery', 'type_of_move', 'vessel_yes', 'vessel_no', 'forwarding_agent_id', 'service_id', 'confirmed', 'spot_rate', 'spotting_amount', 'all_inclusive', 'fuel_security', 'spotting_date', 'total_quantity', 'total_weight_unit_measurement', 'total_cubic', 'total_dim_fact', 'total_cargo_type_id', 'total_commodity_id', 'total_volume_weight', 'total_freight_charge', 'total_other_charge', 'inland_carrier_id', 'inland_driver_id', 'inland_lic_number', 'inland_instruction', 'inland_date'
    ];

    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }
    public function shipper()
{
    return $this->belongsTo('Sass\Customer', 'shipper_id');
}
    public function total_commodity()
    {
        return $this->belongsTo('Sass\Commodity', 'total_commodity_id');
    }
    public function consignee()
    {
        return $this->belongsTo('Sass\Customer', 'consignee_id');
    }
    public function supplier()
    {
        return $this->belongsTo('Sass\Customer', 'supplier_id');
    }
    public function notify()
    {
        return $this->belongsTo('Sass\Customer', 'notify_id');
    }
    public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }
    public function supplier_state()
    {
        return $this->belongsTo('Sass\State', 'supplier_state_id');
    }

    public function shipper_state()
    {
        return $this->belongsTo('Sass\State', 'shipper_state_id');
    }
    public function consignee_state()
    {
        return $this->belongsTo('Sass\State', 'consignee_state_id');
    }
    public function notify_state()
    {
        return $this->belongsTo('Sass\State', 'notify_state_id');
    }
    public function carrier()
    {
        return $this->belongsTo('Sass\State', 'carrier_id');
    }
    public function inland_carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'inland_carrier_id');
    }

    public function place_receipt()
    {
        return $this->belongsTo('Sass\WorldLocation', 'place_receipt_id');
    }
    public function place_delivery()
    {
        return $this->belongsTo('Sass\WorldLocation', 'place_delivery_id');
    }
    public function shipper_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'shipper_zip_code_id');
    }
    public function consignee_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'consignee_zip_code_id');
    }
    public function supplier_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'supplier_zip_code_id');
    }
    public function notify_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'notify_zip_code_id');
    }
    public function port_loading()
    {
        return $this->belongsTo('Sass\OceanPort', 'port_loading_id');
    }
    public function port_unloading()
    {
        return $this->belongsTo('Sass\OceanPort', 'port_unloading_id');
    }
    public function transhipment_port()
    {
        return $this->belongsTo('Sass\OceanPort', 'transhipment_port_id');
    }
    public function division()
    {
        return $this->belongsTo('Sass\Division');
    }
    public function total_cargo_type()
    {
        return $this->belongsTo('Sass\CargoType', 'total_cargo_type_id');
    }
    public function shipment()
    {
        return $this->belongsTo('Sass\ShipmentEntry', 'shipment_id');
    }
}
