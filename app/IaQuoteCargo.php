<?php

namespace Sass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class IaQuoteCargo extends Model
{
    protected $table = 'ia_quotes_cargo';

    protected $fillable = [
        'id', 'line' ,  'quotes_id', 'cargo_type_id', 'quantity' , 'weight_unit' , 'length' , 'width', 'height' , 'unit_weight', 'total_weight',  'total_cubic', 'charge_weight' , 'rate' , 'cargo_total', 'metric_unit', 'material' , 'pieces' , 'dim_fact', 'vol_weight',  'comments', 'marks' , 'container', 'gross_weight' ];
    public $timestamps = false;
    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        DB::table('ia_quotes_cargo')->where('quotes_id', '=', $id)->delete();
        if (isset($data['cargo_line'])){

            while($a < count($data['cargo_line'])){
                $i++;
                if(isset($data['cargo_line'][$i])){
                    $obj = new IaQuoteCargo();
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
