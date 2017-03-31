<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class AccInvoice extends Model
{
    protected $table = "acc_invoices";

    protected $fillable = [
        'id', 'user_create_id', 'user_update_id','user_open_id', 'created_at', 'updated_at','code', 'invoice_bill', 'date', 'currency_id', 'type', 'source', 'period', 'class', 'shipment_code', 'master_code', 'bill_to_id', 'bill_to_address', 'bill_to_city', 'bill_state_id', 'bill_to_zip_code_id', 'bill_to_contact', 'bill_to_email', 'bill_to_phone', 'bill_to_payment_term', 'bill_to_sales', 'shipper_id', 'shipper_address', 'shipper_city', 'shipper_state_id', 'shipper_zip_code_id', 'shipper_contact', 'shipper_email', 'shipper_phone', 'shipper_fax', 'shipper_payment_term', 'consignee_id', 'consignee_address', 'consignee_city', 'consignee_state_id', 'consignee_zip_code_id', 'consignee_contact', 'consignee_email', 'consignee_phone', 'consignee_fax', 'consignee_payment_term', 'agent_id', 'freight_revenue', 'freight_cost', 'profit', 'adjustment', 'net_profit', 'agent_commission_adjust', 'agent_commission_percent', 'agent_commission_amount', 'agent_note', 'carrier_type', 'carrier_id', 'vessel_name', 'voyage_name', 'departure_date', 'arrival_date', 'origin_id', 'destination_id', 'place_receipt_id', 'ultimate_destination_id', 'commission_amount', 'commissionable_amount', 'commission_adjust', 'service_id', 'total_bill', 'total_cost', 'total_profit', 'total_profit_percent', 'total_balance', 'invoice_comments', 'comments', 'customer_reference', 'house_code', 'status', 'total_gross_weight', 'total_pieces', 'total_volume_weight', 'total_weight_unit','total_charge_weight', 'total_cubic', 'posted_date' ];

    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }
    public function currency()
    {
        return $this->belongsTo('Sass\Currency', 'currency_id');
    }
    public function bill_to()
    {
        return $this->belongsTo('Sass\Customer', 'bill_to_id');
    }
    public function bill_to_state()
    {
        return $this->belongsTo('Sass\State', 'bill_to_state_id');
    }
    public function bill_to_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'bill_to_zip_code_id');
    }
    public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }
    public function shipper()
    {
        return $this->belongsTo('Sass\Customer', 'shipper_id');
    }
    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier', 'carrier_id');
    }
    public function shipper_state()
    {
        return $this->belongsTo('Sass\State', 'shipper_state_id');
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
    public function consignee_zip_code()
    {
        return $this->belongsTo('Sass\ZipCode', 'consignee_zip_code_id');
    }
    public function origin()
    {
        $mode = $this->attributes['carrier_type'];
        switch ($mode) {
            case "A":
                return $this->belongsTo('Sass\Airport', 'origin_id');
            case "O":
                return $this->belongsTo('Sass\OceanPort', 'origin_id');
            case "T":
                return $this->belongsTo('Sass\ZipCode', 'origin_id');

        }
    }
    public function destination()
    {
        $mode = $this->attributes['carrier_type'];
        switch ($mode) {
            case "A":
                return $this->belongsTo('Sass\Airport', 'destination_id');
            case "O":
                return $this->belongsTo('Sass\OceanPort', 'destination_id');
            case "T":
                return $this->belongsTo('Sass\ZipCode', 'destination_id');

        }
    }
    public function place_receipt()
    {
        return $this->belongsTo('Sass\WorldLocation', 'place_receipt_id');
    }
    public function ultimate_destination()
    {
        return $this->belongsTo('Sass\WorldLocation', 'ultimate_destination_id');
    }
    public function service()
    {
        return $this->belongsTo('Sass\Service', 'service_id');
    }
    public function cargo_details()
    {
        return $this->hasMany('Sass\AccInvoiceCargo', 'invoice_id');
    }
    public function container_details()
    {
        return $this->hasMany('Sass\AccInvoiceContainer', 'invoice_id');
    }
    public function charge_details()
    {
        return $this->hasMany('Sass\AccInvoiceCharge', 'invoice_id');
    }

}
