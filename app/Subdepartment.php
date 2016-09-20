<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Subdepartment extends Model
{
    protected $table = "mst_subdepartments";

    protected $fillable = [
        'name', 'user_create_id', 'user_update_id',
    ];

    public function user()
    {
        return $this->hasOne('Sass\User');
    }
}
