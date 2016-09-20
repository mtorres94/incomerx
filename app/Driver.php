<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = "mst_drivers";

    protected $fillable = [
        'code', 'name', 'phone', 'email', 'driver_license', 'license_expiration', 'license_country_id', 'insurance', 'insurance_expiration', 'radio_license', 'passport', 'passport_country_id', 'vendor_id', 'status', 'comments', 'user_create_id', 'user_update_id'
    ];

    public function license_country()
    {
        return $this->belongsTo('Sass\Country', 'license_country_id');
    }

    public function passport_country()
    {
        return $this->belongsTo('Sass\Country', 'passport_country_id');
    }

    public function vendor()
    {
        return $this->belongsTo('Sass\Vendor');
    }
}
