<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class EoCargoLoaderHazardous extends Model
{
    protected $table = "eo_cargo_loader_hazardous";

    protected $fillable = [
        'id', 'created_at', 'updated_at', 'line', 'cargo_loader_id', 'container_id', 'hzd_uns_id', 'hzd_uns_desc', 'hzd_uns_note'
    ];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        DB::table('eo_cargo_loader_hazardous')->where('cargo_loader_id', '=', $id)->delete();
        if (isset($data['hzd_line']) ){

            while($a < count($data['hzd_line'])){
                $i++;
                if (isset($data['hzd_line'][$i])){
                    $obj = new EoCargoLoaderHazardous();
                    $obj->cargo_loader_id = $id;
                    $obj->line=  $data['hzd_line'][$i];
                    $obj->container_id =  $data['hzd_container_id'][$i];
                    $obj->hzd_uns_id =  $data['hzd_uns_id'][$i];
                    $obj->hzd_uns_desc =  $data['hzd_uns_desc'][$i];
                    $obj->hzd_uns_note =  $data['hzd_uns_note'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }

    }

    public static function search($id){
        return self::where('cargo_loader_id', $id)->get();
    }

    public function hzd_uns()
    {
        return $this->belongsTo('Sass\UNsCode', 'hzd_uns_id');
    }

}
