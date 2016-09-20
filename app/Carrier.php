<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    protected $table = "mst_carriers";

    protected $fillable = [
        'code', 'name', 'address', 'city', 'state_id', 'zip_code_id', 'vendor_id', 'customer_id', 'type', 'account_number', 'phone', 'fax', 'contact', 'email', 'user_create_id', 'user_update_id'
    ];

    public function state()
    {
        return $this->belongsTo('Sass\State');
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
}
