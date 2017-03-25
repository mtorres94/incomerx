<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class CarrierContact extends Model
{
    protected $table = "mst_carriers_contacts";

    protected $fillable = [
         'name', 'carrier_id', 'type', 'phone', 'fax', 'email', 'mobile', 'line'
    ];

    public static function saveDetail($id, $data) {
        $i=0; $a=0;
        DB::table('mst_carriers_contacts')->where('carrier_id', '=', $id)->delete();
        if (isset($data['contact_name'])){
            while($a < count($data['contact_name'])) {
                if (isset($data['contact_name'][$i])) {
                    $obj = new CarrierContact();
                    $obj->carrier_id = $id;
                    $obj->line = $a + 1;
                    $obj->name = $data['contact_name'][$i];
                    $obj->type = $data['contact_type'][$i];
                    $obj->phone = $data['contact_phone'][$i];
                    $obj->fax = $data['contact_fax'][$i];
                    $obj->email = $data['contact_email'][$i];
                    $obj->mobile = $data['contact_mobile'][$i];

                    $obj->save();
                    $a++;
                }
                $i++;
            }

        }

    }

    public function user_create()
    {
        return $this->belongsTo('Sass\User', 'user_create_id');
    }


    public function carrier()
    {
        return $this->belongsTo('Sass\Carrier');
    }
}
