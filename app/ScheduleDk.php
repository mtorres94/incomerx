<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class ScheduleDk extends Model
{
    protected $table = 'mst_schedule_dks';

    protected $fillable = [
        'code', 'name', 'user_create_id', 'user_update_id','user_open_id'
    ];

    public function user()
    {
        $this->belongsTo('Sass\User');
    }

    public function user_open()
    {
        $this->belongsTo('Sass\User', 'user_open_id');
    }
}
