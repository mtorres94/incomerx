<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "mst_suppliers";

    protected $fillable = [
        'code', 'name', 'address', 'city', 'state_id', 'zip', 'country_id', 'contact_name', 'contact_phone',
        'contact_fax', 'email_contact', 'user_create_id', 'user_update_id',
    ];
}
