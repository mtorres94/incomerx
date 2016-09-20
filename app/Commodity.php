<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $table = "mst_commodities";

    protected $fillable = [
        'name', 'comments', 'user_create_id', 'user_update_id',
    ];

    public function user()
    {
        return $this->hasOne('Sass\User');
    }
}
