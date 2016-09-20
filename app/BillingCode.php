<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class BillingCode extends Model
{

    protected $table = 'mst_billing_codes';

    protected $fillable = [
        'id','code', 'name', 'description', 'user_create_id', 'user_update_id',
    ];

    public function user()
    {
        return $this->belongsTo('Sass\User');
    }
}
