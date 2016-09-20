<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class HarmonizedCode extends Model
{
    protected $table = 'mst_harmonized_codes';

    protected $fillable = [
        'id','code','hs_type', 'name', 'unit','user_create_id', 'user_update_id',
    ];

    public function user()
    {
        return $this->belongsTo('Sass\User');
    }
}
