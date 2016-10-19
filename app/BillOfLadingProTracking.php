<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class BillOfLadingProTracking extends Model
{
    protected $table = "exp_bill_of_lading_pro_tracking";

    protected $fillable = [
        'id', 'bill_of_lading_id','created_at', 'updated_at','line','pro_number', 'pro_detail', 'pro_remarks' ];

    public static function saveDetail($id, $data) {
        $i= -1; $a=0;
        if (isset($data['pro_line'])){
            $details= DB::table('exp_bill_of_lading_pro_tracking')->where('bill_of_lading_id', '=', $id)->delete();
            while($a < count($data['pro_line'])){
                $i++;
                if (isset($data['pro_line'][$i])){
                    $obj = new BillOfLadingProTracking();

                    $obj->bill_of_lading_id = $id;
                    $obj->line=  $a + 1;
                    $obj-> pro_number = $data['pro_number'][$i];
                    $obj-> pro_detail = $data['pro_detail'][$i];
                    $obj-> pro_remarks = $data['pro_remarks'][$i];

                    $obj->save();
                    $a++;
                }

            }
        }

    }


    public static function Search($id){
        return self::where('bill_of_lading_id', $id)->get();
    }

    public function bill_of_lading()
    {
        return $this->belongsTo('Sass\BillOfLading', 'bill_of_lading_id');
    }
}
