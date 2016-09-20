<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = "mst_units";

    protected $fillable = [
        'abbreviation', 'name', 'user_create_id', 'user_update_id',
    ];

    public function user()
    {
        return $this->hasOne('Sass\User');
    }
}
