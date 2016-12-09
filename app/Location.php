<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = "mst_locations";

    protected $fillable = [
        'code', 'name', 'free_days', 'warehouse_id', 'user_create_id', 'user_update_id',
    ];

    public function warehouse() {
        return $this->belongsTo('Sass\WarehouseFacility');
    }
    public function getCodeAttribute() {
        $code = $this->attributes['code'];
        return strtoupper($code);
    }
}
