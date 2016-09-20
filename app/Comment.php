<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "mst_comments";

    protected $fillable = [
        'name', 'user_create_id', 'user_update_id',
    ];

    public function user()
    {
        return $this->hasOne('Sass\User');
    }
}
