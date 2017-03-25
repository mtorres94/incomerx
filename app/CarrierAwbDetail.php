<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CarrierAwbDetail extends Model
{
    protected $table = "mst_carriers_awb_details";

    protected $fillable = [
        'carrier_id', 'line', 'awb_number', 'sequence_type', 'awb_type', 'awb_status', 'agent_id', 'division_id'
    ];

    public static function saveDetail($id, $data) {
        $i=0; $a=0;
        DB::table('mst_carriers_awb_details')->where('carrier_id', '=', $id)->where('awb_status', '1')->delete();
        if (isset($data['line'])){
            while($a < count($data['line'])) {
                if (isset($data['line'][$i]) and $data['status'][$i] == '1') {
                    $obj = new CarrierAwbDetail();
                    $obj->carrier_id = $id;
                    $obj->line = $a + 1;
                    $obj->awb_number = $data['awb_number'][$i];
                    $obj->sequence_type = $data['sequence_type'][$i];
                    $obj->awb_type = $data['awb_type'][$i];
                    $obj->awb_status = $data['status'][$i];
                    $obj->agent_id = $data['agent_id'][$i];
                    $obj->division_id = $data['division_id'][$i];

                    $obj->save();
                    $a++;
                }
                $i++;
            }

        }

    }

      public function agent()
    {
        return $this->belongsTo('Sass\Customer', 'agent_id');
    }

    public function division()
    {
        return $this->belongsTo('Sass\Division', 'division_id');
    }
}
