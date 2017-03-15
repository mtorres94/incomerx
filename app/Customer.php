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
        'user_create_id', 'user_update_id', 'user_open_id'
    ];

    //<editor-fold desc="Customer Eloquent Relationship">
    public function setAgentAttribute($value)
    {
        $this->attributes['agent'] = ($value == 'on') ? 1 : 0;
    }
    public function getAgentAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setThirdPartyAttribute($value)
    {
        $this->attributes['third_party'] = ($value == 'on') ? 1 : 0;
    }
    public function getThirdPartyAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setConsigneeAttribute($value)
    {
        $this->attributes['consignee'] = ($value == 'on') ? 1 : 0;
    }
    public function getConsigneeAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setShipperAttribute($value)
    {
        $this->attributes['shipper'] = ($value == 'on') ? 1 : 0;
    }
    public function getShipperAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setReceiptAttribute($value)
    {
        $this->attributes['receipt'] = ($value == 'on') ? 1 : 0;
    }
    public function getReceiptAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setWithdrawAttribute($value)
    {
        $this->attributes['withdraw'] = ($value == 'on') ? 1 : 0;
    }
    public function getWithdrawAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setShipmentAttribute($value)
    {
        $this->attributes['shipment'] = ($value == 'on') ? 1 : 0;
    }
    public function getShipmentAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setEaLoadingGuideAttribute($value)
    {
        $this->attributes['ea_loading_guide'] = ($value == 'on') ? 1 : 0;
    }
    public function getEaLoadingGuideAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setEaAirwaybillAttribute($value)
    {
        $this->attributes['ea_airwaybill'] = ($value == 'on') ? 1 : 0;
    }
    public function getEaAirwaybillAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setEaManifestAttribute($value)
    {
        $this->attributes['ea_manifest'] = ($value == 'on') ? 1 : 0;
    }
    public function getEaManifestAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setEoLoadingGuideAttribute($value)
    {
        $this->attributes['eo_loading_guide'] = ($value == 'on') ? 1 : 0;
    }
    public function getEoLoadingGuideAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setEoBillOfLadingAttribute($value)
    {
        $this->attributes['eo_bill_of_lading'] = ($value == 'on') ? 1 : 0;
    }
    public function getEoBillOfLadingAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function setEoManifestAttribute($value)
{
    $this->attributes['eo_manifest'] = ($value == 'on') ? 1 : 0;
}
    public function getEoManifestAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function setWSalesOrderAttribute($value)
    {
        $this->attributes['w_sales_order'] = ($value == 'on') ? 1 : 0;
    }
    public function getWSalesOrderAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }

    public function setWBillOfLadingAttribute($value)
    {
        $this->attributes['w_bill_of_lading'] = ($value == 'on') ? 1 : 0;
    }
    public function getWBillOfLadingAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setWReceivingLogAttribute($value)
    {
        $this->attributes['w_receiving_log'] = ($value == 'on') ? 1 : 0;
    }
    public function getWReceivingLogAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setIInvoiceAttribute($value)
    {
        $this->attributes['i_invoice'] = ($value == 'on') ? 1 : 0;
    }
    public function getIInvoiceAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setPdOrdersAttribute($value)
    {
        $this->attributes['pd_orders'] = ($value == 'on') ? 1 : 0;
    }
    public function getPdOrdersAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setIaAirwaybillAttribute($value)
    {
        $this->attributes['ia_airwaybill'] = ($value == 'on') ? 1 : 0;
    }
    public function getIaAirwaybillAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setIoBillOfLadingAttribute($value)
    {
        $this->attributes['io_bill_of_lading'] = ($value == 'on') ? 1 : 0;
    }
    public function getIoBillOfLadingAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setCShippingAttribute($value)
    {
        $this->attributes['c_shipping'] = ($value == 'on') ? 1 : 0;
    }
    public function getCShippingAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }
    public function setPoOrdersAttribute($value)
    {
        $this->attributes['po_orders'] = ($value == 'on') ? 1 : 0;
    }
    public function getPoOrdersAttribute($value)
    {
        return ($value == 1) ? 'on' : 'off';
    }


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
