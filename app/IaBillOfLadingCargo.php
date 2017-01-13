<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IaBillOfLadingCargo extends Model
{
    protected $table = "ia_bill_of_lading_cargo";

    protected $fillable = [
        'id', 'created_at', 'updated_at', 'line', 'bill_of_lading_id', 'container', 'cargo_type_id', 'weight_unit', 'grossw', 'cubic', 'description', 'marks', 'pieces', 'comments', 'charge_weight', 'rate', 'amount'
    ];
public $timestamps= false;
    public static function saveDetail($id, $data) {
        $i=0; $a=0;
        DB::table('ia_bill_of_lading_cargo')->where('bill_of_lading_id', '=', $id)->delete();
        if (isset($data['cargo_id']) ){
            while($a < count($data['cargo_id'])){
                if (isset($data['cargo_id'][$i])){
                    $obj = new IaBillOfLadingCargo();
                    $obj->bill_of_lading_id = $id;
                    $obj->line=  $a + 1;
                    $obj->container=  $data['cargo_container'][$i];
                    $obj->cargo_type_id=  $data['cargo_type_id'][$i];

                    $obj->weight_unit=  $data['cargo_weight_unit'][$i];
                    $obj->grossw=  $data['cargo_grossw'][$i];
                    $obj->cubic=  $data['cargo_cubic'][$i];
                    $obj->description=  $data['cargo_description'][$i];
                    $obj->marks=  $data['cargo_marks'][$i];
                    $obj->pieces=  $data['cargo_pieces'][$i];
                    $obj->comments=  $data['cargo_comments'][$i];
                    $obj->charge_weight=  $data['cargo_charge_weight'][$i];
                    $obj->rate=  $data['cargo_rate'][$i];
                    $obj->amount=  $data['cargo_amount'][$i];
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
