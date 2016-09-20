<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    protected $table = 'mst_zip_codes';

    protected $fillable = [
        'code', 'city', 'street_name', 'country_id', 'state_id', 'primary_agent_id', 'second_agent_id', 'route_id', '1st_airport_id', '2nd_airport_id', '3rd_airport_id', 'comments', 'user_create_id', 'user_update_id',
    ];

    //<editor-fold desc="ZipCode Eloquent Relationships">
    public function country()
    {
        return $this->belongsTo('Sass\Country');
    }

    public function state()
    {
        return $this->belongsTo('Sass\State');
    }

    public function primary_agent()
    {
        return $this->belongsTo('Sass\Carrier', 'primary_agent_id');
    }

    public function second_agent()
    {
        return $this->belongsTo('Sass\Carrier', 'second_agent_id');
    }

    public function first_airport()
    {
        return $this->belongsTo('Sass\Airport', '1st_airport_id');
    }

    public function second_airport()
    {
        return $this->belongsTo('Sass\Airport', '2nd_airport_id');
    }

    public function third_airport()
    {
        return $this->belongsTo('Sass\Airport', '3rd_airport_id');
    }
    //</editor-fold>
}
