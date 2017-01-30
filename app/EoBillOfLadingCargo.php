<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class EoBillOfLadingCargo extends Model
{
    protected $table = "eo_bill_of_lading_cargo";

    protected $fillable = [
        'id', 'bill_of_lading_id','created_at', 'updated_at','line','cargo_marks', 'cargo_pieces', 'cargo_description', 'cargo_weight_unit', 'cargo_weight_k', 'cargo_cubic_k', 'cargo_charge_weight_k', 'cargo_weight_l', 'cargo_cubic_l', 'cargo_charge_weight_l', 'cargo_rate', 'cargo_amount', 'cargo_container', 'cargo_type_id', 'cargo_commodity_id', 'cargo_comments' ];

    public static function saveDetail($id, $data) {
        $i=0; $a=0;
        DB::table('eo_bill_of_lading_cargo')->where('bill_of_lading_id', '=', $id)->delete();
        if (isset($data['cargo_marks'])){

            while($a < count($data['cargo_line'])){

                if (isset($data['cargo_line'][$i])){
                    $obj = new EoBillOfLadingCargo();

                    $obj->bill_of_lading_id = $id;
                    $obj->line= $a+1;
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
                $i++;
            }
        }
    }

    public static function saveDetailHBL($data) {
        $i = 0; $a = 0;
        if (isset($data['hidden_warehouse_line'])){
           //DB::table('exp_bill_of_lading_cargo')->where('bill_of_lading_id', '=', $id)->delete();
            while($a < count($data['hidden_warehouse_line'])){
                if (isset($data['hidden_warehouse_line'][$i])){
                    $weight_k = ($data['hidden_sum_weight'][$i]) * 0.453592;
                    $cubic_k = ($data['hidden_sum_cubic'][$i]) * 0.453592;
                    $obj = new EoBillOfLadingCargo();

                    $obj->bill_of_lading_id = $data['hbl_line_id'][$i];
                    $obj->line= $a + 1;
                    $obj-> cargo_marks =  $data['hidden_warehouse_number'][$i];
                    $obj->cargo_pieces = $data['hidden_sum_pieces'][$i];
                    $obj->cargo_description =  "SHIPPER: ".$data['hidden_shipper_name'][$i]." - CONSIGNEE: ". $data['hidden_consignee_name'][$i];
                    $obj->cargo_weight_unit = "L";
                    $obj->cargo_weight_k = $weight_k;
                    $obj->cargo_cubic_k = $cubic_k;
                    $obj->cargo_weight_l = $data['hidden_sum_weight'][$i];
                    $obj->cargo_cubic_l =$data['hidden_sum_cubic'][$i];
                    $obj->cargo_charge_weight_l = $data['hidden_sum_weight'][$i];
                    $obj->cargo_charge_weight_k = $weight_k;

                    $obj->save();
                    $a++;
                }
                $i++;
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
        return $this->belongsTo('Sass\EoBillOfLading', 'bill_of_lading_id');
    }

}

