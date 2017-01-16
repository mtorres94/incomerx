<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class IoBillOfLading extends Model
{
    protected $table = "io_bill_of_lading";

    protected $fillable = [
        'id', 'user_create_id', 'user_update_id', 'created_at', 'updated_at','code',
        'bl_class','bl_type','division_id', 'bl_date', 'foreign_currency', 'bl_status', 'ship_inst', 'reference', 'local_currency', 'quote_number', 'project_number', 'exchange_rate','customer_reference', 'our_reference','forwarding_agent_id','port_loading_id', 'port_unloading_id', 'place_delivery_id', 'destiny_country_id', 'ultimate_destination_id', 'carrier_id', 'vessel_name', 'voyage_name', 'departure_date', 'arrival_date', 'final_destiny_arrival_date', 'terms_type', 'shipper_id', 'shipper_address', 'shipper_city', 'shipper_state_id', 'shipper_zip_code_id', 'shipper_phone', 'consignee_id', 'consignee_address', 'consignee_city', 'consignee_state_id', 'consignee_zip_code_id', 'consignee_phone', 'consignee_fax', 'notify_id', 'notify_address', 'notify_city', 'notify_state_id', 'notify_zip_code_id', 'notify_contact', 'notify_phone', 'notify_fax', 'broker_code', 'broker_phone', 'broker_reference', 'destination_broker_code', 'destination_broker_phone', 'destination_broker_reference', 'agent_id', 'third_id', 'revised_date', 'clear_date', 'release_date', 'pickup_date', 'notified_date', 'follow_up_date', 'un_stuffed_date', 'revised_detail', 'clear_detail', 'release_detail', 'pickup_detail', 'notified_detail', 'follow_up_detail', 'un_stuffed_detail', 'pod_date', 'pod_expected_date', 'received_by', 'incident', 'notes', 'entry_number', 'it_number', 'it_date', 'it_port', 'go_number', 'go_available', 'go_date', 'go_expired_date', 'ams_status', 'ams_date', 'ams_number', 'pod_comments', 'routing_mode', 'routing', 'routing_comments', 'routing_date', 'master_number', 'house_number', 'routing_shipment_number', 'location_id', 'location_address', 'location_city', 'location_state_id', 'location_zip_code_id', 'location_fax', 'location_phone', 'location_comments', 'delivery_carrier_id', 'delivery_id', 'delivery_city', 'delivery_address', 'delivery_state_id', 'delivery_zip_code_id', 'delivery_contact', 'delivery_phone', 'delivery_fax', 'freight_charges', 'delivery_comments', 'document_number', 'bl_number', 'export_reference', 'pre_carriage_by', 'place_receipt', 'exporting_carrier', 'port_loading', 'port_unloading', 'place_delivery', 'point_origin', 'fmc_number', 'domestic_routing', 'load_terminal', 'type_move', 'vessel_yes', 'vessel_no', 'total_value_declared', 'total_pieces', 'total_commodity_id', 'total_weight_unit', 'total_gross_weight', 'total_amount', 'total_cubic', 'payable_at', 'destination_bill', 'destination_cost', 'destination_profit', 'destination_profit_p','origin_bill', 'origin_cost', 'origin_profit', 'origin_profit_p', 'transportation_plans_amount', 'bill_comments', 'bill_status', 'user_open_id', 'routing_order_id', 'shipment_code', 'place_receipt_id', 'mbl_number', 'service_id'
    ];

    public function routing_order()
    {
        return $this->belongsTo('Sass\IoRoutingOrder', 'routing_order_id');
    }
    public function division()
    {
        return $this->belongsTo('Sass\Division', 'division_id');
    }
    public function service()
    {
        return $this->belongsTo('Sass\Service', 'service_id');
    }
    public function total_commodity()
    {
        return $this->belongsTo('Sass\Commodity', 'total_commodity_id');
    }
    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }
    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }
    public function port_loading_name()
    {
        return $this->belongsTo('Sass\OceanPort', 'port_loading_id');
    }
    public function port_unloading_name()
    {
        return $this->belongsTo('Sass\OceanPort', 'port_unloading_id');
    }

    public function shipper()
    {
        return $this->belongsTo('Sass\Customer', 'shipper_id');
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
    public function location()
    {
        return $this->belongsTo('Sass\Customer', 'location_id');
    }
    public function delivery()
    {
        return $this->belongsTo('Sass\Customer', 'delivery_id');
    }
    public function shipper_state()
    {
        return $this->belongsTo('Sass\State', 'shipper_state_id');
    }
    public function location_state()
    {
        return $this->belongsTo('Sass\State', 'location_state_id');
    }
    public function delivery_state()
    {
        return $this->belongsTo('Sass\State', 'delivery_state_id');
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

    public function broker()
    {
        return $this->belongsTo('Sass\Vendor', 'broker_code');
    }

    public function agent_state()
    {
        return $this->belongsTo('Sass\State', 'agent_state_id');
    }


    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'carrier_id');
    }
    public function delivery_carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'delivery_carrier_id');
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
    public function location_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'location_zip_code_id');
    }
    public function delivery_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'delivery_zip_code_id');
    }
    public function place_delivery_name()
    {
        return $this->belongsTo('Sass\WorldLocation', 'place_delivery_id');
    }
    public function place_receipt_name()
    {
        return $this->belongsTo('Sass\WorldLocation', 'place_receipt_id');
    }

    public function destiny_country()
    {
        return $this->belongsTo('Sass\Country', 'destiny_country_id');
    }
    public function ultimate_destination()
    {
        return $this->belongsTo('Sass\Country', 'ultimate_destination_id');
    }


    public function cargo()
    {
        return $this->hasMany('Sass\IoBillOfLadingCargo', 'bill_of_lading_id');
    }
   /* public function cargo_details()
    {
        return $this->hasMany('Sass\IoBillOfLadingCargoDetails', 'bill_of_lading_id');
    }*/
    public function destination_charge()
    {
        return $this->hasMany('Sass\IoBillOfLadingDestinationCharge', 'bill_of_lading_id');
    }

    public function origin_charge()
    {
        return $this->hasMany('Sass\IoBillOfLadingOriginCharge', 'bill_of_lading_id');
    }
    public function container()
    {
        return $this->hasMany('Sass\IoBillOfLadingContainer', 'bill_of_lading_id');
    }

    public function transportation()
    {
        return $this->hasMany('Sass\IoBillOfLadingTransportation', 'bill_of_lading_id');
    }

}
