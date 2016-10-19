<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CargoLoaderContainer extends Model
{
    protected $table = "exp_cargo_loader_container";

    protected $fillable = ['id', 'cargo_loader_id','created_at', 'updated_at','line','equipment_type_id', 'container_number', 'container_seal_number', 'container_seal_number_2','container_order_number','container_hazardous_contact', 'container_hazardous_phone', 'container_comments', 'container_degrees', 'container_temperature', 'container_max', 'container_min', 'cubic_max', 'cubic_load', 'cubic_load_p','cubic_excess', 'pieces_loaded', 'total_weight_unit', 'max_weight', 'container_net_weight', 'weight_load_p', 'weight_excess' ];


    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        if (isset($data['container_line'])){
            $details= DB::table('exp_cargo_loader_container')->where('cargo_loader_id', '=', $id)->delete();
            while($a < count($data['container_line'])){
                $i++;
                if (isset($data['container_line'][$i])){
                    $obj = new CargoLoaderContainer();
                    $obj->cargo_loader_id = $id;
                    $obj->line=  $a + 1;
                    $obj-> equipment_type_id = $data['equipment_type_id'][$i];
                    $obj-> container_number = $data['container_number'][$i];
                    $obj-> container_seal_number = $data['container_seal_number'][$i];
                    $obj-> container_order_number = $data['container_order_number'][$i];
                    $obj-> container_hazardous_contact = $data['container_hazardous_contact'][$i];
                    $obj-> container_hazardous_phone = $data['container_hazardous_phone'][$i];
                    $obj-> container_comments = $data['comments_instructions'][$i];
                    $obj-> container_degrees = $data['hazardous_degrees'][$i];
                    $obj-> container_temperature= $data['hazardous_temperature'][$i];
                    $obj-> container_max= $data['hazardous_max'][$i];
                    $obj-> container_min = $data['hazardous_min'][$i];
                    $obj-> cubic_max = $data['cubic_max'][$i];
                    $obj-> cubic_load = $data['cubic_load'][$i];
                    $obj-> cubic_load_p = $data['cubic_load_p'][$i];
                    $obj-> cubic_excess = $data['cubic_excess'][$i];
                    $obj-> pieces_loaded = $data['pieces_loaded'][$i];
                    $obj-> total_weight_unit = $data['total_weight_unit'][$i];
                    $obj-> max_weight = $data['max_weight'][$i];
                    $obj-> container_net_weight = $data['weight_load'][$i];
                    $obj-> weight_load_p = $data['weight_load_p'][$i];
                    $obj-> weight_excess = $data['weight_excess'][$i];
                    $obj->save();
                    $a++;
                }

            }
        }


    }

    public function equipment_type()
    {
        return $this->belongsTo('Sass\CargoType', 'equipment_type_id');
    }

    public static function Search($id){
        return self::where('cargo_loader_id', $id)->get();
    }

}
