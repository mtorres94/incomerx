<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class OceanPort extends Model
{
    protected $table = "mst_ocean_ports";

    protected $fillable = [
        'id', 'code', 'name', 'port_code', 'country_id', 'pier', 'coordinates', 'schedule_dk_id', 'primary_agent_id', 'second_agent_id',
        'export_air_consolidation_cnt', 'export_air_direct_cnt', 'comments', 'user_create_id', 'user_update_id',
    ];

    public function country()
    {
        return $this->belongsTo('Sass\Country');
    }
}
