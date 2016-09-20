<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class VendorType extends Model
{
    protected $table = "mst_vendor_types";

    protected $fillable = [
        'id', 'code', 'name',
    ];
}
