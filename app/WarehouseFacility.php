<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class WarehouseFacility extends Model
{
    protected $table = "mst_warehouse_facilities";

    protected $fillable = [
        'code', 'division_id', 'name', 'address', 'city', 'state_id', 'zip', 'contact_name', 'phone', 'fax', 'location_id', 'user_create_id', 'user_update_id',
    ];

    public function getNameAttribute()
    {
        $name = $this->attributes['name'];
        return strtoupper($name);
    }

    public function division()
    {
        return $this->belongsTo('Sass\Division');
    }

    public function state()
    {
        return $this->belongsTo('Sass\State');
    }

    public function location() {
        return $this->belongsTo('Sass\WorldLocation');
    }
}
