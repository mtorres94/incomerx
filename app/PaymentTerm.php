<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class PaymentTerm extends Model
{
    protected $table = "mst_payment_terms";

    protected $fillable = [
        'abbreviation', 'name', 'net_days', 'discount', 'user_create_id', 'user_update_id',
    ];

    public function getNameAttribute()
    {
        $name = $this->attributes['name'];
        return strtoupper($name);
    }

    public function user()
    {
        return $this->hasOne('Sass\User');
    }
}
