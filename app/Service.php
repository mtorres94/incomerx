<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "mst_services";

    protected $fillable = [
        'code', 'name', 'cost_center', 'transit_days', 'mode', 'comments', 'conditions', 'another_lang', 'user_create_id', 'user_update_id', 'user_open_id'
    ];


    public function user()
    {
        return $this->hasOne('Sass\User');
    }

    public function user_open()
    {
        return $this->hasOne('Sass\User'. 'user_open_id');
    }
}
