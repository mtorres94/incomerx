<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Incoterm extends Model
{
    protected $table = "mst_incoterms";

    protected $fillable = [
        'code', 'name', 'description', 'user_create_id', 'user_update_id',
    ];

    public function customers()
    {
        return $this->hasMany('Sass\Customer');
    }

    public function user()
    {
        return $this->hasOne('Sass\User');
    }
}
