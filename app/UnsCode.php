<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class UnsCode extends Model
{
    protected $table = "mst_uns_codes";

    protected $fillable = [
        'code', 'name', 'pack_group', 'label_code', 'subrisk', 'flashpoint', 'user_create_id', 'user_update_id'
    ];
}
