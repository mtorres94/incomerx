<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IaBillOfLadingCargo extends Model
{
    protected $table = "ia_bill_of_lading_cargo";

    protected $fillable = [
        'id', 'created_at', 'updated_at', 'line', 'bill_of_lading_id', 'container', 'cargo_type_id', 'cargo_weight_unit', 'cargo_gross_weight', 'cargo_cubic', 'cargo_description', 'cargo_marks', 'cargo_pieces', 'cargo_comments', 'cargo_charge_weight', 'cargo_rate', 'cargo_amount'
    ];
public $timestamps= false;
    public static function saveDetail($id, $data) {
        $i=0; $a=0;
        DB::table('ia_bill_of_lading_cargo')->where('bill_of_lading_id', '=', $id)->delete();
        if (isset($data['cargo_line']) ){
            while($a < count($data['cargo_line'])){
                if (isset($data['cargo_line'][$i])){
                    $obj = new IaBillOfLadingCargo();
                    $obj->bill_of_lading_id = $id;
                    $obj->line=  $a + 1;
                    $obj->container=  $data['cargo_container'][$i];
                    $obj->cargo_type_id=  $data['cargo_type_id'][$i];

                    $obj->cargo_weight_unit=  $data['cargo_weight_unit'][$i];
                    $obj->cargo_gross_weight=  $data['cargo_gross_weight'][$i];
                    $obj->cargo_cubic=  $data['cargo_cubic'][$i];
                    $obj->cargo_description=  $data['cargo_description'][$i];
                    $obj->cargo_marks=  $data['cargo_marks'][$i];
                    $obj->cargo_pieces=  $data['cargo_pieces'][$i];
                    $obj->cargo_comments=  $data['cargo_comments'][$i];
                    $obj->cargo_charge_weight=  $data['cargo_charge_weight'][$i];
                    $obj->cargo_rate=  $data['cargo_rate'][$i];
                    $obj->cargo_amount=  $data['cargo_amount'][$i];
                    $obj->save();
                    $a++;
                }
                $i++;
            }
        }
    }

    public static function search($id){
        return self::where('bill_of_lading_id', $id)->get();
    }


    public function cargo_type()
    {
        return $this->belongsTo('Sass\CargoType', 'cargo_type_id');
    }

    public function cargo_commodity()
    {
        return $this->belongsTo('Sass\Commodity', 'commodity_id');
    }
}
