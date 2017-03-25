<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EaAirwayBillCargo extends Model
{
    protected $table = "ea_airwaybill_cargo";

    protected $fillable = [
        'pieces', 'unit_weight', 'gross_weight', 'volume_weight', 'rate', 'total', 'rate_class', 'commodity', 'show_rate', 'show_total', 'comments', 'charge_weight', 'airwaybill_id', 'line'
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
                    $obj-> pieces = $data['pieces'][$i];
                    $obj->unit_weight= $data['unit_weight'][$i];
                    $obj->gross_weight= $data['gross_weight'][$i];
                    $obj->volume_weight= $data['volume_weight'][$i];
                    $obj->rate= $data['rate'][$i];
                    $obj->total= $data['total'][$i];
                    $obj->rate_class= $data['rate_class'][$i];
                    $obj->commodity= $data['commodity'][$i];
                    $obj->show_rate= $data['show_rate'][$i];
                    $obj->show_total= $data['show_total'][$i];
                    $obj->comments= $data['comments'][$i];
                    $obj->charge_weight= $data['charge_weight'][$i];
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
            'pieces' => $data['sum_pieces'],
            'gross_weight'=> $data['sum_weight'],
            'volume_weight'=> $data['sum_volume_weight'],
            'charge_weight'=> $data['sum_volume_weight'],
        ];
        EaAirwayBillCargo::create($obj);
    }
}


