<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccInvoiceCargo extends Model
{
    protected $table = 'acc_invoice_cargo_details';

    protected $fillable = [
        'invoice_id', 'line', 'type', 'quantity', 'cargo_type_id', 'pieces', 'weight_unit_measurement_id', 'metric_unit_measurement_id',
        'length', 'width', 'height', 'total_weight', 'cubic', 'unit_weight', 'volume_weight', 'location_id', 'location_bin_id', 'serial_number',
        'material_description', 'tare_weight', 'net_weight', 'dim_fact',
    ];

    public $timestamps = false;

    public function cargo_type()
    {
        return $this->belongsTo('Sass\CargoType');
    }

    public function location()
    {
        return $this->belongsTo('Sass\Location');
    }


    /**
     * @param $id   int
     * @param $data array
     */
    public static function saveDetail($id, $data)
    {
        $i=-1; $a=0;

        DB::table('acc_invoice_cargo_details')->where('invoice_id', '=', $id)->delete();

        if (isset($data['cargo_line'])){
            while($a < count($data['cargo_line'])) {
                $i++;
                if (isset($data['cargo_line'][$i])) {
                    $obj = new AccInvoiceCargo();
                    $a++;

                    $obj->invoice_id = $id;
                    $obj->line = $a;
                    $obj->quantity = $data['cargo_quantity'][$i];
                    $obj->cargo_type_id = $data['cargo_type_id'][$i];
                    $obj->pieces = $data['cargo_pieces'][$i];
                    $obj->weight_unit_measurement_id = $data['cargo_weight_unit_measurement_id'][$i];
                    $obj->metric_unit_measurement_id = $data['cargo_metric_unit_measurement_id'][$i];
                    $obj->length = $data['cargo_length'][$i];
                    $obj->width = $data['cargo_width'][$i];
                    $obj->height = $data['cargo_height'][$i];
                    $obj->total_weight = $data['cargo_total_weight'][$i];
                    $obj->cubic = $data['cargo_cubic'][$i];
                    $obj->volume_weight = $data['cargo_volume_weight'][$i];
                    $obj->unit_weight = $data['cargo_unit_weight'][$i];
                    $obj->location_id = $data['cargo_location_id'][$i];
                    $obj->location_bin_id = $data['cargo_location_bin_id'][$i];
                    $obj->material_description = $data['cargo_material_description'][$i];
                    $obj->tare_weight = (isset($data['cargo_tare_weight'][$i]) ? $data['cargo_tare_weight'][$i] : 0);
                    $obj->net_weight = (isset($data['cargo_net_weight'][$i]) ? $data['cargo_net_weight'][$i] : 0);
                    $obj->dim_fact = (isset($data['cargo_dim_fact'][$i]) ? $data['cargo_dim_fact'][$i] : 'I');

                    $obj->save();

                }
            }
        }
    }
}
