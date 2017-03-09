<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'mst_customers';

    protected $fillable = [
        'code', 'name', 'address', 'city', 'state_id', 'zip_id', 'country_id', 'phone', 'fax', 'duns_code', 'incoterm_id',
        'since', 'dps_check', 'status', 'shipper', 'consignee', 'third_party', 'agent', 'currency_id', 'agent_id', 'coloader_id',
        'origin_id', 'destination_id', 'unknown_shipper', 'consent_letter_on_file', 'partner_id', 'receipt', 'withdraw', 'shipment',
        'ea_loading_guide', 'ea_airwaybill', 'ea_manifest', 'eo_loading_guide', 'eo_bill_of_lading', 'eo_manifest', 'w_sales_order',
        'w_bill_of_lading', 'w_receiving_log', 'i_invoice', 'pd_orders', 'ia_airwaybill', 'io_bill_of_lading', 'c_shipping', 'po_orders',
        'user_create_id', 'user_update_id', 'user_open_id',
    ];

    //<editor-fold desc="Customer Eloquent Relationship">
    public function state()
    {
        return $this->belongsTo('Sass\State');
    }

    public function country()
    {
        return $this->belongsTo('Sass\Country');
    }

    public function zip_code()
    {
        return $this->belongsTo('Sass\ZipCode');
    }

    public function incoterm()
    {
        return $this->belongsTo('Sass\Incoterm');
    }

    public function currency()
    {
        return $this->belongsTo('Sass\Currency');
    }

    public function third_party()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }

    public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }

    public function coloader()
    {
        return $this->belongsTo('Sass\Customer', 'coloader_id');
    }

    public function origin()
    {
        return $this->belongsTo('Sass\Vendor', 'origin_id');
    }

    public function destination()
    {
        return $this->belongsTo('Sass\Vendor', 'destination_id');
    }

    public function user()
    {
        return $this->belongsTo('Sass\User');
    }

    public function warehouse_consignee()
    {
        return $this->hasMany('Sass\ReceiptEntry', 'consignee_id');
    }

    public function warehouse_shipper()
    {
        return $this->hasMany('Sass\ReceiptEntry', 'shipper_id');
    }
    //</editor-fold>

    public function setUnknownShipperAttribute($value)
    {
        $this->attributes['unknown_shipper'] = ($value == 'on') ? 1 : 0;
    }

    public function setConsentLetterOnFileAttribute($value)
    {
        $this->attributes['consent_letter_on_file'] = ($value == 'on') ? 1 : 0;
    }

    public function getUnknownShipperAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function getConsentLetterOnFileAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
}
