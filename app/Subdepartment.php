<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Subdepartment extends Model
{
    protected $table = "mst_subdepartments";

    protected $fillable = [
        'name', 'user_create_id', 'user_update_id','user_open_id'
    ];

    public function user()
    {
        return $this->hasOne('Sass\User');
    }

    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }
}
