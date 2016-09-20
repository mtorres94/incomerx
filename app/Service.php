<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "mst_services";

    protected $fillable = [
        'code', 'name', 'cost_center', 'transit_days', 'mode', 'comments', 'conditions', 'another_lang', 'user_create_id', 'user_update_id'
    ];
}
