<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StepByStepBillOfLadingCargoDetail extends Model
{

    protected $table = "exp_bill_of_lading_cargo_details";

    protected $fillable = [
        'id', 'bill_of_lading_id','created_at', 'updated_at','line','cargo_id', 'quantity', 'unit', 'length', 'width', 'height', 'total_weight', 'total_cubic', 'cargo_type_id', 'metric_unit', 'materials', 'pieces', 'unit_weight' , 'dim_fact','vol_weight', 'serial_number', 'barcode', 'Model', 'commodity_id', 'pro_number', 'project','po_number', 'inv_number', 'lot_number', 'sku_number', 'destination_point', 'attention', 'scheduleb_id', 'scheduleb_description', 'hts_code', 'hts_description', 'export_id', 'license_type_id', 'ncm_code', 'origin', 'uns_id', 'uns_description', 'class_id', 'class_description', 'packing_group', 'flash_point', 'flashing_point_type', 'special_instructions', 'hazardous_units', 'material_page', 'hazardous_quantity', 'label_required', 'emergency_contact', 'emergency_contact_phone', 'comments',
        'vehicle_vin', 'vehicle_type', 'vehicle_color', 'vehicle_year', 'vehicle_make', 'vehicle_keys', 'vehicle_model', 'vehicle_running', 'vehicle_trim', 'vehicle_mileage', 'vehicle_engine', 'vehicle_tag', 'vehicle_body', 'vehicle_other', 'vehicle_number', 'vehicle_state_province_id', 'vehicle_received', 'vehicle_inspection_number', 'vehicle_inspection_date', 'vehicle_inspection_by','vehicle_lot_number', 'vehicle_buyer_number', 'detail_type', 'vehicle_condition'];




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
