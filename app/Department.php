<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "mst_departments";

    protected $fillable = [
        'name', 'from', 'code', 'user_create_id', 'user_update_id',
    ];

    public function user()
    {
        return $this->hasOne('Sass\User');
    }
}
