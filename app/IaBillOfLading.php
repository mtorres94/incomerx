<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class IaBillOfLading extends Model
{
    protected $table = "ia_bill_of_lading";

    protected $fillable = [
     'id' ,  'code' ,  'created_at' ,  'updated_at' ,  'user_create_id' ,  'user_update_id' ,  'user_open_id' ,  'bl_class' ,  'bl_type' ,  'division_id' ,  'date_today' ,  'currency_type' ,  'bl_status' ,  'routing_order_id' ,  'customer_reference' ,  'our_reference' ,  'forwarding_agent_id' ,  'port_loading_id' ,  'port_unloading_id' ,  'place_delivery_id' ,  'place_receipt_id' ,  'destiny_country_id' ,  'carrier_id' ,  'departure_date' ,  'arrival_date' ,  'incoterm_type' ,  'vessel_name' ,  'voyage_name' ,  'document_number' ,  'bl_number' ,  'pre_carriage_by' ,  'place_receipt' ,  'exporting_carrier' ,  'port_loading' ,  'port_unloading' ,  'place_delivery' ,  'export_reference' ,  'load_terminal' ,  'type_move' ,  'vessel_yes' ,  'vessel_no' ,    'total_pieces' ,  'total_commodity_id' ,  'total_weight_unit' ,  'total_gross_weight' ,  'total_amount' ,  'total_cubic' ,  'payable_at' ,  'sum_bill' ,  'sum_cost' ,  'sum_profit' ,  'sum_profit_percent' ,  'shipper_id' ,  'shipper_address' ,  'location_state_id' ,  'shipper_city' ,  'shipper_state_id' ,  'shipper_zip_code_id' ,  'shipper_phone' ,  'consignee_id' ,  'consignee_address' ,  'consignee_city' ,  'consignee_state_id' ,  'consignee_zip_code_id' ,  'consignee_phone' ,  'consignee_fax' ,  'notify_id' ,  'notify_address' ,  'notify_city' ,  'notify_state_id' ,  'notify_zip_code_id' ,  'notify_contact' ,  'notify_phone' ,  'notify_fax' ,  'broker_code' ,  'broker_phone' ,  'broker_reference' ,  'destination_broker_code' ,  'destination_broker_phone' ,  'agent_id' ,  'third_id' ,  'location_id' ,  'location_address' ,  'location_city' ,  'location_zip_code_id' ,  'location_contact' ,  'location_phone' ,  'location_fax' ,  'location_comments' ,  'location_state_id' ,  'bill_comments', 'accounting_information' , 'issued_by' , 'agent_code' , 'account_number' , 'port_unloading_code' , 'first_carrier' , 'flight_number' , 'flight_date' , 'carriage_value' , 'customs_value' , 'wt_val' , 'other' , 'shipping_information' , 'sci_number' , 'amount_insurance' , 'value_declared' , 'handling_information' , 'goods_information' , 'weight_charge_prepaid' , 'weight_charge_collected' , 'valuation_prepaid' , 'valuation_collected' , 'tax_prepaid' , 'tax_collected' , 'other_prepaid' , 'other_collected' , 'sum_prepaid' , 'sum_collected' , 'signature_shipper' , 'executed_on' , 'shipment_code', 'mb_number', 'destiny_country_id', 'mbl_number', 'status'];

    public function routing_order()
    {
        return $this->belongsTo('Sass\IaRoutingOrder', 'routing_order_id');
    }
    public function division()
    {
        return $this->belongsTo('Sass\Division', 'division_id');
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

   public function cargo()
    {
        return $this->hasMany('Sass\IaBillOfLadingCargo', 'bill_of_lading_id');
    }

    public function origin_charge()
    {
        return $this->hasMany('Sass\IaBillOfLadingOriginCharge', 'bill_of_lading_id');
    }



}
