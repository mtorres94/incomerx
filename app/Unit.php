<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = "mst_units";

    protected $fillable = [
        'code', 'name', 'user_create_id', 'user_update_id',
    ];

    public function user()
    {
        return $this->hasOne('Sass\User');
    }

    public function getCodeAttribute() {
        $code = $this->attributes['code'];
        return strtoupper($code);
    }
}
