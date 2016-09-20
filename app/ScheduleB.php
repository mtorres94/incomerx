<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class ScheduleB extends Model
{
    protected $table = 'mst_schedule_bs';

    protected $fillable = [
        'id','code', 'name', 'user_create_id', 'user_update_id',
    ];

    public function user()
    {
        $this->belongsTo('Sass\User');
    }
}
