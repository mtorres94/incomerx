<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class WorldLocation extends Model
{
    protected $table = "mst_world_locations";

    protected $fillable = [
        'code', 'name', 'latitude', 'longitude', 'scheduledk_id', 'country_id', 'city', 'state_id', 'comments', 'ocean_port', 'airport', 'inland_port', 'border_crossing', 'rail_terminal', 'road_terminal', 'multimodal', 'fix_transportation', 'post_office', 'city_', 'place', 'user_create_id', 'user_update_id','user_open_id'
    ];

    public function country()
    {
        return $this->belongsTo('Sass\Country');
    }

    public function scheduled()
    {
        return $this->belongsTo('Sass\Scheduled');
    }

    public function user()
    {
        return $this->belongsTo('Sass\User');
    }
    public function user_open()
    {
        return $this->belongsTo('Sass\User', 'user_open_id');
    }
}
