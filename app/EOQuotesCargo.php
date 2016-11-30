<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class EOQuotesCargo extends Model
{
    protected $table = 'exp_oceans_quotes_cargo';

    protected $fillable = [
        'id', 'line' , 'created_at', 'updated_at', 'quotes_id', 'cargo_type_id', 'quantity' , 'weight_unit' , 'length' , 'width', 'height' , 'unit_weight', 'total_weight',  'total_cubic', 'charge_weight' , 'rate' , 'cargo_total', 'metric_unit', 'material' , 'pieces' , 'dim_fact', 'vol_weight', 'serial_number', 'barcode', 'model' , 'commodity_id', 'pro_number' , 'project', 'po_number', 'inv_number', 'lot_number', 'sku_number' , 'destination_point', 'attention' , 'sheduleb_id' , 'schedule_description', 'hts_id' , 'hts_description', 'value', 'eccn', 'export_id', 'license_type_id' , 'origin', 'uns_id' , 'uns_description', 'class_id', 'class_description', 'special_instructions', 'material_page', 'hazardous_level', 'emergency_contact', 'emergency_contact_phone', 'comments', 'marks' , 'container', 'gross_weight' ];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        if (isset($data['cargo_line'])){
            $details= DB::table('exp_oceans_quotes_cargo')->where('quotes_id', '=', $id)->delete();
            while($a < count($data['cargo_line'])){
                $i++;
                if(isset($data['cargo_line'][$i])){
                    $obj = new EOQuotesCargo();
                    $obj->quotes_id = $id;
                    $obj->line =  $a + 1;
                    $obj-> cargo_type_id = $data['cargo_type_id'][$i];
                    $obj-> quantity = $data['cargo_quantity'][$i];
                    $obj-> weight_unit = $data['cargo_weight_unit'][$i];
                    $obj-> length = $data['cargo_length'][$i];
                    $obj-> width = $data['cargo_width'][$i];
                    $obj-> height = $data['cargo_height'][$i];
                    $obj-> unit_weight = $data['cargo_unit_weight'][$i];
                    $obj-> total_weight = $data['cargo_total_weight'][$i];
                    $obj-> total_cubic = $data['cargo_total_cubic'][$i];
                    $obj-> charge_weight = $data['cargo_charge_weight'][$i];
                    $obj-> rate = $data['cargo_rate'][$i];
                    $obj-> cargo_total = $data['cargo_total'][$i];
                    $obj-> metric_unit = $data['cargo_metric_unit'][$i];
                    $obj-> material = $data['cargo_material'][$i];
                    $obj-> pieces = $data['cargo_pieces'][$i];
                    $obj-> dim_fact = $data['cargo_dim_fact'][$i];
                    $obj-> vol_weight = $data['cargo_vol_weight'][$i];
                    $obj-> serial_number = $data['cargo_serial_number'][$i];
                    $obj-> barcode = $data['cargo_barcode'][$i];
                    $obj-> model = $data['cargo_Model'][$i];
                    $obj-> commodity_id = $data['cargo_commodity_id'][$i];
                    $obj-> pro_number = $data['cargo_pro_number'][$i];
                    $obj-> project = $data['cargo_project'][$i];
                    $obj-> po_number = $data['cargo_po_number'][$i];
                    $obj-> inv_number = $data['cargo_inv_number'][$i];
                    $obj-> lot_number = $data['cargo_lot_number'][$i];
                    $obj-> sku_number = $data['cargo_sku_number'][$i];
                    $obj-> destination_point = $data['cargo_destination_point'][$i];
                    $obj-> attention = $data['cargo_attention'][$i];
                    $obj-> sheduleb_id = $data['cargo_scheduleb_id'][$i];
                    $obj-> schedule_description = $data['cargo_scheduleb_description'][$i];
                    $obj-> hts_id = $data['cargo_hts_id'][$i];
                    $obj-> hts_description = $data['cargo_hts_description'][$i];
                    $obj-> value = $data['cargo_value'][$i];
                    $obj-> eccn = $data['cargo_eccn'][$i];
                    $obj-> export_id = $data['cargo_export_id'][$i];
                    $obj-> license_type_id = $data['cargo_license_type_id'][$i];
                    $obj-> origin = $data['cargo_origin'][$i];
                    $obj-> uns_id = $data['cargo_uns_id'][$i];
                    $obj-> uns_description = $data['cargo_uns_description'][$i];
                    $obj-> class_id = $data['cargo_class_id'][$i];
                    $obj-> class_description = $data['cargo_class_description'][$i];
                    $obj-> special_instructions = $data['cargo_special_instructions'][$i];
                    $obj-> material_page = $data['cargo_material_page'][$i];
                    $obj-> hazardous_level = $data['cargo_hazardous_levels'][$i];
                    $obj-> emergency_contact = $data['cargo_emergency_contact'][$i];
                    $obj-> emergency_contact_phone = $data['cargo_emergency_contact_phone'][$i];
                    $obj-> comments = $data['cargo_comments'][$i];
                    $obj-> marks = $data['cargo_marks'][$i];
                    $obj-> container = $data['cargo_container'][$i];
                    $obj-> gross_weight = $data['cargo_gross_weight'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }
    }


    public static function Search($id){
        return self::where('quotes_id', $id)->get();
    }
    public function export_code()
    {
        return $this->belongsTo('Sass\ExportCode', 'export_code_id');
    }
    public function license_type()
    {
        return $this->belongsTo('Sass\LicenseType', 'license_type_id');
    }
    public function commodity()
    {
        return $this->belongsTo('Sass\Commodity', 'commodity_id');
    }
    public function cargo_type()
    {
        return $this->belongsTo('Sass\CargoType', 'cargo_type_id');
    }
    public function scheduleb()
    {
        return $this->belongsTo('Sass\HarmonizedCode', 'scheduleb_id');
    }
    public function hts()
    {
        return $this->belongsTo('Sass\HarmonizedCode', 'hts_id');
    }
    public function uns()
    {
        return $this->belongsTo('Sass\UnsCode', 'uns_id');
    }
}
