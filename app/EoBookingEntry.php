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
        $array = [];
        $data = collect(format_array($data))->where('exists', '');
        foreach ($data as $value) {
            $array[] = [
                'code' => $value['booking_code'],
                'shipment_id' => $id,
                'status' => 0,
            ];
        }
        \DB::table('eo_booking_entries')->insert($array);
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
