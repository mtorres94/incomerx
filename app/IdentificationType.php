<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class IdentificationType extends Model
{
    protected $table = "mst_identification_types";

    protected $fillable = [
        'abbreviation', 'name', 'user_create_id', 'user_update_id',
    ];

    public function user()
    {
        return $this->hasOne('Sass\User');
    }
}
