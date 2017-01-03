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
       /* elseif(isset($data['container_line'])){

            //Step by Step - MBL Cargo *
            //============================================
            $details= DB::table('eo_bill_of_lading_cargo')->where('bill_of_lading_id', '=', $id)->delete();
            while($a < count($data['container_line'])) {
                $i++;
                if (isset($data['container_line'][$i])) {
                    $weight_l= ($data['total_weight'])* 2.2;
                    $cubic_l= ($data['total_cubic']) * 2.2;
                    $obj = new EoBillOfLadingCargo();
                    $obj->line= $i;
                    $obj-> cargo_marks = $data['container_number'];
                    $obj->cargo_pieces = $data['total_quantity'];
                    $obj->cargo_description = $data['cargo_description'];
                    $obj->cargo_weight_unit = $data['total_weight_unit_measurement'];
                    $obj->cargo_weight_k = $data['total_weight'];
                    $obj->cargo_cubic_k = $data['total_cubic'];
                    $obj->cargo_charge_weight_k = $data['total_weight'];
                    $obj->cargo_weight_l = $weight_l;
                    $obj->cargo_cubic_l = $cubic_l;
                    $obj->cargo_charge_weight_l =$weight_l;
                    $obj->cargo_type_id = $data['total_cargo_type_id'];
                    $obj->cargo_commodity_id = $data['total_commodity_id'];
                    $obj->save();
                    $a++;
                }
            }

            //============================================
        }*/

    }

    public static function saveDetailHBL($data) {
        $i=-1; $a=0;
        if (isset($data['resume_line'])){
           // $details= DB::table('exp_bill_of_lading_cargo')->where('bill_of_lading_id', '=', $id)->delete();
            while($a < count($data['resume_line'])){
                $i++;
                if (isset($data['resume_line'][$i])){
                    $weight_k = ($data['resume_gross_weight'][$i]) * 0.453592;
                    $cubic_k = ($data['resume_cubic'][$i]) * 0.453592;
                    $obj = new EoBillOfLadingCargo();

                    $obj->bill_of_lading_id = $data['inserted_id'][$i];
                    $obj->line= $data['resume_line'][$i];
                    $obj-> cargo_marks = $data['resume_marks'][$i];
                    $obj->cargo_pieces = $data['resume_pieces'][$i];
                    $obj->cargo_description = $data['resume_description'][$i];
                    $obj->cargo_weight_unit = $data['resume_weight_unit'][$i];
                    $obj->cargo_weight_k = $weight_k;
                    $obj->cargo_cubic_k = $cubic_k;
                    $obj->cargo_weight_l = $data['resume_gross_weight'][$i];
                    $obj->cargo_cubic_l =$data['resume_cubic'][$i];
                    $obj->cargo_charge_weight_l = $data['resume_charge_weight'][$i];
                    $obj->cargo_charge_weight_k = $weight_k;

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
        return $this->belongsTo('Sass\EoBillOfLading', 'bill_of_lading_id');
    }

}

