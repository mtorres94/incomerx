<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BillOfLadingCargoDetail extends Model
{
    protected $table = "exp_bill_of_lading_cargo_details";

    protected $fillable = [
        'id', 'bill_of_lading_id','created_at', 'updated_at','line','cargo_id', 'quantity', 'unit', 'length', 'width', 'height', 'total_weight', 'total_cubic', 'cargo_type_id', 'metric_unit', 'materials', 'pieces', 'unit_weight' , 'dim_fact','vol_weight', 'serial_number', 'barcode', 'Model', 'commodity_id', 'pro_number', 'project','po_number', 'inv_number', 'lot_number', 'sku_number', 'destination_point', 'attention', 'scheduleb_id', 'scheduleb_description', 'hts_code', 'hts_description', 'export_id', 'license_type_id', 'ncm_code', 'origin', 'uns_id', 'uns_description', 'class_id', 'class_description', 'packing_group', 'flash_point', 'flashing_point_type', 'special_instructions', 'hazardous_units', 'material_page', 'hazardous_quantity', 'label_required', 'emergency_contact', 'emergency_contact_phone', 'comments',
        'vehicle_vin', 'vehicle_type', 'vehicle_color', 'vehicle_year', 'vehicle_make', 'vehicle_keys', 'vehicle_model', 'vehicle_running', 'vehicle_trim', 'vehicle_mileage', 'vehicle_engine', 'vehicle_tag', 'vehicle_body', 'vehicle_other', 'vehicle_number', 'vehicle_state_province_id', 'vehicle_received', 'vehicle_inspection_number', 'vehicle_inspection_date', 'vehicle_inspection_by','vehicle_lot_number', 'vehicle_buyer_number', 'detail_type', 'vehicle_condition'];

    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        if (isset($data['details_line'])){
            $details= DB::table('exp_bill_of_lading_cargo_details')->where('bill_of_lading_id', '=', $id)->delete();
            while($a < count($data['details_line'])){
                $i++;
                if (isset($data['details_line'][$i])){
                    $obj = new BillOfLadingCargoDetail();
                    $obj->bill_of_lading_id = $id;
                    $obj->line=  $a + 1;
                    $obj-> cargo_id = $data['details_id'][$i];
                    $obj-> quantity = $data['details_quantity'][$i];
                    $obj-> unit= $data['details_unit'][$i];
                    $obj-> length= $data['details_length'][$i];
                    $obj-> width= $data['details_width'][$i];
                    $obj-> height= $data['details_height'][$i];
                    $obj-> total_weight= $data['details_total_weight'][$i];
                    $obj-> total_cubic= $data['details_total_cubic'][$i];
                    $obj-> cargo_type_id= $data['details_cargo_type_id'][$i];
                    $obj-> metric_unit= $data['details_metric_unit'][$i];
                    $obj-> materials= $data['details_materials'][$i];
                    $obj-> pieces= $data['details_pieces'][$i];
                    $obj-> unit_weight= $data['details_unit_weight'][$i];
                    $obj-> dim_fact= $data['details_dim_fact'][$i];
                    $obj-> vol_weight= $data['details_vol_weight'][$i];
                    $obj-> serial_number= $data['details_serial_number'][$i];
                    $obj-> barcode= $data['details_barcode'][$i];
                    $obj-> Model= $data['details_Model'][$i];
                    $obj-> commodity_id= $data['details_commodity_id'][$i];
                    $obj-> pro_number= $data['details_pro_number'][$i];
                    $obj-> project= $data['details_project'][$i];
                    $obj-> po_number= $data['details_po_number'][$i];
                    $obj-> inv_number= $data['details_inv_number'][$i];
                    $obj-> lot_number= $data['details_lot_number'][$i];
                    $obj-> sku_number= $data['details_sku_number'][$i];
                    $obj-> destination_point= $data['details_destination_point'][$i];
                    $obj-> attention= $data['details_attention'][$i];
                    $obj-> scheduleb_id= $data['details_scheduleb_id'][$i];
                    $obj-> scheduleb_description= $data['details_scheduleb_description'][$i];
                    $obj-> hts_code= $data['details_hts_code'][$i];
                    $obj-> hts_description= $data['details_hts_description'][$i];
                    $obj-> export_id= $data['details_export_id'][$i];
                    $obj-> license_type_id= $data['details_license_type_id'][$i];
                    $obj-> ncm_code= $data['details_ncm_code'][$i];
                    $obj-> origin= $data['details_origin'][$i];
                    $obj-> uns_id= $data['details_uns_id'][$i];
                    $obj-> uns_description= $data['details_uns_description'][$i];
                    $obj-> class_id= $data['details_class_id'][$i];
                    $obj-> class_description= $data['details_class_description'][$i];
                    $obj-> packing_group= $data['details_packing_group'][$i];
                    $obj-> flash_point= $data['details_flash_point'][$i];
                    $obj-> flashing_point_type= $data['details_flashing_point_type'][$i];
                    $obj-> special_instructions= $data['details_special_instructions'][$i];
                    $obj-> hazardous_units= $data['details_units'][$i];
                    $obj-> material_page= $data['details_material_page'][$i];
                    $obj-> hazardous_quantity= $data['details_hazardous_quantity'][$i];
                    $obj-> label_required= $data['details_label_required'][$i];
                    $obj-> emergency_contact= $data['details_emergency_contact'][$i];
                    $obj-> emergency_contact_phone= $data['details_emergency_contact_phone'][$i];
                    $obj-> comments= $data['details_comments'][$i];
                    $obj-> vehicle_vin= $data['vehicle_vin'][$i];
                    $obj-> vehicle_type= $data['vehicle_type'][$i];
                    $obj-> vehicle_color= $data['vehicle_color'][$i];
                    $obj-> vehicle_year= $data['vehicle_year'][$i];
                    $obj-> vehicle_make= $data['vehicle_make'][$i];
                    $obj-> vehicle_keys= $data['vehicle_keys'][$i];
                    $obj-> vehicle_model= $data['vehicle_model'][$i];
                    $obj-> vehicle_running= $data['vehicle_running'][$i];
                    $obj-> vehicle_trim= $data['vehicle_trim'][$i];
                    $obj-> vehicle_mileage= $data['vehicle_mileage'][$i];
                    $obj-> vehicle_engine= $data['vehicle_engine'][$i];
                    $obj-> vehicle_tag= $data['vehicle_tag'][$i];
                    $obj-> vehicle_body= $data['vehicle_body'][$i];
                    $obj-> vehicle_other= $data['vehicle_other'][$i];
                    $obj-> vehicle_number= $data['vehicle_number'][$i];
                    $obj-> vehicle_state_province_id= $data['vehicle_state_province_id'][$i];
                    $obj-> vehicle_received= $data['vehicle_received'][$i];
                    $obj-> vehicle_inspection_number= $data['vehicle_inspection_number'][$i];
                    $obj-> vehicle_inspection_date= $data['vehicle_inspection_date'][$i];
                    $obj-> vehicle_inspection_by= $data['vehicle_inspection_by'][$i];
                    $obj-> vehicle_lot_number= $data['vehicle_lot_number'][$i];
                    $obj-> vehicle_buyer_number= $data['vehicle_buyer_number'][$i];
                    $obj-> detail_type= $data['detail_type'][$i];
                    $obj-> vehicle_condition= $data['vehicle_condition'][$i];
                    $obj->save();
                    $a++;
                }

            }
        }

    }


    public static function Search($id){
        return self::where('bill_of_lading_id', $id)->get();
    }

    public function cargo_type()
    {
        return $this->belongsTo('Sass\CargoType', 'cargo_type_id');
    }
    public function commodity()
    {
        return $this->belongsTo('Sass\Commodity', 'commodity_id');
    }
    public function details_hts()
    {
        return $this->belongsTo('Sass\Harmonized', 'hts_id');
    }
    public function export()
    {
        return $this->belongsTo('Sass\ExportCode', 'export_id');
    }
    public function scheduleb()
    {
        return $this->belongsTo('Sass\ScheduleB', 'scheduleb_id');
    }
    public function license_type()
    {
        return $this->belongsTo('Sass\LicenseType', 'license_type_id');
    }

    public function vehicle_state_province()
    {
        return $this->belongsTo('Sass\State', 'vehicle_state_province_id');
    }

    public function uns_code()
    {
        return $this->belongsTo('Sass\UnsCode', 'uns_id');
    }
    public function bill_of_lading()
    {
        return $this->belongsTo('Sass\BillOfLading', 'bill_of_lading_id');
    }

}
