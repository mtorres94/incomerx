<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EaAirwayBillCargo extends Model
{
    protected $table = "ea_airwaybill_cargo";

    protected $fillable = [
        'cargo_pieces', 'cargo_weight_unit', 'cargo_gross_weight', 'cargo_volume_weight', 'cargo_rate', 'cargo_total', 'cargo_rate_class', 'cargo_commodity', 'cargo_show_rate', 'cargo_show_total', 'cargo_comments', 'cargo_charge_weight', 'airwaybill_id', 'line'
    ];
    public $timestamps= false;

    public static function saveDetail($id, $data){
        $i=0; $a=0;
        DB::table('ea_airwaybill_cargo')->where('airwaybill_id', '=', $id)->delete();
        if (isset($data['cargo_line'])){
            while($a < count($data['cargo_line'])) {
                if (isset($data['cargo_line'][$i])) {
                    $obj = new EaAirwayBillCargo();
                    $obj->airwaybill_id = $id;
                    $obj->line = $a + 1;
                    $obj->cargo_pieces = $data['cargo_pieces'][$i];
                    $obj->cargo_weight_unit= $data['cargo_weight_unit'][$i];
                    $obj->cargo_gross_weight= $data['cargo_gross_weight'][$i];
                    $obj->cargo_volume_weight= $data['cargo_volume_weight'][$i];
                    $obj->cargo_rate= $data['cargo_rate'][$i];
                    $obj->cargo_total= $data['cargo_total'][$i];
                    $obj->cargo_rate_class= $data['cargo_rate_class'][$i];
                    $obj->cargo_commodity= $data['cargo_commodity'][$i];
                    $obj->cargo_show_rate= $data['cargo_show_rate'][$i];
                    $obj->cargo_show_total= $data['cargo_show_total'][$i];
                    $obj->cargo_comments= $data['cargo_comments'][$i];
                    $obj->cargo_charge_weight= $data['cargo_charge_weight'][$i];
                    $obj->save();
                    $a++;
                }
                $i++;
            }
        }
    }

    public static function saveDetailAwb($id, $data){
        $obj= [
            'airwaybill_id' => $id,
            'line' => '1',
            'cargo_pieces' => $data['total_pieces'],
            'cargo_gross_weight'=> $data['total_gross_weight'],
            'cargo_volume_weight'=> $data['total_volume_weight'],
            'cargo_charge_weight'=> $data['total_gross_weight'],
        ];
        EaAirwayBillCargo::create($obj);
    }
}


