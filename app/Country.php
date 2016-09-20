<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "mst_countries";

    protected $fillable = [
        'code', 'name', 'zone', 'comments', 'user_create_id', 'user_update_id',
    ];

    public function getNameAttribute()
    {
        $name = $this->attributes['name'];
        return strtoupper($name);
    }

    public function airports()
    {
        return $this->hasMany('Sass\Airport');
    }

    public function world_locations()
    {
        return $this->hasMany('Sass\WorldLocation');
    }

    public function states()
    {
        return $this->hasMany('Sass\State');
    }

    public function cities() {
        return $this->hasMany('Sass\City');
    }

    public function user()
    {
        return $this->hasOne('Sass\User');
    }
}
