<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BillOfLadingHazardous extends Model
{
    protected $table = "exp_bill_of_lading_hazardous_details";

    protected $fillable = [
        'id', 'bill_of_lading_id','created_at', 'updated_at','line','container_id', 'hzd_uns_id', 'hzd_uns_desc', 'hzd_uns_note'];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        if (isset($data['hzd_line'])){
            $details= DB::table('exp_bill_of_lading_hazardous_details')->where('bill_of_lading_id', '=', $id)->delete();
            while($a < count($data['hzd_line'])){
                $i++;
                if (isset($data['hzd_line'][$i])){
                    $obj = new BillOfLadingHazardous();

                    $obj->bill_of_lading_id = $id;
                    $obj->line=  $a + 1;
                    $obj-> container_id = $data['hzd_container_id'][$i];
                    $obj-> hzd_uns_id = $data['hzd_uns_id'][$i];
                    $obj-> hzd_uns_desc = $data['hzd_uns_desc'][$i];
                    $obj-> hzd_uns_note = $data['hzd_uns_note'][$i];
                    $obj->save();
                    $a++;
                }

            }
        }

    }


    public static function Search($id){
        return self::where('bill_of_lading_id', $id)->get();
    }

    public function hzd_uns()
    {
        return $this->belongsTo('Sass\UnsCode', 'hzd_uns_id');
    }

    public function bill_of_lading()
    {
        return $this->belongsTo('Sass\BillOfLading', 'bill_of_lading_id');
    }
}
