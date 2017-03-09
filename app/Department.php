<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "mst_departments";

    protected $fillable = [
        'name', 'from', 'code', 'user_create_id', 'user_update_id','user_open_id', 'contact'
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
