<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $table = "mst_reasons";

    protected $fillable = [
        'name', 'user_create_id', 'user_update_id',
    ];

    public function user()
    {
        return $this->hasOne('Sass\User');
    }
}
