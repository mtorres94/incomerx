<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class StepByStepBookingEntryCargoDetail extends Model
{
    protected $table = "exp_booking_entries_cargo_details";

    protected $fillable = [
        'id', 'created_at', 'updated_at', 'line', 'booking_entry_id', 'cargo_id','details_quantity', 'details_unit', 'details_length', 'details_width', 'details_height', 'details_total_weight', 'details_total_cubic', 'details_cargo_type_id', 'details_metric_unit', 'details_materials', 'details_pieces', 'details_unit_weight', 'details_dim_fact', 'details_vol_weight', 'details_serial_number', 'details_model', 'details_commodity_id', 'details_pro_number', 'details_project',

        'details_inv_number', 'details_lot_number', 'details_sku_number', 'details_destination_point', 'details_attention', 'details_scheduleb_id', 'details_hts_id', 'details_hts_description','details_value', 'details_eccn', 'details_export_id', 'details_license_type_id', 'details_origin', 'details_ncm_code', 'details_uns_id', 'details_uns_description', 'details_class_id', 'details_class_description', 'details_packing_group', 'details_flash_point', 'details_flashing_point_type', 'details_special_instructions', 'details_units', 'details_material_page',

        'details_hazardous_quantity', 'details_label_required', 'details_emergency_contact', 'details_emergency_contact_phone', 'vehicle_vin', 'vehicle_type', 'vehicle_color', 'vehicle_year', 'vehicle_condition', 'vehicle_make', 'vehicle_keys', 'vehicle_model', 'vehicle_running','vehicle_trim', 'vehicle_mileage', 'vehicle_engine', 'vehicle_tag', 'vehicle_body', 'vehicle_other', 'vehicle_number', 'vehicle_state_province_id', 'vehicle_received', 'vehicle_inspection_number', 'vehicle_inspection_date', 'vehicle_inspection_by', 'vehicle_lot_number', 'vehicle_buyer_number', 'detail_type'
    ];



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
