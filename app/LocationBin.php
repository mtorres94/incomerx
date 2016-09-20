<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class LocationBin extends Model
{
    protected $table = "mst_locations_bins";

    protected $fillable = [
        'location_id', 'code', 'name', 'unit_id', 'measurement_unit', 'length', 'width', 'height', 'user_create_id', 'user_update_id',
    ];
}
