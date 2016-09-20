<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
    protected $table = "mst_customer_types";

    protected $fillable = [
        'name', 'quote', 'another_lang', 'user_create_id', 'user_update_id',
    ];

    public function user()
    {
        return $this->hasOne('Sass\User');
    }
}
