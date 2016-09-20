<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = "mst_states";

    protected $fillable = [
        'code', 'name', 'country_id', 'tax', 'additional_tax', 'comments', 'user_create_id', 'user_update_id',
    ];

    public function getNameAttribute()
    {
        $name = $this->attributes['name'];
        return strtoupper($name);
    }
    
    public function country() {
        return $this->belongsTo('Sass\Country');
    }

    public function user()
    {
        return $this->hasOne('Sass\User');
    }

    public function divisions()
    {
        return $this->hasMany('Sass\Division');
    }
}
