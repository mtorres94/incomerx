<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccInvoiceCargo extends Model
{
    protected $table = 'acc_invoice_cargo_details';

    protected $fillable = [
        'invoice_id', 'line', 'type', 'cargo_quantity', 'cargo_type_id', 'cargo_pieces', 'cargo_weight_unit', 'cargo_metric_unit',
        'cargo_length', 'cargo_width', 'cargo_height', 'cargo_total_weight', 'cargo_cubic', 'cargo_unit_weight', 'cargo_volume_weight', 'location_id', 'location_bin_id', 'serial_number',
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
                    $obj->cargo_quantity = $data['cargo_quantity'][$i];
                    $obj->cargo_type_id = $data['cargo_type_id'][$i];
                    $obj->cargo_pieces = $data['cargo_pieces'][$i];
                    $obj->cargo_weight_unit = $data['cargo_weight_unit'][$i];
                    $obj->cargo_metric_unit = $data['cargo_metric_unit'][$i];
                    $obj->cargo_length = $data['cargo_length'][$i];
                    $obj->cargo_width = $data['cargo_width'][$i];
                    $obj->cargo_height = $data['cargo_height'][$i];
                    $obj->cargo_total_weight = $data['cargo_total_weight'][$i];
                    $obj->cargo_cubic = $data['cargo_cubic'][$i];
                    $obj->cargo_volume_weight = $data['cargo_volume_weight'][$i];
                    $obj->cargo_unit_weight = $data['cargo_unit_weight'][$i];
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

    public static function createDetail($id, $data)
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
                    $obj->cargo_quantity = isset($data['cargo_quantity'][$i])? $data['cargo_quantity'][$i] : "";
                    $obj->cargo_type_id = isset($data['cargo_type_id'][$i])? $data['cargo_type_id'][$i] : "";
                    $obj->cargo_pieces = $data['cargo_pieces'][$i];
                    $obj->cargo_weight_unit = $data['cargo_weight_unit'][$i];
                    $obj->cargo_metric_unit = isset($data['cargo_metric_unit'][$i]) ? $data['cargo_metric_unit'][$i] : "";
                    $obj->cargo_length = isset($data['cargo_length'][$i]) ? $data['cargo_length'][$i] : "";
                    $obj->cargo_width = isset($data['cargo_width'][$i])? $data['cargo_width'][$i] : "";
                    $obj->cargo_height = isset($data['cargo_height'][$i]) ? $data['cargo_height'][$i] : "";
                    $obj->cargo_total_weight = isset($data['cargo_total_weight'][$i])? $data['cargo_total_weight'][$i] : $data['cargo_gross_weight'][$i];
                    $obj->cargo_cubic = isset( $data['cargo_cubic'][$i]) ?  $data['cargo_cubic'][$i] : "";
                    $obj->cargo_volume_weight = isset($data['cargo_volume_weight'][$i])? $data['cargo_volume_weight'][$i] : "";
                    $obj->cargo_unit_weight = isset($data['cargo_unit_weight'][$i])? $data['cargo_unit_weight'][$i] : "";
                    $obj->location_id = isset($data['cargo_location_id'][$i])? $data['cargo_location_id'][$i] : "";
                    $obj->location_bin_id = isset($data['cargo_location_bin_id'][$i])? $data['cargo_location_bin_id'][$i]: "";
                    $obj->material_description = isset($data['cargo_material_description'][$i])? $data['cargo_material_description'][$i] : "";
                    $obj->tare_weight = (isset($data['cargo_tare_weight'][$i]) ? $data['cargo_tare_weight'][$i] : 0);
                    $obj->net_weight = (isset($data['cargo_net_weight'][$i]) ? $data['cargo_net_weight'][$i] : 0);
                    $obj->dim_fact = (isset($data['cargo_dim_fact'][$i]) ? $data['cargo_dim_fact'][$i] : 'I');

                    $obj->save();

                }
            }
        }
    }
}
