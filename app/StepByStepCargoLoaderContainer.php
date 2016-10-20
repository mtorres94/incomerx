<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StepByStepCargoLoaderContainer extends Model
{
    protected $table = "exp_cargo_loader_container";

    protected $fillable = ['id', 'cargo_loader_id','created_at', 'updated_at','line','equipment_type_id', 'container_number', 'container_seal_number', 'container_seal_number_2','container_order_number','container_hazardous_contact', 'container_hazardous_phone', 'container_comments', 'container_degrees', 'container_temperature', 'container_max', 'container_min', 'cubic_max', 'cubic_load', 'cubic_load_p','cubic_excess', 'pieces_loaded', 'total_weight_unit', 'max_weight', 'container_net_weight', 'weight_load_p', 'weight_excess' ];




    public function equipment_type()
    {
        return $this->belongsTo('Sass\CargoType', 'equipment_type_id');
    }

    public static function Search($id){
        return self::where('cargo_loader_id', $id)->get();
    }
}
