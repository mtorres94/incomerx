<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Adjustment extends Model
{
    protected $table = "mst_adjustments";

    protected $fillable = [
        'name', 'user_create_id', 'user_update_id',
    ];

    public function user()
    {
        return $this->hasOne('Sass\User');
    }
}
