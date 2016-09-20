<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = "mst_vendors";

    protected $fillable = [
        'code', 'name', 'address', 'city', 'state_id', 'zip_code_id', 'country_id', 'phone', 'fax', 'mobile',
        'since', 'currency_id', 'airline', 'ocean_carrier', 'truck', 'agent', 'other', 'status', 'contact_name',
        'email_contact', 'user_create_id', 'user_update_id',
    ];

    public function state()
    {
        return $this->belongsTo('Sass\State');
    }
}
