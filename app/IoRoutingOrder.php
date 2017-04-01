<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class IoRoutingOrder extends Model
{
    protected $table = "io_routing_order";

    protected $fillable = [
        'id', 'user_create_id', 'user_update_id','user_open_id', 'created_at', 'updated_at','code',
        'mode','type','date_today' ,'status' ,'origin_id' ,'origin_country_id' ,'origin_contact' ,'destination_id' ,'destination_country_id' ,'destination_contact' ,'destination_email' ,'destination_phone' ,'destination_fax' ,'shipper_id' ,'shipper_contact' ,'shipper_address' ,'shipper_phone' ,'shipper_fax' ,'shipper_email' ,'consignee_id' ,'consignee_contact' ,'consignee_address' ,'consignee_phone' ,'consignee_fax' ,'consignee_email' ,'port_loading_id' ,'port_unloading_id', 'carrier_id', 'place_receipt_id', 'place_delivery_id' ,'service_id' ,'lcl_instruction' ,'air_air_to_miami' ,'air_air_to_la' ,'sea_air_to_miami' ,'air_sea_to_miami' ,'equipment_type_id' ,'supplier_id' ,'supplier_contact' ,'supplier_address' ,'supplier_phone' ,'supplier_fax' ,'supplier_email' ,'supplier_commodity_id' ,'supplier_po_number' ,'unit_weight' ,'supplier_weight' ,'supplier_volume' ,'instructions' ,'sum_bill', 'sum_cost', 'sum_profit', 'sum_profit_percent', 'quote_id', 'incoterm_type'
        ];

    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }
    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }
    public function service()
    {
        return $this->belongsTo('Sass\Service', 'service_id');
    }
    public function quote()
    {
        return $this->belongsTo('Sass\IoQuote', 'quote_id');
    }
    public function shipper()
    {
        return $this->belongsTo('Sass\Customer', 'shipper_id');
    }
    public function consignee()
    {
        return $this->belongsTo('Sass\Customer', 'consignee_id');
    }
    public function supplier()
    {
        return $this->belongsTo('Sass\Customer', 'supplier_id');
    }
    public function incoterm()
    {
        return $this->belongsTo('Sass\Incoterm', 'incoterm_type');
    }
    public function supplier_commodity()
    {
        return $this->belongsTo('Sass\Commodity', 'supplier_commodity_id');
    }
    public function place_receipt()
    {
        return $this->belongsTo('Sass\WorldLocation', 'place_receipt_id');
    }
    public function port_loading()
    {
        return $this->belongsTo('Sass\OceanPort', 'port_loading_id');
    }
    public function port_unloading()
    {
        return $this->belongsTo('Sass\OceanPort', 'port_unloading_id');
    }
      public function place_delivery()
    {
        return $this->belongsTo('Sass\WorldLocation', 'place_delivery_id');
    }
    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'carrier_id');
    }
    public function origin()
    {
        return $this->belongsTo('Sass\Customer', 'origin_id');
    }
    public function destination()
    {
        return $this->belongsTo('Sass\Customer', 'destination_id');
    }
    public function origin_country()
    {
        return $this->belongsTo('Sass\Country', 'origin_country_id');
    }
    public function destination_country()
    {
        return $this->belongsTo('Sass\Country', 'destination_country_id');
    }

    public function charge()
    {
        return $this->hasMany('Sass\IoRoutingOrderCharge', 'routing_order_id');
    }
}
