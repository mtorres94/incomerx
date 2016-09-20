<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    protected $table = "mst_business_types";

    protected $fillable = [
        'business_type', 'name', 'user_create_id', 'user_update_id',
    ];

    public function user()
    {
        return $this->hasOne('Sass\User');
    }
}
