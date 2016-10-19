<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class BillOfLading extends Model
{
    protected $table = "exp_bills_of_lading";

    protected $fillable = [
        'id', 'user_create_id', 'user_update_id', 'created_at', 'updated_at', 'bl_code', 'bl_class', 'bl_type', 'division_id', 'bl_date', 'rate_class', 'bl_status', 'quote_number_id', 'ship_inst', 'project_number', 'shipment_number', 'booking_entry_id', 'manifest_type', 'dbl_mbl_code', 'hbl_code', 'currency_type', 'declared_value', 'insured_value', 'exchange_rate', 'collect_free', 'insurance', 'stand_by', 'partial', 'spot_rate', 'confirmed', 'POD_info', 'amount',
        'shipper_id', 'shipper_address', 'shipper_city', 'shipper_state_id', 'shipper_country_id', 'shipper_zip_code_id', 'shipper_phone',
        'consignee_id', 'consignee_address', 'consignee_city', 'consignee_state_id', 'consignee_country_id', 'consignee_zip_code_code', 'consignee_phone',
        'notify_id', 'notify_address', 'notify_city', 'notify_state_id', 'notify_country_id', 'notify_zip_code_id', 'notify_phone', 'notify_contact', 'notify_contact_phone', 'notify_email',
        'third_id', 'third_address', 'third_city', 'third_state_id', 'third_zip_code_id', 'third_contact', 'third_contact_phone', 'third_email',
       'pod_date', 'pod_expected_date', 'pod_received_by', 'pod_incident','pod_note', 'add_info_comments', 'SDK_name', 'SDK_address', 'SDK_attn', 'SDK_reff', 'SDK_notes', 'inland_carrier_id', 'inland_date','inland_dbl_mbl_code', 'import_date', 'import_master_number', 'import_house_number', 'import_shipment_number', 'confirm_status', 'uplift', 'confirm_master_number', 'confirm_house_number', 'confirm_shipment_number', 'broker_code', 'broker_phone', 'broker_reference', 'destination_broker_code', 'destination_broker_phone', 'destination_broker_reference', 'loading_port_id', 'unloading_port_id', 'carrier_id', 'vessel_name', 'voyage_name', 'departure', 'arrival', 'origin_country_id', 'customs_code', 'it_number', 'incoterm_type', 'forwarding_agent_id', 'commission_p', 'coloader_id', 'document_number', 'bl_number', 'export_reference', 'point_of_origin', 'fmc_number', 'agent_id', 'agent_address', 'agent_city', 'agent_state_id', 'agent_country_id', 'agent_zip_code_id', 'agent_phone', 'agent_commission_amount', 'agent_commission_p', 'domestic_instruction', 'pre_carriage_by', 'place_receipt', 'loading_terminal', 'vessel_yes', 'vessel_no', 'exporting_carrier', 'port_loading', 'type_of_move', 'foreign_port', 'place_delivery', 'transhipment_port_id', 'letter_comments', 'comments_comment', 'total_pieces', 'total_commodity_id', 'total_weight_unit_measurement', 'total_weight_kgs','total_cubic_cbm', 'total_charge_weight_kgs', 'total_weight_lbs', 'total_cubic_cft', 'total_charge_weight_lbs'];

    public function total_commodity()
    {
        return $this->belongsTo('Sass\Commodity', 'total_commodity_id');
    }
    public function origin_country()
    {
        return $this->belongsTo('Sass\Country', 'origin_country_id');
    }
    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }
    public function loading_port()
    {
        return $this->belongsTo('Sass\OceanPort', 'loading_port_id');
    }
    public function unloading_port()
    {
        return $this->belongsTo('Sass\OceanPort', 'unloading_port_id');
    }
    public function transhipment_port()
    {
        return $this->belongsTo('Sass\OceanPort', 'transhipment_port_id');
    }
    public function shipper()
    {
        return $this->belongsTo('Sass\Customer', 'shipper_id');
    }
    public function quote_number()
    {
        return $this->belongsTo('Sass\Customer', 'quote_number_id');
    }
    public function booking_entry()
    {
        return $this->belongsTo('Sass\BookingEntry', 'booking_entry_id');
    }
    public function consignee()
    {
        return $this->belongsTo('Sass\Customer', 'consignee_id');
    }
    public function third()
    {
        return $this->belongsTo('Sass\Customer', 'third_id');
    }

    public function notify()
    {
        return $this->belongsTo('Sass\Customer', 'notify_id');
    }
    public function forwarding_agent()
    {
        return $this->belongsTo('Sass\Customer', 'forwarding_agent_id');
    }
    public function coloader()
    {
        return $this->belongsTo('Sass\Customer', 'coloader_id');
    }
    public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }
    public function shipper_state()
    {
        return $this->belongsTo('Sass\State', 'shipper_state_id');
    }
    public function third_state()
    {
        return $this->belongsTo('Sass\State', 'third_state_id');
    }
    public function consignee_state()
    {
        return $this->belongsTo('Sass\State', 'consignee_state_id');
    }
    public function notify_state()
    {
        return $this->belongsTo('Sass\State', 'notify_state_id');
    }
    public function agent_state()
    {
        return $this->belongsTo('Sass\State', 'agent_state_id');
    }
    public function inland_carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'inland_carrier_id');
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
    public function notify_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'notify_zip_code_id');
    }
    public function agent_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'agent_zip_code_id');
    }
    public function third_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'third_zip_code_id');
    }
    public function shipper_country()
    {
        return $this->belongsTo('Sass\Country', 'shipper_country_id');
    }
    public function consignee_country()
    {
        return $this->belongsTo('Sass\Country', 'consignee_country_id');
    }
    public function notify_country()
    {
        return $this->belongsTo('Sass\Country', 'notify_country_id');
    }
    public function agent_country()
    {
        return $this->belongsTo('Sass\Country', 'agent_country_id');
    }

    public function cargo()
    {
        return $this->hasMany('Sass\BillOfLadingCargo', 'bill_of_lading_id');
    }
    public function cargo_details()
    {
        return $this->hasMany('Sass\BillOfLadingCargoDetail', 'bill_of_lading_id');
    }
    public function charge()
    {
        return $this->hasMany('Sass\BillOfLadingCharge', 'bill_of_lading_id');
    }
    public function container()
    {
        return $this->hasMany('Sass\BillOfLadingContainer', 'bill_of_lading_id');
    }
    public function customerReference()
    {
        return $this->hasMany('Sass\BillOfLadingCustomerReference', 'bill_of_lading_id');
    }
    public function hazardous()
    {
        return $this->hasMany('Sass\BillOfLadingHazardous', 'bill_of_lading_id');
    }
    public function item()
    {
        return $this->hasMany('Sass\BillOfLadingItem', 'bill_of_lading_id');
    }
    public function pro_tracking()
    {
        return $this->hasMany('Sass\BillOfLadingProTracking', 'bill_of_lading_id');
    }
    public function transportation()
    {
        return $this->hasMany('Sass\BillOfLadingTransportation', 'bill_of_lading_id');
    }
}
