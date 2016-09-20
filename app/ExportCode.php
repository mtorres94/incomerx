<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class ExportCode extends Model
{
    protected $table = 'mst_export_codes';

    protected $fillable = [
        'code', 'name',
    ];

    public function user()
    {
        return $this->belongsTo('Sass\User');
    }
}
