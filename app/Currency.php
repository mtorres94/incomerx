<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'mst_currencies';

    protected $fillable = [
        'code', 'name', 'country_id', 'user_create_id', 'user_update_id',
    ];

    public function getCodeAttribute()
    {
        $code = $this->attributes['code'];
        return strtoupper($code);
    }

    public function country()
    {
        $this->belongsTo('Sass\Country');
    }

    public function user()
    {
        return $this->belongsTo('Sass\User');
    }
}
