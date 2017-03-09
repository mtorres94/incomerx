<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = "mst_units";

    protected $fillable = [
        'code', 'name', 'user_create_id', 'user_update_id', 'user_open_id'
    ];

    public function user()
    {
        return $this->hasOne('Sass\User');
    }

    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }

    public function getCodeAttribute() {
        $code = $this->attributes['code'];
        return strtoupper($code);
    }
}
