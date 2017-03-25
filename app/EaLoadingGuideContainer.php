<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EaLoadingGuideContainer extends Model
{
    protected $table= 'ea_loading_guide_containers';
    protected $fillable = [
        'id',   'line',   'loading_guide_id',   'equipment_type_id',   'container_number',   'seal_number',   'seal_number2',   'order_number',   'cubic_max',   'cubic_load',   'pieces_load',   'weight_load',   'reference',   'volume_weight',
    ];

    public $timestamps= false;

    public function equipment_type()
    {
        return $this->belongsTo('Sass\CargoType', 'equipment_type_id');
    }

    public static function saveDetail($id, $data) {
        $i= 0; $a=0;
        if (isset($data['container_line'])){
            DB::table('ea_loading_guide_containers')->where('loading_guide_id', '=', $id)->delete();
            while($a < count($data['container_line'])) {
                if (isset($data['container_line'][$i])) {
                    $obj = new EaLoadingGuideContainer();
                    $obj->line = $a + 1;
                    $obj->loading_guide_id = $id;
                    $obj->equipment_type_id = $data['equipment_type_id'][$i];
                    $obj->container_number = $data['container_number'][$i];
                    $obj->seal_number = $data['container_seal_number'][$i];
                    $obj->seal_number2 = $data['container_seal_number2'][$i];
                    $obj->order_number = $data['container_order_number'][$i];
                    $obj->cubic_max = $data['cubic_max'][$i];
                    $obj->cubic_load = $data['cubic_load'][$i];
                    $obj->pieces_load = $data['pieces_loaded'][$i];
                    $obj->weight_load = $data['weight_load'][$i];
                    $obj->reference = $data['reference'][$i];
                    $obj->volume_weight = $data['volume_weight'][$i];
                    $obj->save();
                    $a++;
                }
                $i++;
            }
        }

        ReceiptEntry::where('ea_loading_guide_id', '=', $id)->update(['ea_loading_guide_id' => "0", 'status' => 'O']);
        $i=0; $a=0;
        if(isset($data['hidden_warehouse_id'])){
            while ($a < count($data['hidden_warehouse_id'])) {
                if (isset($data['hidden_warehouse_id'][$i])) {
                    if ($data['hidden_warehouse_id'][$i] > 0) {
                        ReceiptEntry::where('id', '=', $data['hidden_warehouse_id'][$i])->update(['ea_loading_guide_id' => $id, 'status' =>'P', 'line' => $data['line'][$i]]);
                        $a++;
                    }
                }
                $i++;
            }
        }
    }
}
