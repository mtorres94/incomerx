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
        if (isset($data['cargo_line'])) {
            $details = DB::table('exp_cargo_loader_cargo_details')->where('cargo_loader_id', '=', $id)->delete();
            while ($a < count($data['cargo_line'])) {
                $i++;
                if (isset($data['cargo_line'][$i])) {
                    $obj = new CargoLoaderCargoDetail();
                    $obj->cargo_loader_id = $id;
                    $obj->line = $a + 1;
                    $obj->cargo_id                      = $data['details_id'][$i];
                    $obj->quantity                      = $data['cargo_quantity'][$i];
                    $obj->cargo_type_id                 = $data['cargo_type_id'][$i];
                    $obj->pieces                        = $data['cargo_pieces'][$i];
                    $obj->weight_unit                   = $data['cargo_weight_unit_measurement_id'][$i];
                    $obj->metric_unit                   = $data['cargo_metric_unit_measurement_id'][$i];
                    $obj->length                        = $data['cargo_length'][$i];
                    $obj->width                         = $data['cargo_width'][$i];
                    $obj->height                        = $data['cargo_height'][$i];
                    $obj->total_weight                  = $data['cargo_total_weight'][$i];
                    $obj->cubic                         = $data['cargo_cubic'][$i];
                    $obj->volume_weight                 = $data['cargo_volume_weight'][$i];
                    $obj->location_id                   = $data['cargo_location_id'][$i];
                    $obj->location_bin_id               = $data['cargo_location_bin_id'][$i];
                    $obj->material_description          = (isset($data['cargo_material_description'][$i])? $data['cargo_material_description'][$i] : $data['cargo_material'][$i]);
                    $obj->tare_weight                   = $data['cargo_tare_weight'][$i];
                    $obj->net_weight                    = $data['cargo_net_weight'][$i];
                    $obj->unit_weight                   = $data['cargo_unit_weight'][$i];
                    $obj->dim_fact                      = $data['cargo_dim_fact'][$i];
                    $obj->square_foot                   = $data['cargo_square_foot'][$i];

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
