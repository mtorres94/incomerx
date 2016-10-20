<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingEntryCargoDetail extends Model
{
    protected $table = "exp_booking_entries_cargo_details";

    protected $fillable = [
        'id', 'created_at', 'updated_at', 'line', 'booking_entry_id', 'cargo_id','details_quantity', 'details_unit', 'details_length', 'details_width', 'details_height', 'details_total_weight', 'details_total_cubic', 'details_cargo_type_id', 'details_metric_unit', 'details_materials', 'details_pieces', 'details_unit_weight', 'details_dim_fact', 'details_vol_weight', 'details_serial_number', 'details_model', 'details_commodity_id', 'details_pro_number', 'details_project',

        'details_inv_number', 'details_lot_number', 'details_sku_number', 'details_destination_point', 'details_attention', 'details_scheduleb_id', 'details_hts_id', 'details_hts_description','details_value', 'details_eccn', 'details_export_id', 'details_license_type_id', 'details_origin', 'details_ncm_code', 'details_uns_id', 'details_uns_description', 'details_class_id', 'details_class_description', 'details_packing_group', 'details_flash_point', 'details_flashing_point_type', 'details_special_instructions', 'details_units', 'details_material_page',

        'details_hazardous_quantity', 'details_label_required', 'details_emergency_contact', 'details_emergency_contact_phone', 'vehicle_vin', 'vehicle_type', 'vehicle_color', 'vehicle_year', 'vehicle_condition', 'vehicle_make', 'vehicle_keys', 'vehicle_model', 'vehicle_running','vehicle_trim', 'vehicle_mileage', 'vehicle_engine', 'vehicle_tag', 'vehicle_body', 'vehicle_other', 'vehicle_number', 'vehicle_state_province_id', 'vehicle_received', 'vehicle_inspection_number', 'vehicle_inspection_date', 'vehicle_inspection_by', 'vehicle_lot_number', 'vehicle_buyer_number', 'detail_type'
    ];


    public static function saveDetail($id, $data) {
        $i=-1; $a=0;
        if (isset($data['cargo_id']) ){
            $details= DB::table('exp_booking_entries_cargo_details')->where('booking_entry_id', '=', $id)->delete();
            while($a < count($data['details_id'])){
                $i++;
                if (isset($data['details_id'][$i])){
                    $obj = new BookingEntryCargoDetail();
                    $obj->booking_entry_id = $id;
                    $obj->cargo_id=  $data['details_id'][$i];
                    $obj->line=  $data['details_line'][$i];
                    $obj->details_quantity=  $data['details_quantity'][$i];
                    $obj->details_unit=  $data['details_unit'][$i];
                    $obj->details_length=  $data['details_length'][$i];
                    $obj->details_width=  $data['details_width'][$i];
                    $obj->details_height=  $data['details_height'][$i];
                    $obj->details_total_weight=  $data['details_total_weight'][$i];
                    $obj->details_total_cubic=  $data['details_total_cubic'][$i];
                    $obj->details_cargo_type_id=  $data['details_cargo_type_id'][$i];
                    $obj->details_metric_unit=  $data['details_metric_unit'][$i];
                    $obj->details_materials=  $data['details_material'][$i];
                    $obj->details_pieces=  $data['details_pieces'][$i];
                    $obj->details_unit_weight=  $data['details_unit_weight'][$i];
                    $obj->details_dim_fact=  $data['details_dim_fact'][$i];
                    $obj->details_vol_weight=  $data['details_vol_weight'][$i];
                    $obj->details_serial_number=  $data['details_serial_number'][$i];
                    $obj->details_model=  $data['details_Model'][$i];
                    $obj->details_commodity_id=  $data['details_commodity_id'][$i];
                    $obj->details_pro_number=  $data['details_pro_number'][$i];
                    $obj->details_project=  $data['details_project'][$i];
                    $obj->details_inv_number=  $data['details_inv_number'][$i];
                    $obj->details_lot_number=  $data['details_lot_number'][$i];
                    $obj->details_sku_number=  $data['details_sku_number'][$i];
                    $obj->details_destination_point=  $data['details_destination_point'][$i];
                    $obj->details_attention=  $data['details_attention'][$i];
                    $obj->details_scheduleb_id=  $data['details_scheduleb_id'][$i];
                    $obj->details_hts_id=  $data['details_hts_id'][$i];
                    $obj->details_hts_description=  $data['details_hts_description'][$i];
                    $obj->details_value=  $data['details_value'][$i];
                    $obj->details_eccn=  $data['details_eccn'][$i];
                    $obj->details_export_id=  $data['details_export_id'][$i];
                    $obj->details_license_type_id=  $data['details_license_type_id'][$i];
                    $obj->details_origin=  $data['details_origin'][$i];
                    $obj->details_ncm_code=  $data['details_ncm_code'][$i];
                    $obj->details_uns_id=  $data['details_uns_id'][$i];
                    $obj->details_uns_description=  $data['details_uns_description'][$i];
                    $obj->details_class_id=  $data['details_class_id'][$i];
                    $obj->details_class_description=  $data['details_class_description'][$i];
                    $obj->details_packing_group=  $data['details_packing_group'][$i];
                    $obj->details_flash_point=  $data['details_flash_point'][$i];
                    $obj->details_flashing_point_type=  $data['details_flashing_point_type'][$i];
                    $obj->details_special_instructions=  $data['details_special_instructions'][$i];
                    $obj->details_units=  $data['details_units'][$i];
                    $obj->details_material_page=  $data['details_material_page'][$i];
                    $obj->details_hazardous_quantity=  $data['details_hazardous_quantity'][$i];
                    $obj->details_label_required=  $data['details_label_required'][$i];
                    $obj->details_emergency_contact=  $data['details_emergency_contact'][$i];
                    $obj->details_emergency_contact_phone=  $data['details_emergency_contact_phone'][$i];
                    $obj->vehicle_vin=  $data['vehicle_vin'][$i];
                    $obj->vehicle_type=  $data['vehicle_type'][$i];
                    $obj->vehicle_color=  $data['vehicle_color'][$i];
                    $obj->vehicle_year=  $data['vehicle_year'][$i];
                    $obj->vehicle_condition=  $data['vehicle_condition'][$i];
                    $obj->vehicle_make=  $data['vehicle_make'][$i];
                    $obj->vehicle_keys=  $data['vehicle_keys'][$i];
                    $obj->vehicle_model=  $data['vehicle_model'][$i];
                    $obj->vehicle_running=  $data['vehicle_running'][$i];
                    $obj->vehicle_trim=  $data['vehicle_trim'][$i];
                    $obj->vehicle_mileage=  $data['vehicle_mileage'][$i];
                    $obj->vehicle_engine=  $data['vehicle_engine'][$i];
                    $obj->vehicle_tag=  $data['vehicle_tag'][$i];
                    $obj->vehicle_body=  $data['vehicle_body'][$i];
                    $obj->vehicle_other=  $data['vehicle_other'][$i];
                    $obj->vehicle_number=  $data['vehicle_number'][$i];
                    $obj->vehicle_state_province_id=  $data['vehicle_state_province_id'][$i];
                    $obj->vehicle_received=  $data['vehicle_received'][$i];
                    $obj->vehicle_inspection_number=  $data['vehicle_inspection_number'][$i];
                    $obj->vehicle_inspection_date=  $data['vehicle_inspection_date'][$i];
                    $obj->vehicle_inspection_by=  $data['vehicle_inspection_by'][$i];
                    $obj->vehicle_lot_number=  $data['vehicle_lot_number'][$i];
                    $obj->vehicle_buyer_number=  $data['vehicle_buyer_number'][$i];
                    $obj->detail_type=  $data['detail_type'][$i];

                    $obj->save();
                    $a++;
                }
            }
        }

    }

    public static function saveDetailStepByStep($id, $data) {
        $i=-1; $a=0;
        if (isset($data['details_line']) ){
            $details= DB::table('exp_booking_entries_cargo_details')->where('booking_entry_id', '=', $id)->delete();
            while($a < count($data['details_line'])){
                $i++;
                if (isset($data['details_line'][$i])){
                    $obj = new BookingEntryCargoDetail();
                    $obj->booking_entry_id = $id;
                    $obj->cargo_id=  $data['details_id'][$i];
                    $obj->line=  $data['details_line'][$i];
                    $obj->details_quantity=  $data['details_quantity'][$i];
                    $obj->details_unit=  $data['details_unit'][$i];
                    $obj->details_length=  $data['details_length'][$i];
                    $obj->details_width=  $data['details_width'][$i];
                    $obj->details_height=  $data['details_height'][$i];
                    $obj->details_total_weight=  $data['details_total_weight'][$i];
                    $obj->details_total_cubic=  $data['details_total_cubic'][$i];
                    $obj->details_cargo_type_id=  $data['details_cargo_type_id'][$i];
                    $obj->details_metric_unit=  $data['details_metric_unit'][$i];
                    $obj->details_materials=  $data['details_material'][$i];
                    $obj->details_pieces=  $data['details_pieces'][$i];
                    $obj->details_unit_weight=  $data['details_unit_weight'][$i];
                    $obj->details_dim_fact=  $data['details_dim_fact'][$i];
                    $obj->details_vol_weight=  $data['details_vol_weight'][$i];
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


    public function details_cargo_type()
    {
        return $this->belongsTo('Sass\CargoType', 'details_cargo_type_id');
    }


}
