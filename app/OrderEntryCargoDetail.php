<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderEntryCargoDetail extends Model
{
    protected $table = 'whr_orders_entries_cargo_details';

    protected $fillable = [
        'order_entry_id', 'line', 'cargo_quantity', 'cargo_type_id','cargo_length','cargo_width', 'cargo_height','cargo_total_weight','cargo_net_weight','cargo_weight_unit_measurement_id', 'cargo_cubic','part_info_po_number',
        'cargo_volume_weight','cargo_metric_unit_measurement_id','cargo_material','cargo_pieces','cargo_unit_weight','cargo_dim_fact','cargo_location_id','cargo_location_bin_id','cargo_tare_weight','cargo_square_foot','part_info_serial_number','part_info_barcode','part_info_Model','part_info_commodity_id','part_info_pro_number','part_info_project','part_info_inv_number','part_info_lot_number','part_info_sku_number','part_info_destination_point','part_info_attention','eei_info_scheduleb_id','eei_info_scheduleb_description','eei_info_hts_id','eei_info_hts_description','eei_info_value','eei_info_eccn','eei_info_export_id','eei_info_license_type_id','eei_info_origin',
        'hazardous_proper_shipping_name','hazardous_un_id','hazardous_un_description', 'hazardous_class_id','hazardous_class_description','hazardous_packing_group','hazardous_flash_point','hazardous_flash_point_type', 'hazardous_special_instructions','hazardous_units','hazardous_material_page','hazardous_quantity','hazardous_label_required','hazardous_emergency_contact','hazardous_emergency_contact_phone',
        'reference_vendor_code','reference_final_dest','reference_customer_reference',
        'shipping_type','shipping_date_in','shipping_date_out','user_id','shipping_reference','shipping_file',
        'other_vendor_delivery','other_shipping_date','other_department_id','other_from_system','other_concession','other_ultimate_consignee_id','comments_comment',
        'vehicle_vin', 'vehicle_type', 'vehicle_color', 'vehicle_year', 'vehicle_condition', 'vehicle_make', 'vehicle_keys', 'vehicle_model', 'vehicle_running', 'vehicle_trim', 'vehicle_mileage', 'vehicle_engine', 'vehicle_tag', 'vehicle_body', 'vehicle_other', 'vehicle_number', 'vehicle_state_province_id', 'vehicle_received', 'vehicle_inspection_number', 'vehicle_inspection_date', 'vehicle_inspection_by', 'vehicle_lot_number', 'vehicle_buyer_number', 'type_package',
        'created_at', 'updated_at'
    ];

    public static function saveDetail($id, $data) {
        $i=0; $a=0;
        if (isset($data['cargo_id'])){
            while($a < count($data['cargo_id'])){
                $i++;
                if(isset($data['cargo_id'][$i])){
                    $obj = new OrderEntryCargoDetail();
                    $obj->order_entry_id = $id;
                    $obj->line =  $data['cargo_id'][$i];
                    $obj-> cargo_quantity = $data['cargo_quantity'][$i];
                    $obj-> cargo_type_id = $data['cargo_cargo_type_id'][$i];
                    $obj->cargo_length = $data['cargo_length'][$i];
                    $obj->cargo_width = $data['cargo_width'][$i];
                    $obj->cargo_height = $data['cargo_height'][$i];
                    $obj->cargo_total_weight = $data['cargo_total_weight'][$i];
                    $obj->cargo_net_weight = $data['cargo_net_weight'][$i];
                    $obj->cargo_weight_unit_measurement_id = $data['cargo_weight_unit_measurement_id'][$i];
                    $obj->cargo_cubic = $data['cargo_cubic'][$i];
                    $obj->part_info_po_number = $data['part_info_po_number'][$i];
                    $obj->cargo_volume_weight = $data['cargo_volume_weight'][$i];
                    $obj->cargo_metric_unit_measurement_id = $data['cargo_metric_unit_measurement_id'][$i];
                    $obj-> cargo_material = $data['cargo_material'][$i];
                    $obj->cargo_pieces = $data['cargo_pieces'][$i];
                    $obj->cargo_unit_weight = $data['cargo_unit_weight'][$i];
                    $obj->cargo_dim_fact = $data['cargo_dim_fact'][$i];
                    $obj->cargo_location_id = $data['cargo_location_id'][$i];
                    $obj->cargo_location_bin_id = $data['cargo_location_bin_id'][$i];
                    $obj->cargo_tare_weight = $data['cargo_tare_weight'][$i];
                    $obj->cargo_square_foot = $data['cargo_square_foot'][$i];
                    $obj->part_info_serial_number = $data['part_info_serial_number'][$i];

                    $obj->part_info_barcode = $data['part_info_barcode'][$i];
                    $obj-> part_info_Model = $data['part_info_Model'][$i];
                    $obj-> part_info_commodity_id = $data['part_info_commodity_id'][$i];
                    $obj->part_info_pro_number = $data['part_info_pro_number'][$i];
                    $obj->part_info_project = $data['part_info_project'][$i];
                    $obj->part_info_inv_number = $data['part_info_inv_number'][$i];
                    $obj->part_info_lot_number = $data['part_info_lot_number'][$i];
                    $obj->part_info_sku_number = $data['part_info_sku_number'][$i];
                    $obj->part_info_destination_point = $data['part_info_destination_point'][$i];
                    $obj->part_info_attention = $data['part_info_attention'][$i];

                    $obj->eei_info_scheduleb_id = $data['eei_info_scheduleb_id'][$i];
                    $obj-> eei_info_scheduleb_description = $data['eei_info_scheduleb_description'][$i];
                    $obj-> eei_info_hts_id = $data['eei_info_hts_id'][$i];
                    $obj->eei_info_hts_description = $data['eei_info_hts_description'][$i];
                    $obj->eei_info_value = $data['eei_info_value'][$i];
                    $obj->eei_info_eccn = $data['eei_info_eccn'][$i];
                    $obj->eei_info_export_id = $data['eei_info_export_id'][$i];
                    $obj->eei_info_license_type_id = $data['eei_info_license_type_id'][$i];
                    $obj->eei_info_origin = $data['eei_info_origin'][$i];

                    $obj->hazardous_proper_shipping_name = $data['hazardous_proper_shipping_name'][$i];
                    $obj->hazardous_un_id = $data['hazardous_un_id'][$i];
                    $obj-> hazardous_un_description = $data['hazardous_un_description'][$i];
                    $obj-> hazardous_class_id = $data['hazardous_class_id'][$i];
                    $obj->hazardous_class_description = $data['hazardous_class_description'][$i];
                    $obj->hazardous_packing_group = $data['hazardous_packing_group'][$i];
                    $obj->hazardous_flash_point = $data['hazardous_flash_point'][$i];
                    $obj->hazardous_flash_point_type = $data['hazardous_flashing_point_type'][$i];
                    $obj->hazardous_special_instructions = $data['hazardous_special_instructions'][$i];
                    $obj->hazardous_units = $data['hazardous_units'][$i];
                    $obj->hazardous_material_page = $data['hazardous_material_page'][$i];
                    $obj->hazardous_quantity = $data['hazardous_quantity'][$i];
                    $obj->hazardous_label_required = $data['hazardous_label_required'][$i];
                    $obj->hazardous_emergency_contact = $data['hazardous_emergency_contact'][$i];
                    $obj->hazardous_emergency_contact_phone = $data['hazardous_emergency_contact_phone'][$i];

                    $obj-> reference_vendor_id = $data['reference_vendor_code'][$i];
                    $obj-> reference_final_dest = $data['reference_final_dest'][$i];
                    $obj->reference_customer_reference = $data['reference_customer_reference'][$i];
                    $obj->shipping_type = $data['shipping_type'][$i];
                    $obj->shipping_date_in = $data['shipping_date_in'][$i];
                    $obj->shipping_date_out = $data['shipping_date_out'][$i];
                    $obj->user_id = Auth::user()->id;
                    $obj->shipping_reference = $data['shipping_reference'][$i];
                    $obj->shipping_file = $data['shipping_file'][$i];

                    $obj-> other_vendor_delivery = $data['other_vendor_delivery'][$i];
                    $obj-> other_shipping_date = $data['other_shipping_date'][$i];
                    $obj->other_department_id = $data['other_department_id'][$i];
                    $obj->other_from_system = $data['other_from_system'][$i];
                    $obj->other_concession = $data['other_concession'][$i];
                    $obj->other_ultimate_consignee_id = $data['other_ultimate_consignee_id'][$i];
                    $obj->comments_comment = $data['comments_comment'][$i];

                    $obj-> vehicle_vin = $data['vehicle_vin'][$i];
                    $obj-> vehicle_type = $data['vehicle_type'][$i];
                    $obj->vehicle_color = $data['vehicle_color'][$i];
                    $obj->vehicle_year = $data['vehicle_year'][$i];
                    $obj->vehicle_condition = $data['vehicle_condition'][$i];
                    $obj->vehicle_make = $data['vehicle_make'][$i];
                    $obj->vehicle_keys = $data['vehicle_keys'][$i];
                    $obj->vehicle_model = $data['vehicle_model'][$i];
                    $obj->vehicle_running = $data['vehicle_running'][$i];
                    $obj->vehicle_trim = $data['vehicle_trim'][$i];
                    $obj->vehicle_mileage = $data['vehicle_mileage'][$i];
                    $obj->vehicle_engine = $data['vehicle_engine'][$i];
                    $obj->vehicle_tag = $data['vehicle_tag'][$i];
                    $obj->vehicle_body = $data['vehicle_body'][$i];
                    $obj->vehicle_other = $data['vehicle_other'][$i];
                    $obj->vehicle_number = $data['vehicle_number'][$i];
                    $obj->vehicle_state_province_id = $data['vehicle_state_province_id'][$i];
                    $obj->vehicle_received = $data['vehicle_received'][$i];
                    $obj->vehicle_inspection_number = $data['vehicle_inspection_number'][$i];
                    $obj->vehicle_inspection_date = $data['vehicle_inspection_date'][$i];
                    $obj->vehicle_inspection_by = $data['vehicle_inspection_by'][$i];
                    $obj->vehicle_lot_number = $data['vehicle_lot_number'][$i];
                    $obj->vehicle_buyer_number = $data['vehicle_buyer_number'][$i];
                    $obj->type_package = $data['type_package'][$i];
                    $obj->save();
                    $a++;
                }
            }
        }
    }

    public static function updateDetail($id, $data) {
        if (isset($data['cargo_id'])) {
            $details= DB::table('whr_orders_entries_cargo_details')->where('order_entry_id', '=', $id)->delete();
            self::saveDetail($id, $data);
        }
    }

    public static function Search($id){
        return self::where('order_entry_id', $id)->get();
    }
    public function users()
    {
        return $this->belongsTo('Sass\User', 'user_id');
    }

    public function eei_info_export_code()
    {
        return $this->belongsTo('Sass\ExportCode', 'eei_export_code_id');
    }
    public function eei_info_license_type()
    {
        return $this->belongsTo('Sass\LicenseType', 'eei_info_license_type_id');
    }
    public function vehicle_state_province()
    {
        return $this->belongsTo('Sass\State', 'vehicle_state_province_id');
    }
    public function other_department()
    {
        return $this->belongsTo('Sass\Department', 'other_department_id');
    }
    public function other_ultimate_consignee()
    {
        return $this->belongsTo('Sass\Customer', 'other_ultimate_consignee_id');
    }
    public function part_info_commodity()
    {
        return $this->belongsTo('Sass\Commodity', 'part_info_commodity_id');
    }
    public function reference_vendor()
    {
        return $this->belongsTo('Sass\Vendor', 'reference_vendor_id');
    }

    public function hazardous_un()
    {
        return $this->belongsTo('Sass\UnsCode', 'hazardous_un_id');
    }
    public function cargo_type()
    {
        return $this->belongsTo('Sass\CargoType', 'cargo_type_id');
    }
    public function cargo_location()
    {
        return $this->belongsTo('Sass\Location', 'cargo_location_id');
    }
    public function cargo_location_bin()
    {
        return $this->belongsTo('Sass\LocationBin', 'cargo_location_bin_id');
    }
    public function eei_info_hts()
    {
        return $this->belongsTo('Sass\HarmonizedCode', 'eei_info_hts_id');
    }
    public function eei_info_scheduleb()
    {
        return $this->belongsTo('Sass\HarmonizedCode', 'eei_info_scheduleb_id');
    }
    public function order_entry()
    {
        return $this->belongsTo('Sass\OrderEntry', 'order_entry_id');
    }


}
