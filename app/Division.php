<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = "mst_divisions";

    protected $fillable = [
        'code', 'name', 'address', 'city', 'state_id', 'zip', 'phone', 'fax', 'log_counter', 'payment_id', 'comments', 'user_create_id', 'user_update_id',
    ];

    public function getNameAttribute()
    {
        $name = $this->attributes['name'];
        return strtoupper($name);
    }

    public function state()
    {
        return $this->belongsTo('Sass\State');
    }

    public function payment()
    {
        return $this->belongsTo('Sass\PaymentTerm');
    }

    public function user()
    {
        return $this->belongsTo('Sass\User');
    }
}
