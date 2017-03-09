<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class VendorType extends Model
{
    protected $table = "mst_vendor_types";

    protected $fillable = [
        'id', 'code', 'name','user_open_id'
    ];
    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }

}
