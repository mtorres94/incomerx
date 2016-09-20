<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    protected $table = "mst_contact_types";

    protected $fillable = [
        'name', 'user_create_id', 'user_update_id',
    ];

    public function user()
    {
        return $this->hasOne('Sass\User');
    }
}
