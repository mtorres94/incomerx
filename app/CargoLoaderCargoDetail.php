<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CargoLoaderCargoDetail extends Model
{
    protected $table = 'exp_cargo_loader_cargo_details';

    protected $fillable = [
        'cargo_loader_id', 'line', 'type', 'quantity','cargo_id', 'cargo_type_id', 'pieces', 'weight_unit', 'metric_unit','length', 'width', 'height', 'total_weight', 'cubic', 'volume_weight', 'location_id', 'location_bin_id', 'material_description', 'tare_weight', 'net_weight', 'unit_weight','dim_fact','square_foot'];

    public function cargo_type()
    {
        return $this->belongsTo('Sass\CargoType');
    }

    public function location()
    {
        return $this->belongsTo('Sass\Location');
    }

    public function bin()
    {
        return $this->belongsTo('Sass\LocationBin');
    }
    public function receipt_entry()
    {
        return $this->belongsTo('Sass\ReceiptEntry', 'receipt_entry_id');
    }

    public static function saveDetail($id, $data)
    {
        $i = -1;
        $a = 0;
        if (isset($data['details_line'])) {
            $details = DB::table('exp_cargo_loader_cargo_details')->where('cargo_loader_id', '=', $id)->delete();
            while ($a < count($data['details_line'])) {
                $i++;
                if (isset($data['details_line'][$i])) {
                    $obj = new CargoLoaderCargoDetail();
                    $obj->cargo_loader_id = $id;
                    $obj->line = $a + 1;
                    $obj->cargo_id                      = $data['details_id'][$i];
                    $obj->quantity                      = $data['details_quantity'][$i];
                    $obj->cargo_type_id                 = $data['details_cargo_type_id'][$i];
                    $obj->pieces                        = $data['details_pieces'][$i];
                    $obj->weight_unit                   = $data['details_unit'][$i];
                    $obj->metric_unit                   = $data['details_metric_unit'][$i];
                    $obj->length                        = $data['details_length'][$i];
                    $obj->width                         = $data['details_width'][$i];
                    $obj->height                        = $data['details_height'][$i];
                    $obj->total_weight                  = $data['details_total_weight'][$i];
                    $obj->cubic                         = $data['details_total_cubic'][$i];
                    $obj->volume_weight                 = $data['details_vol_weight'][$i];
                    $obj->location_id                   = $data['details_location_id'][$i];
                    $obj->location_bin_id               = $data['details_location_bin_id'][$i];
                    $obj->material_description          = $data['details_material'][$i];
                    $obj->tare_weight                   = $data['details_tare_weight'][$i];
                    $obj->net_weight                    = $data['details_net_weight'][$i];
                    $obj->unit_weight                   = $data['details_unit_weight'][$i];
                    $obj->dim_fact                      = $data['details_dim_fact'][$i];
                    $obj->square_foot                   = $data['details_square_foot'][$i];

                    $obj->save();
                    $a++;

                }
            }
        }
    }

    public static function Search($id){
        return self::where('cargo_loader_id', $id)->get();
    }


}
