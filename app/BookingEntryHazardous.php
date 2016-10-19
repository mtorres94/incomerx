<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class BookingEntryHazardous extends Model
{
    protected $table = "exp_booking_entries_hazardous_details";

    protected $fillable = [
        'id', 'created_at', 'updated_at', 'line', 'booking_entry_id', 'container_id', 'hzd_uns_id', 'hzd_uns_desc', 'hzd_uns_note'
    ];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        if (isset($data['hzd_line']) ){
            $details= DB::table('exp_booking_entries_hazardous_details')->where('booking_entry_id', '=', $id)->delete();
            while($a < count($data['hzd_line'])){
                $i++;
                if (isset($data['hzd_line'][$i])){
                    $obj = new BookingEntryHazardous();
                    $obj->booking_entry_id = $id;
                    $obj->line=  $data['hzd_line'][$i];
                    $obj->container_id =  $data['hzd_container_id'][$i];
                    $obj->hzd_uns_id =  $data['hzd_uns_id'][$i];
                    $obj->hzd_uns_desc =  $data['hzd_uns_desc'][$i];
                    $obj->hzd_uns_note =  $data['hzd_uns_note'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }

    }

    public static function search($id){
        return self::where('booking_entry_id', $id)->get();
    }
    public function booking_entry()
    {
        return $this->belongsTo('Sass\BookingEntry', 'booking_entry_id');
    }

    public function hzd_uns()
    {
        return $this->belongsTo('Sass\UNsCode', 'hzd_uns_id');
    }

}
