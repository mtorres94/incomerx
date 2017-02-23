<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class BlComment extends Model
{
    protected $table = "mst_bl_comments";

    protected $fillable = [
        'comment', 'user_create_id', 'user_update_id'
    ];

}
