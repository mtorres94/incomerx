<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    protected $table = "mst_carriers";

    protected $fillable = [
        'code', 'name', 'address', 'city', 'state_id', 'zip_code_id', 'vendor_id', 'customer_id', 'type', 'account_number', 'phone', 'fax', 'contact', 'email', 'user_create_id', 'user_update_id', 'user_open_id', 'country_id'
    ];

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

    public function vendor()
    {
        return $this->belongsTo('Sass\Vendor');
    }

    public function customer()
    {
        return $this->belongsTo('Sass\Customer');
    }

    public function contacts()
    {
        return $this->hasMany('Sass\CarrierContact');
    }

    public function awb_number()
    {
        return $this->hasMany('Sass\CarrierAwbDetail');
    }
    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }

}
