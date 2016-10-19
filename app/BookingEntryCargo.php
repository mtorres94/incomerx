<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BookingEntryCargo extends Model
{
    protected $table = "exp_booking_entries_cargo";

    protected $fillable = [
        'id', 'created_at', 'updated_at', 'line', 'booking_entry_id', 'cargo_container', 'cargo_type_id', 'cargo_commodity_id', 'cargo_weight_unit', 'cargo_grossw', 'cargo_cubic', 'cargo_description', 'cargo_marks', 'cargo_pieces', 'cargo_comments'
    ];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        if (isset($data['cargo_line']) ){
            $details= DB::table('exp_booking_entries_cargo')->where('booking_entry_id', '=', $id)->delete();
            while($a < count($data['cargo_line'])){
                $i++;
                if (isset($data['cargo_line'][$i])){
                    $obj = new BookingEntryCargo();
                    $obj->booking_entry_id = $id;
                    $obj->line=  $data['cargo_line'][$i];
                    $obj->cargo_container=  $data['cargo_container'][$i];
                    $obj->cargo_type_id=  $data['cargo_type_id'][$i];
                    $obj->cargo_commodity_id=  $data['cargo_commodity_id'][$i];
                    $obj->cargo_weight_unit=  $data['cargo_weight_unit'][$i];
                    $obj->cargo_grossw=  $data['cargo_grossw'][$i];
                    $obj->cargo_cubic=  $data['cargo_cubic'][$i];
                    $obj->cargo_description=  $data['cargo_description'][$i];
                    $obj->cargo_marks=  $data['cargo_marks'][$i];
                    $obj->cargo_pieces=  $data['cargo_pieces'][$i];
                    $obj->cargo_comments=  $data['cargo_comments'][$i];

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

    public function cargo_type()
    {
        return $this->belongsTo('Sass\CargoType', 'cargo_type_id');
    }

    public function cargo_commodity()
    {
        return $this->belongsTo('Sass\Commodity', 'cargo_commodity_id');
    }
}
