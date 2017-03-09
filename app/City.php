<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "mst_cities";

    protected $fillable = [
        'code', 'name', 'country_id', 'comments', 'user_create_id', 'user_update_id','user_open_id'
    ];

    public function country() {
        return $this->belongsTo('Sass\Country');
    }
    
    public function user()
    {
        return $this->hasOne('Sass\User');
    }
    public function user_open()
    {
        return $this->hasOne('Sass\User', 'user_open_id');
    }
}
