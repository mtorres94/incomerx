<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'mst_customers';

    protected $fillable = [
        'code', 'name', 'address', 'city', 'state_id', 'zip_id', 'country_id', 'phone', 'fax', 'duns_code', 'incoterm_id', 'since', 'dps_check', 'status', 'shipper', 'consignee', 'third_party', 'agent', 'currency_id', 'agent_id', 'coloader_id', 'origin_id', 'destination_id', 'user_create_id', 'user_update_id',
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
}
