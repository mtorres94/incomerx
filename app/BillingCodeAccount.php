<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BillingCodeAccount extends Model
{
    protected $table = 'mst_billing_code_accounts';

    protected $fillable = [
        'id','general_id', 'type', 'state_id', 'description', 'currency_id', 'line'
    ];
    public $timestamps=false;

    public function currency()
    {
        return $this->belongsTo('Sass\Currency', 'currency_id');
    }
    public function state()
    {
        return $this->belongsTo('Sass\State', 'state_id');
    }
    public function general()
    {
        return $this->belongsTo('Sass\GeneralLedgerAccount', 'general_id');
    }

    public static function saveDetail($id, $data){
        $i=0; $a=0;
        if (isset($data['general_line']) ) {
            DB::table('mst_billing_code_accounts')->where('billing_id', '=', $id)->delete();
            while ($a < count($data['general_line'])) {
                if (isset($data['general_line'][$i])) {
                    $obj = new BillingCodeAccount();
                    $obj->billing_id = $id;
                    $obj->line = $a + 1;
                    $obj->type = $data['type'][$i];
                    $obj->state_id = $data['state_id'][$i];
                    $obj->description = $data['descriptions'][$i];
                    $obj->currency_id = $data['currency_id'][$i];
                    $obj->save();
                    $a++;
                }
                $i++;
            }
        }
    }


}
