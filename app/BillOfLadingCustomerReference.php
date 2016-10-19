<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BillOfLadingCustomerReference extends Model
{
    protected $table = "exp_bill_of_lading_customer_references";

    protected $fillable = [
        'id', 'bill_of_lading_id','created_at', 'updated_at','line','po_number','po_detail', 'po_project', 'po_remarks' ];

    public static function saveDetail($id, $data) {
        $i=-1 ; $a=0;
        if (isset($data['po_line'])){
            $details= DB::table('exp_bill_of_lading_customer_references')->where('bill_of_lading_id', '=', $id)->delete();
            while($a < count($data['po_line'])){
                $i++;
                if (isset($data['po_line'][$i])){
                    $obj = new BillOfLadingCustomerReference();
                    $obj->bill_of_lading_id = $id;
                    $obj->line=  $a + 1;
                    $obj-> po_number = $data['po_number'][$i];
                    $obj-> po_detail = $data['po_detail'][$i];
                    $obj-> po_project = $data['po_project'][$i];
                    $obj-> po_remarks = $data['po_remarks'][$i];
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
