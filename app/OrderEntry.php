<?php

namespace Sass;


use Illuminate\Database\Eloquent\Model;


class OrderEntry extends Model
{
    protected $table = "whr_orders_entries";

    protected $fillable = [
        'id','code','division_id','user_create_id', 'user_update_id','pd_status', 'pd_type','pd_dispatch_status','warehouse_id', 'date_order', 'date_schedule', 'date_ship_deliv', 'date_completed', 'date_ETA', 'waiting_time', 'quote_number', 'shipment_number', 'truck_number', 'miles','ship_instruction', 'log_number', 'shipment_stop_number', 'third_party_id', 'third_party_phone', 'third_party_fax','third_party_currency_type', 'third_value', 'third_declared_value', 'third_insured_value',

        'shipper_id','shipper_address','shipper_city', 'shipper_state_id', 'shipper_zip_code_id', 'shipper_phone', 'shipper_fax', 'shipper_reference','pickup_type', 'pickup_id', 'pickup_address', 'pickup_city', 'pickup_state_id', 'pickup_zip_code_id', 'pickup_phone', 'pickup_fax', 'pickup_reference', 'instruction_comment',

        'consignee_id','consignee_address','consignee_city', 'consignee_state_id', 'consignee_zip_code_id', 'consignee_phone', 'consignee_fax', 'consignee_reference','delivery_type', 'delivery_id', 'delivery_address', 'delivery_city', 'delivery_state_id', 'delivery_zip_code_id', 'delivery_phone', 'delivery_fax', 'delivery_reference', 'delivery_comment',

        'add_info_comment', 'freight_terms', 'cod_terms','freight_terms_amt','cod_terms_amt','payment_term_id','caller_name', 'caller_notes','trailer_load', 'freight_counted',

        'carriers_carrier_id','equipment_type_id', 'carriers_load', 'receiving_driver_id', 'receiving_receiving_by','appt_date', 'pickup_number', 'delivery_date', 'dropoff_number', 'POD_info_date','POD_info_expected_date', 'received_by', 'incidents', 'POD_notes', 'vendor_code', 'vendor_phone', 'vendor_reference', 'destination_vendor_code', 'destination_vendor_phone', 'destination_vendor_reference',

        'reference', 'RMA', 'location_service_id', 'location_world_location_id', 'destination_world_location_id','final_world_location_id','agent_id', 'reference_instruction',

        'dr_booking_number','dr_document_number', 'dr_export_reference', 'dr_fmc_number','dr_pre_carriage', 'dr_place_receipt', 'dr_vessel_name', 'dr_voyage_name', 'dr_exporting_carrier', 'dr_port_loading','dr_loading','dr_city_origin', 'dr_foreign_port','dr_place_delivery','dr_type_of_move',  'dr_total_pieces', 'dr_packages', 'dr_freight_charges', 'dr_act_weight', 'dr_volume_weight', 'dr_net_weight', 'dr_cubic_weight','charges_freight_charges',

        'charges_bill', 'charges_cost', 'charges_profit', 'charges_profit_p', 'transportation_plans_amount','pickup_comment','created_at','updated_at',

    ];

    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }
    public function pickup_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'pickup_zip_code_id');
    }
    public function pickup_state()
    {
        return $this->belongsTo('Sass\State', 'pickup_state_id');
    }

    public function delivery_state()
    {
        return $this->belongsTo('Sass\State', 'delivery_state_id');
    }

    public function division()
    {
        return $this->belongsTo('Sass\Division');
    }

    public function warehouse()
    {
        return $this->belongsTo('Sass\WarehouseFacility', 'warehouse_id');
    }

    public function vendor()
    {
        return $this->belongsTo('Sass\Vendor', 'vendor_code');
    }

    public function destination_vendor()
    {
        return $this->belongsTo('Sass\Vendor', 'destination_vendor_code');
    }

    public function third_party()
    {
        return $this->belongsTo('Sass\Customer', 'third_party_id');
    }
    public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }
    public function shipper()
    {
        return $this->belongsTo('Sass\Customer', 'shipper_id');
    }

    public function payment_term()
    {
        return $this->belongsTo('Sass\PaymentTerm', 'payment_term_id');
    }
    public function consignee()
    {
        return $this->belongsTo('Sass\Customer', 'consignee_id');
    }

    public function consignee_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'consignee_zip_code_id');
    }
    public function consignee_state()
    {
        return $this->belongsTo('Sass\State', 'consignee_state_id');
    }


    public function delivery_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'delivery_zip_code_id');
    }
    public function shipper_state()
    {
        return $this->belongsTo('Sass\State', 'shipper_state_id');
    }

    public function location_service()
    {
        return $this->belongsTo('Sass\Service', 'location_service_id');
    }

    public function location_world_location()
    {
        return $this->belongsTo('Sass\WorldLocation', 'location_world_location_id');
    }
    public function destination_world_location()
    {
        return $this->belongsTo('Sass\WorldLocation', 'destination_world_location_id');
    }
    public function final_world_location()
    {
        return $this->belongsTo('Sass\WorldLocation', 'final_world_location_id');
    }

    public function pickup_name()
    {
        $pickup_type = $this->attributes['pickup_type'];
        if($pickup_type == '01'){
            return $this->belongsTo('Sass\Carrier', 'pickup_id');
        }else{
            return $this->belongsTo('Sass\Customer', 'pickup_id');
        }
    }

    public function delivery()
    {
       $delivery_type = $this->attributes['delivery_type'];
        if($delivery_type == '01'){
            return $this->belongsTo('Sass\Carrier', 'delivery_id');
        }else{
            return $this->belongsTo('Sass\Customer', 'delivery_id');
        }
    }

    public function driver_name()
    {
        return $this->belongsTo('Sass\Driver', 'drivers_id');
    }

    public function receiving_driver()
    {
        return $this->belongsTo('Sass\Driver', 'receiving_driver_id');
    }


    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'carriers_carrier_id');
    }

    public function shipper_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'shipper_zip_code_id');
    }

    public function equipment_type()
    {
        return $this->belongsTo('Sass\CargoType', 'equipment_type_id');
    }

    public function cargo_details()
    {
        return $this->hasMany('Sass\OrderEntryCargoDetail', 'order_entry_id');
    }

    public function cargo_items()
    {
        return $this->hasMany('Sass\OrderEntryCargoItemDetail', 'order_entry_id');
    }

    public function charge()
    {
        return $this->hasMany('Sass\OrderEntryChargeDetail', 'order_entry_id');
    }

    public function container()
    {
        return $this->hasMany('Sass\OrderEntryContainerDetail', 'order_entry_id');
    }

    public function dock_receipt()
    {
        return $this->hasMany('Sass\OrderEntryDockReceiptDetail', 'order_entry_id');
    }
    public function hazardous()
    {
        return $this->hasMany('Sass\OrderEntryHazardous', 'order_entry_id');
    }
    public function po_numbers()
    {
        return $this->hasMany('Sass\OrderEntryPO', 'order_entry_id');
    }
    public function pro_numbers()
    {
        return $this->hasMany('Sass\OrderEntryPRO', 'order_entry_id');
    }
    public function so_numbers()
    {
        return $this->hasMany('Sass\OrderEntrySO', 'order_entry_id');
    }
    public function stop_numbers()
    {
        return $this->hasMany('Sass\OrderEntryStop', 'order_entry_id');
    }

    public function transportation()
    {
        return $this->hasMany('Sass\OrderEntryTransportationDetail', 'order_entry_id');
    }


    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }

}
