<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class LicenseType extends Model
{
    protected $table = 'mst_license_types';

    protected $fillable = [
        'code', 'name',
    ];

    public function user()
    {
        return $this->belongsTo('Sass\User');
    }
}
