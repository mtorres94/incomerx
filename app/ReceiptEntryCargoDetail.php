<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReceiptEntryCargoDetail extends Model
{
    protected $table = 'whr_receipts_entries_cargo_details';

    protected $fillable = [
        'receipt_entry_id', 'line', 'type', 'quantity', 'cargo_type_id', 'pieces', 'weight_unit_measurement_id', 'metric_unit_measurement_id',
        'length', 'width', 'height', 'total_weight', 'cubic', 'volume_weight', 'location_id', 'location_bin_id', 'serial_number',
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

    public function bin()
    {
        return $this->belongsTo('Sass\LocationBin');
    }
    public function receipt_entry()
    {
        return $this->belongsTo('Sass\ReceiptEntry', 'receipt_entry_id');
    }
    /**
     * @param $id   int
     * @param $data array
     */
    public static function createDetail($id, $data)
    {
        DB::table('whr_receipts_entries_cargo_details')->where('receipt_entry_id', '=', $id)->delete();

        if (array_key_exists('cargo_line', $data)) {
            $j = 0;
            for ($i = 0; $i < count($data['cargo_line']); $i++) {
                $obj = new ReceiptEntryCargoDetail();
                $j++;

                $obj->receipt_entry_id              = $id;
                $obj->line                          = $j;
                # $obj->type                          = $data['cargo_type'][$i];
                $obj->quantity                      = $data['cargo_quantity'][$i];
                $obj->cargo_type_id                 = $data['cargo_type_id'][$i];
                $obj->pieces                        = $data['cargo_pieces'][$i];
                $obj->weight_unit_measurement_id    = $data['cargo_weight_unit_measurement_id'][$i];
                $obj->metric_unit_measurement_id    = $data['cargo_metric_unit_measurement_id'][$i];
                $obj->length                        = $data['cargo_length'][$i];
                $obj->width                         = $data['cargo_width'][$i];
                $obj->height                        = $data['cargo_height'][$i];
                $obj->total_weight                  = $data['cargo_total_weight'][$i];
                $obj->cubic                         = $data['cargo_cubic'][$i];
                $obj->volume_weight                 = $data['cargo_volume_weight'][$i];
                $obj->location_id                   = $data['cargo_location_id'][$i];
                $obj->location_bin_id               = $data['cargo_location_bin_id'][$i];
                # $obj->serial_number                 = $data['cargo_serial_number'][$i];
                $obj->material_description          = $data['cargo_material_description'][$i];
                $obj->tare_weight                   = $data['cargo_tare_weight'][$i];
                $obj->net_weight                    = $data['cargo_net_weight'][$i];
                $obj->dim_fact                      = $data['cargo_dim_fact'][$i];

                $obj->save();
            }
        }
    }

    public static function saveDetail($id, $data)
    {
        DB::table('whr_receipts_entries_cargo_details')->where('receipt_entry_id', '=', $id)->delete();

        if (array_key_exists('cargo_line', $data)) {
            $j = 0;
            for ($i = 0; $i < count($data['cargo_line']); $i++) {
                $obj = new ReceiptEntryCargoDetail();
                $j++;

                $obj->receipt_entry_id              = $id;
                $obj->line                          = $j;
                # $obj->type                          = $data['cargo_type'][$i];
                $obj->quantity                      = $data['details_quantity'][$i];
                $obj->cargo_type_id                 = $data['details_cargo_type_id'][$i];
                $obj->pieces                        = $data['details_pieces'][$i];
                $obj->weight_unit_measurement_id    = $data['details_unit'][$i];
                $obj->metric_unit_measurement_id    = $data['details_metric_unit'][$i];
                $obj->length                        = $data['details_length'][$i];
                $obj->width                         = $data['details_width'][$i];
                $obj->height                        = $data['details_height'][$i];
                $obj->total_weight                  = $data['details_total_weight'][$i];
                $obj->cubic                         = $data['details_cubic'][$i];
                $obj->volume_weight                 = $data['details_vol_weight'][$i];
                $obj->location_id                   = $data['details_location_id'][$i];
                $obj->location_bin_id               = $data['details_location_bin_id'][$i];
                # $obj->serial_number                 = $data['cargo_serial_number'][$i];
                $obj->material_description          = $data['details_material'][$i];
                $obj->tare_weight                   = $data['details_tare_weight'][$i];
                $obj->net_weight                    = $data['details_net_weight'][$i];
                $obj->dim_fact                      = $data['details_dim_fact'][$i];

                $obj->save();
            }
        }
    }



}
