<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = 'mst_airports';

    protected $fillable = [
        'code', 'name', 'country_id', 'type', 'zip', 'scheduled_id', 'user_create_id', 'user_update_id',
    ];

    public function country()
    {
        return $this->belongsTo('Sass\Country');
    }

    public function scheduled()
    {
        return $this->belongsTo('Sass\Scheduled');
    }
}
