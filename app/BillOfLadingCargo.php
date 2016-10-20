<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class BillOfLadingCargo extends Model
{
    protected $table = "exp_bill_of_lading_cargo";

    protected $fillable = [
        'id', 'bill_of_lading_id','created_at', 'updated_at','line','cargo_marks', 'cargo_pieces', 'cargo_description', 'cargo_weight_unit', 'cargo_weight_k', 'cargo_cubic_k', 'cargo_charge_weight_k', 'cargo_weight_l', 'cargo_cubic_l', 'cargo_charge_weight_l', 'cargo_rate', 'cargo_amount', 'cargo_container', 'cargo_type_id', 'cargo_commodity_id', 'cargo_comments' ];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        if (isset($data['cargo_line'])){
            $details= DB::table('exp_bill_of_lading_cargo')->where('bill_of_lading_id', '=', $id)->delete();
            while($a < count($data['cargo_line'])){
                $i++;
                if (isset($data['cargo_line'][$i])){
                    $obj = new BillOfLadingCargo();

                    $obj->bill_of_lading_id = $id;
                    $obj->line=  $a + 1;
                    $obj-> cargo_marks = $data['cargo_marks'][$i];
                    $obj->cargo_pieces = $data['cargo_pieces'][$i];
                    $obj->cargo_description = $data['cargo_description'][$i];
                    $obj->cargo_weight_unit = $data['cargo_weight_unit'][$i];
                    $obj->cargo_weight_k = $data['cargo_weight_k'][$i];
                    $obj->cargo_cubic_k = $data['cargo_cubic_k'][$i];
                    $obj->cargo_charge_weight_k = $data['cargo_charge_weight_k'][$i];
                    $obj->cargo_weight_l = $data['cargo_weight_l'][$i];
                    $obj->cargo_cubic_l = $data['cargo_cubic_l'][$i];
                    $obj->cargo_charge_weight_l = $data['cargo_charge_weight_l'][$i];
                    $obj->cargo_rate = $data['cargo_rate'][$i];
                    $obj->cargo_amount = $data['cargo_amount'][$i];
                    $obj->cargo_container = $data['cargo_container'][$i];
                    $obj->cargo_type_id = $data['cargo_type_id'][$i];
                    $obj->cargo_commodity_id = $data['cargo_commodity_id'][$i];
                    $obj->cargo_comments = $data['cargo_comments'][$i];
                    $obj->save();
                    $a++;
                }

            }
        }

    }

    public static function saveDetailStepByStep($id, $data) {
        $i=-1; $a=0;
        if (isset($data['hidden_warehouse_line']) ){
            $details= DB::table('exp_bill_of_lading_cargo')->where('bill_of_lading_id', '=', $id)->delete();
            while($a < count($data['hidden_warehouse_line'])){
                $i++;
                if (isset($data['hidden_warehouse_line'][$i])){
                    $obj = new BillOfLadingCargo();
                    $obj->bill_of_lading_id = $id;
                    $obj->line=  $data['hidden_warehouse_line'][$i];
                    $obj->cargo_description=  $data['hidden_ship_inst_number'][$i];
                    $obj->cargo_marks=  $data['hidden_warehouse_number'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }

    }


    public static function Search($id){
        return self::where('bill_of_lading_id', $id)->get();
    }



    public function cargo_type()
    {
        return $this->belongsTo('Sass\CargoType', 'cargo_type_id');
    }
    public function cargo_commodity()
    {
        return $this->belongsTo('Sass\Commodity', 'cargo_commodity_id');
    }
    public function bill_of_lading()
    {
        return $this->belongsTo('Sass\BillOfLading', 'bill_of_lading_id');
    }

}

