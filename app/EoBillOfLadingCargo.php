<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class EoBillOfLadingCargo extends Model
{
    protected $table = "eo_bill_of_lading_cargo";

    protected $fillable = [
        'id', 'bill_of_lading_id','created_at', 'updated_at','line','cargo_marks', 'cargo_pieces', 'cargo_description', 'cargo_weight_unit', 'cargo_weight_k', 'cargo_cubic_k', 'cargo_charge_weight_k', 'cargo_weight_l', 'cargo_cubic_l', 'cargo_charge_weight_l', 'cargo_rate', 'cargo_amount', 'cargo_container', 'cargo_type_id', 'cargo_commodity', 'cargo_comments', 'id_line' ];

    public static function saveDetail($id, $data) {
        $i=0; $a=0;
        DB::table('eo_bill_of_lading_cargo')->where('bill_of_lading_id', '=', $id)->delete();
        if (isset($data['cargo_line'])){
            while($a < count($data['cargo_line'])) {
                if (isset($data['cargo_line'][$i])) {
                    $obj = new EoBillOfLadingCargo();
                    $obj->bill_of_lading_id = $id;
                    $obj->line= $a + 1;
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
                    $obj->cargo_commodity= $data['cargo_commodity_name'][$i];
                    $obj->cargo_comments = $data['cargo_comments'][$i];
                    $obj->save();
                    $a++;
                }
                $i++;
            }


        }

    }


    public static function saveDetailHBL($data) {
        $a = 0;
        if (isset($data['warehouse_id'])) {
            if ($data['group_by'] == "1") {
                $group_by = array_distinct($data['shipper_id']);
                $group = $data['shipper_id'];
            } elseif ($data['group_by'] == "2") {
                $group_by = array_distinct($data['consignee_id']);
                $group = $data['consignee_id'];
            } else {
                $group_by = $data['warehouse_select'];
                $group = $data['warehouse_id'];
            }

            if ($data['group_by'] == '3') {
                $description = "";
                $weight = 0;
                $cubic = 0;
                $quantity = 0;
                $bill_of_lading = 0;
                for ($i = 0; $i < count($group); $i++) {
                    if (isset($group_by[$a]) and ($group[$i] == $group_by[$a])) {
                        $description = $description . "\n" . $data['warehouse_code'][$i];
                        $weight = $weight + $data['sum_weight'][$i];
                        $cubic = $cubic + $data['sum_cubic'][$i];
                        $quantity = $quantity + $data['quantity'][$i];
                        $bill_of_lading = $data['hbl_line_id'][$i];
                        $a++;
                    }
                }
                $obj = new EoBillOfLadingCargo();

                $obj->bill_of_lading_id = $bill_of_lading;
                $obj->line = $a + 1;
                $obj->cargo_marks = $data['tmp_container_details'];
                $obj->cargo_pieces = $quantity;
                $obj->cargo_description = $description;
                $obj->cargo_weight_unit = "L";
                $obj->cargo_weight_k = round(($weight * 0.453592), 3);
                $obj->cargo_cubic_k = round(($cubic * 0.453592), 3);
                $obj->cargo_charge_weight_k = round(($weight * 0.453592), 3);
                $obj->cargo_weight_l = $weight;
                $obj->cargo_cubic_l = $cubic;
                $obj->cargo_charge_weight_l = $weight;
                // $obj->id_line = $data['warehouse_id'][$a];
                $obj->save();
                EoBillOfLading::where('id', '=', $bill_of_lading)->update(['total_weight_lbs' => $weight, 'total_cubic_cft' => $cubic, 'total_charge_weight_lbs' => $weight, 'total_weight_kgs' => $weight * 0.453592, 'total_cubic_cbm' => $cubic * 0.453592,'total_charge_weight_kgs' => $weight * 0.453592, 'total_pieces'=> $quantity]);

            } else {
            while ($a < count($group_by)) {
                $description = "";
                $weight = 0;
                $cubic = 0;
                $quantity = 0;
                $bill_of_lading = 0;

                for ($i = 0; $i < count($group); $i++) {
                    if (isset($data['warehouse_id'][$i]) and ($group[$i] == $group_by[$a])) {
                        $description = $description . "\n" . $data['warehouse_code'][$i];
                        $weight = $weight + $data['sum_weight'][$i];
                        $cubic = $cubic + $data['sum_cubic'][$i];
                        $quantity = $quantity + $data['quantity'][$i];
                        $bill_of_lading = $data['hbl_line_id'][$i];
                    }
                }

                $obj = new EoBillOfLadingCargo();

                $obj->bill_of_lading_id = $bill_of_lading;
                $obj->line = $a + 1;
                $obj->cargo_marks = $data['tmp_container_details'];
                $obj->cargo_pieces = $quantity;
                $obj->cargo_description = $description;
                $obj->cargo_weight_unit = "L";
                $obj->cargo_weight_k = $weight * 0.453592;
                $obj->cargo_cubic_k = $cubic * 0.453592;
                $obj->cargo_charge_weight_k = $weight * 0.453592;
                $obj->cargo_weight_l = $weight;
                $obj->cargo_cubic_l = $cubic;
                $obj->cargo_charge_weight_l = $weight;
                // $obj->id_line = $data['warehouse_id'][$a];
                $obj->save();
                $a++;
                EoBillOfLading::where('id', '=', $bill_of_lading)->update(['total_weight_lbs' => $weight, 'total_cubic_cft' => $cubic, 'total_charge_weight_lbs' => $weight, 'total_weight_kgs' => $weight * 0.453592, 'total_cubic_cbm' => $cubic * 0.453592,'total_charge_weight_kgs' => $weight * 0.453592, 'total_pieces'=> $quantity]);
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

    public function bill_of_lading()
    {
        return $this->belongsTo('Sass\EoBillOfLading', 'bill_of_lading_id');
    }

}

