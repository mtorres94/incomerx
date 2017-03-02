<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class EoQuotes extends Model
{
    protected $table = "eo_quotes";

    protected $fillable = [
        'id' , 'created_at', 'updated_at', 'user_create_id', 'user_update_id', 'code' , 'quote_date', 'division_id', 'valid_date', 'type', 'status' , 'rate_class', 'quote_type', 'contract_basis', 'place_receipt_id', 'port_loading_id' , 'transhipment_port_id', 'port_unloading_id', 'place_delivery_id', 'carrier_id', 'currency_type', 'exchange_rate', 'insured_value', 'customer_id', 'customer_address', 'customer_city', 'customer_state_id', 'customer_country_id', 'customer_zip_code_id', 'customer_contact' , 'customer_email','customer_phone', 'customer_fax' , 'shipper_id', 'shipper_address', 'shipper_state_id', 'shipper_country_id', 'shipper_zip_code_id', 'shipper_contact', 'shipper_phone', 'shipper_fax', 'consignee_id', 'consignee_address', 'consignee_city', 'consignee_state_id', 'consignee_country_id', 'consignee_zip_code_id', 'consignee_contact', 'consignee_phone', 'consignee_fax', 'agent_id', 'agent_phone', 'transit_day', 'payment_type', 'frequency', 'starting_date', 'starting_process_date', 'ending_date', 'approved_date', 'closed_date', 'quote_instruction', 'total_quantity', 'total_unit_weight', 'total_weight', 'total_cargo_type_id', 'total_commodity', 'total_description', 'freight_charges', 'other_charges', 'total_bill' , 'total_cost' , 'total_profit', 'total_profit_p', 'user_open_id', 'service_id', 'shipper_city', 'quotes_comments', 'total_cubic', 'incoterm_type'
        ];

    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }
    public function shipper()
    {
        return $this->belongsTo('Sass\Customer', 'shipper_id');
    }

    public function consignee()
    {
        return $this->belongsTo('Sass\Customer', 'consignee_id');
    }
    public function customer()
    {
        return $this->belongsTo('Sass\Customer', 'customer_id');
    }
    public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
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
    public function shipper_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'shipper_zip_code_id');
    }
    public function consignee_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'consignee_zip_code_id');
    }
    public function customer_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'customer_zip_code_id');
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

    public function service()
    {
        return $this->belongsTo('Sass\Service', 'service_id');
    }
    public function total_cargo_type()
    {
        return $this->belongsTo('Sass\CargoType', 'total_cargo_type_id');
    }

    public function customer_country()
    {
        return $this->belongsTo('Sass\Country', 'customer_country_id');
    }
    public function shipper_country()
    {
        return $this->belongsTo('Sass\Country', 'shipper_country_id');
    }
    public function consignee_country()
    {
        return $this->belongsTo('Sass\Country', 'consignee_country_id');
    }


    public function shipper_state()
    {
        return $this->belongsTo('Sass\State', 'shipper_state_id');
    }
    public function consignee_state()
    {
        return $this->belongsTo('Sass\State', 'consignee_state_id');
    }
    public function customer_state()
    {
        return $this->belongsTo('Sass\State', 'customer_state_id');
    }

    public function cargo()
    {
        return $this->hasMany('Sass\EoQuotesCargo', 'quotes_id');
    }
    public function container()
    {
        return $this->hasMany('Sass\EoQuotesContainer', 'quotes_id');
    }
    public function charge()
    {
        return $this->hasMany('Sass\EoQuotesCharges', 'quotes_id');
    }
    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }
}
