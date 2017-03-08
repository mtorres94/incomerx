<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EoBookingEntry extends Model
{
    protected $table = "eo_booking_entries";

    protected $fillable = [
        'id', 'code', 'shipment_id', 'status', 'cargo_loader_id'];
    public $timestamps= false;

    public static function saveDetail($id, $data)
    {
        $i=0; $a=0;
        DB::table('eo_booking_entries')->where('shipment_id', '=', $id)->delete();
        if (isset($data['line'])) {
            while ($a < count($data['line'])) {
                if (isset($data['line'][$i])) {
                    $obj = new EoBookingEntry();
                    $obj->code = $data['booking_code'][$i];
                    $obj->shipment_id = $id;
                    $obj->status = 0;
                    $obj->save();
                    $a++;
                }
                $i++;
            }
        }

    }
    public static function updateBooking($id, $data)
    {
        if($data['booking_id'] > 0 ){
            DB::table('eo_booking_entries')->where('cargo_loader_id', '=', $id)->update(['cargo_loader_id'=> 0, 'status'=> 0]);
            DB::table('eo_booking_entries')->where('id', '=', $data['booking_id'])->update(['cargo_loader_id'=> $id, 'status'=> 1]);
        }
    }

    public function container()
    {
        return $this->hasMany('Sass\EoBookingContainer', 'booking_id');
    }

    public function hazardous()
    {
        return $this->hasMany('Sass\EoBookingHazardous', 'booking_id');
    }

}
