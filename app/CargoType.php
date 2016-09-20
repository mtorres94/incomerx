<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;

class CargoType extends Model
{
    protected $table = "mst_cargo_types";

    protected $fillable = [
        'code', 'name', 'mode', 'measurement_unit', 'dim_fact', 'weight', 'max_weight', 'length', 'width', 'height', 'edi_code', 'scheduleb_id', 'user_create_id', 'user_update_id',
    ];

    public function getCodeAttribute() {
        $code = $this->attributes['code'];
        return strtoupper($code);
    }
}
