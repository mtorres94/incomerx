<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = "mst_vendors";

    protected $fillable = [
        'code', 'name', 'address', 'city', 'state_id', 'zip_code_id', 'country_id', 'phone', 'fax', 'mobile',
        'since', 'currency_id', 'airline', 'ocean_carrier', 'truck', 'agent', 'other', 'status', 'contact_name',
        'email_contact', 'user_create_id', 'user_update_id', 'user_open_id',
    ];

    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }

    public function state()
    {
        return $this->belongsTo('Sass\State');
    }

    public function setAirlineAttribute($value)
    {
        $this->attributes['airline'] = ($value == 'on') ? 1 : 0;
    }

    public function setOceanCarrierAttribute($value)
    {
        $this->attributes['ocean_carrier'] = ($value == 'on') ? 1 : 0;
    }

    public function setTruckAttribute($value)
    {
        $this->attributes['truck'] = ($value == 'on') ? 1 : 0;
    }

    public function setAgentAttribute($value)
    {
        $this->attributes['agent'] = ($value == 'on') ? 1 : 0;
    }

    public function setOtherAttribute($value)
    {
        $this->attributes['other'] = ($value == 'on') ? 1 : 0;
    }

    public function getAirlineAttribute($value)
    {
        return ($value == 1) ? 'yes' : 'no';
    }

    public function getOceanCarrierAttribute($value)
    {
        return ($value == 1) ? 'yes' : 'no';
    }

    public function getTruckAttribute($value)
    {
        return ($value == 1) ? 'yes' : 'no';
    }

    public function getAgentAttribute($value)
    {
        return ($value == 1) ? 'yes' : 'no';
    }

    public function getOtherAttribute($value)
    {
        return ($value == 1) ? 'yes' : 'no';
    }
}
