
    <legend>More  Details</legend>
    <div class="row">
        <div class="easyui-tabs">
            <div title="Cargo Details">
                <div class="form-horizontal">
                    <div class="pull-left" style="padding-bottom: 15px;">
                        <div class="btn-group" role="group" aria-label="...">
                            <a type="button" class="btn btn-default btn-sm" id="btn-cargo" onclick="clearTable('items_details'),cleanModalFields('cargo-warehouse')" data-toggle="modal" data-target="#cargo-warehouse"><i class="fa fa-cube" aria-hidden="true"></i><span>Cargo</span></a>
                            <a type="button" class="btn btn-default btn-sm" id="btn-vehicle" onclick="cleanModalFields('vehicle-warehouse')" data-toggle="modal" data-target="#vehicle-warehouse"><i class="fa fa-car" aria-hidden="true"></i><span>Vehicle</span></a>
                        </div>
                    </div>

                    <table class="table table-bordered table-condensed" id="warehouse_details">
                        <thead>
                        <tr>
                            <th data-override="warehouse_details_line" hidden></th>
                            <th width="10%" data-override="warehouse_details_type"></th>
                            <th width="5%" data-override="warehouse_details_quantity">Qty.</th>
                            <th width="5%" data-override="warehouse_details_cargo_type_id" hidden></th>
                            <th width="20%" data-override="warehouse_details_cargo_type_name">Cargo Type</th>
                            <th width="10%" data-override="warehouse_details_length">Length</th>
                            <th width="10%" data-override="warehouse_details_width">Width</th>
                            <th width="10%" data-override="warehouse_details_height">Height</th>
                            <th width="10%" data-override="warehouse_details_weight">Weight</th>
                            <th width="10%" data-override="warehouse_details_net_weight">Net Weight</th>
                            <th width="5%" data-override="warehouse_details_unit">Unit</th>
                            <th width="10%" data-override="warehouse_details_cubic">Cubic</th>
                            <th width="5%" data-override="warehouse_details_PO Number">Po. Number</th>
                            <th width="12%"/>
                        </tr>
                        </thead>
                        <tbody>
                        @if (isset($cargo_details))
                        @foreach($cargo_details as $cargo_detail)
                            <tr id="{{ $cargo_detail->line }}">
                                <td hidden>{{ $cargo_detail->line }}<input hidden type='text' name='cargo_id[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->line }} ' /></td>
                            @if ($cargo_detail->type_package == 0)
                                    <td><i class="fa fa-cube" aria-hidden="true"/></td>
                                @else
                                    <td><i class="fa fa-car" aria-hidden="true"/></td>
                                @endif
                                <td >{{ $cargo_detail->cargo_quantity }}<input hidden type='text' name='cargo_quantity[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->cargo_quantity }} ' /></td>
                                <td hidden >{{ $cargo_detail->cargo_type_id }}<input hidden type='text' name='cargo_cargo_type_id[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->cargo_type_id }} ' /></td>
                                <td >{{ ((isset($cargo_detail)and $cargo_detail->cargo_type_id >0) ? $cargo_detail->cargo_type->code: null) }}<input hidden type='text' name='cargo_cargo_type_name[{{ $cargo_detail->line }}]' value='{{ ((isset($cargo_detail)and $cargo_detail->cargo_type_id >0) ? $cargo_detail->cargo_type->code: null)  }}' /></td>

                                <td >{{ $cargo_detail->cargo_length }}<input hidden type='text' name='cargo_length[{{ $cargo_detail->line}}]' value='{{ $cargo_detail->cargo_length }} ' /></td>
                                <td >{{ $cargo_detail->cargo_width }}<input hidden type='text' name='cargo_width[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->cargo_width }} ' /></td>
                                <td >{{ $cargo_detail->cargo_height }}<input hidden type='text' name='cargo_height[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->cargo_height }} ' /></td>
                                <td >{{ $cargo_detail->cargo_total_weight }}<input hidden type='text' name='cargo_total_weight[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->cargo_total_weight }} ' /></td>
                                <td >{{ $cargo_detail->cargo_net_weight }}<input hidden type='text' name='cargo_net_weight[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->cargo_net_weight }} ' /></td>
                                <td >{{ $cargo_detail->cargo_weight_unit_measurement_id }}<input hidden type='text' name='cargo_weight_unit_measurement_id[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->cargo_weight_unit_measurement_id }} ' /></td>
                                <td >{{ $cargo_detail->cargo_cubic }}<input hidden type='text' name='cargo_cubic[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->cargo_cubic }} ' /></td>
                                <td >{{ $cargo_detail->part_info_po_number }}<input hidden type='text' name='part_info_po_number[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->part_info_po_number }} ' /></td>
                                <td hidden>{{ $cargo_detail->cargo_volume_weight }}<input hidden type='text' name='cargo_volume_weight[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->cargo_volume_weight }} ' /></td>
                                <td hidden>{{ $cargo_detail->cargo_metric_unit_measurement_id }}<input hidden type='text' name='cargo_metric_unit_measurement_id[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->cargo_metric_unit_measurement_id }} ' /></td>
                                <td hidden>{{ $cargo_detail->cargo_material }}<input hidden type='text' name='cargo_material[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->cargo_material }} ' /></td>
                                <td hidden>{{ $cargo_detail->cargo_pieces }}<input hidden type='text' name='cargo_pieces[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->cargo_pieces }} ' /></td>
                                <td hidden>{{ $cargo_detail->cargo_unit_weight }}<input hidden type='text' name='cargo_unit_weight[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->cargo_unit_weight }} ' /></td>
                                <td hidden>{{ $cargo_detail->cargo_dim_fact }}<input hidden type='text' name='cargo_dim_fact[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->cargo_dim_fact }} ' /></td>
                                <td hidden>{{ $cargo_detail->cargo_location_id }}<input hidden type='text' name='cargo_location_id[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->cargo_location_id }} ' /></td>

                                <td hidden>{{ ((isset($cargo_detail)and $cargo_detail->cargo_location_id >0) ? $cargo_detail->cargo_location->code: null) }}<input hidden type='text' name='cargo_location_name[{{ $cargo_detail->line }}]' value='{{ ((isset($cargo_detail)and $cargo_detail->cargo_location_id >0) ? $cargo_detail->cargo_location->code: null) }}' /></td>

                                <td hidden>{{ $cargo_detail->cargo_location_bin_id }}<input hidden type='text' name='cargo_location_bin_id[{{ $cargo_detail->line}}]' value='{{ $cargo_detail->cargo_location_bin_id }} ' /></td>
                                <td hidden>{{ ((isset($cargo_detail)and $cargo_detail->cargo_location_bin_id >0) ? $cargo_detail->cargo_location_bin->code: null) }}<input hidden type='text' name='cargo_location_bin_name[{{ $cargo_detail->line }}]' value='{{ ((isset($cargo_detail)and $cargo_detail->cargo_location_bin_id >0) ? $cargo_detail->cargo_location_bin->code: null) }}'  /></td>
                                <td hidden>{{ $cargo_detail->cargo_tare_weight }}<input hidden type='text' name='cargo_tare_weight[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->cargo_tare_weight }} ' /></td>
                                <td hidden>{{ $cargo_detail->cargo_square_foot }}<input hidden type='text' name='cargo_square_foot[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->cargo_square_foot }} ' /></td>
                                <td hidden>{{ $cargo_detail->part_info_serial_number }}<input hidden type='text' name='part_info_serial_number[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->part_info_serial_number }} ' /></td>
                                <td hidden>{{ $cargo_detail->part_info_barcode }}<input hidden type='text' name='part_info_barcode[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->part_info_barcode }} ' /></td>
                                <td hidden>{{ $cargo_detail->part_info_Model }}<input hidden type='text' name='part_info_Model[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->part_info_Model }} ' /></td>
                                <td hidden>{{ $cargo_detail->part_info_commodity_id }}<input hidden type='text' name='part_info_commodity_id[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->part_info_commodity_id }} ' /></td>
                                <td hidden>{{ ((isset($cargo_detail)and $cargo_detail->part_info_commodity_id >0) ? $cargo_detail->part_info_commodity->code: null) }}<input hidden type='text' name='part_info_commodity_name[{{ $cargo_detail->line - 1 }}]' value='{{ ((isset($cargo_detail)and $cargo_detail->part_info_commodity_id >0) ? $cargo_detail->part_info_commodity->code: null) }}' /></td>
                                <td hidden>{{ $cargo_detail->part_info_pro_number }}<input hidden type='text' name='part_info_pro_number[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->part_info_pro_number }} ' /></td>
                                <td hidden>{{ $cargo_detail->part_info_project }}<input hidden type='text' name='part_info_project[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->part_info_project }} ' /></td>
                                <td hidden>{{ $cargo_detail->part_info_inv_number }}<input hidden type='text' name='part_info_inv_number[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->part_info_inv_number }} ' /></td>
                                <td hidden>{{ $cargo_detail->part_info_lot_number }}<input hidden type='text' name='part_info_lot_number[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->part_info_lot_number }} ' /></td>
                                <td hidden>{{ $cargo_detail->part_info_sku_number }}<input hidden type='text' name='part_info_sku_number[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->part_info_sku_number }} ' /></td>
                                <td hidden>{{ $cargo_detail->part_info_destination_point }}<input hidden type='text' name='part_info_destination_point[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->part_info_destination_point }} ' /></td>

                                <td hidden>{{ $cargo_detail->part_info_attention }}<input hidden type='text' name='part_info_attention[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->part_info_attention }} ' /></td>
                                <td hidden>{{ $cargo_detail->eei_info_scheduleb_id }}<input hidden type='text' name='eei_info_scheduleb_id[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->eei_info_scheduleb_id }} ' /></td>
                                <td hidden>{{ ((isset($cargo_detail)and $cargo_detail->eei_info_scheduleb_id >0) ? $cargo_detail->eei_info_scheduleb->code: null) }}<input hidden type='text' name='eei_info_scheduleb_code[{{ $cargo_detail->line  }}]' value='{{ ((isset($cargo_detail)and $cargo_detail->eei_info_scheduleb_id >0) ? $cargo_detail->eei_info_scheduleb->code: null) }} ' /></td>
                                <td hidden>{{ $cargo_detail->eei_info_scheduleb_description }}<input hidden type='text' name='eei_info_scheduleb_description[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->eei_info_scheduleb_description }} ' /></td>
                                <td hidden>{{ $cargo_detail->eei_info_hts_id }}<input hidden type='text' name='eei_info_hts_id[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->eei_info_hts_id }} ' /></td>
                                <td hidden>{{ ((isset($cargo_detail)and $cargo_detail->eei_info_hts_id >0) ? $cargo_detail->eei_info_hts->code: null)  }}<input hidden type='text' name='eei_info_hts_name[{{ $cargo_detail->line  }}]' value=' {{ ((isset($cargo_detail)and $cargo_detail->eei_info_hts_id >0) ? $cargo_detail->eei_info_hts->code: null)  }}' /></td>
                                <td hidden>{{ $cargo_detail->eei_info_hts_description }}<input hidden type='text' name='eei_info_hts_description[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->eei_info_hts_description }} ' /></td>
                                <td hidden>{{ $cargo_detail->eei_info_value }}<input hidden type='text' name='eei_info_value[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->eei_info_value }} ' /></td>
                                <td hidden>{{ $cargo_detail->eei_info_eccn }}<input hidden type='text' name='eei_info_eccn[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->eei_info_eccn }} ' /></td>

                                <td hidden>{{ $cargo_detail->eei_info_export_id }}<input hidden type='text' name='eei_info_export_id[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->eei_info_export_id }} ' /></td>
                                <td hidden>{{ ((isset($cargo_detail)and $cargo_detail->eei_info_export_id >0) ? $cargo_detail->eei_info_export->code: null) }}<input hidden type='text' name='eei_info_export_code[{{ $cargo_detail->line  }}]' value=' {{ ((isset($cargo_detail)and $cargo_detail->eei_info_export_id >0) ? $cargo_detail->eei_info_export->code: null) }}' /></td>
                                <td hidden>{{ $cargo_detail->eei_info_license_type_id }}<input hidden type='text' name='eei_info_license_type_id[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->eei_info_license_type_id }} ' /></td>
                                <td hidden>{{ ((isset($cargo_detail)and $cargo_detail->eei_info_license_type_id >0) ? $cargo_detail->eei_info_license_type->code: null) }}<input hidden type='text' name='eei_info_license_type_code[{{ $cargo_detail->line }}]' value='{{ ((isset($cargo_detail)and $cargo_detail->eei_info_license_type_id >0) ? $cargo_detail->eei_info_license_type->code: null) }}' /></td>
                                <td hidden>{{ $cargo_detail->eei_info_origin }}<input hidden type='text' name='eei_info_origin[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->eei_info_origin }} ' /></td>
                                <td hidden>{{ $cargo_detail->hazardous_proper_shipping_name }}<input hidden type='text' name='hazardous_proper_shipping_name[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->hazardous_proper_shipping_name }} ' /></td>
                                <td hidden>{{ $cargo_detail->hazardous_un_id }}<input hidden type='text' name='hazardous_un_id[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->hazardous_un_id }} ' /></td>
                                <td hidden>{{ ((isset($cargo_detail)and $cargo_detail->hazardous_un_id >0) ? $cargo_detail->hazardous_un->code: null) }}<input hidden type='text' name='hazardous_un_code[{{ $cargo_detail->line  }}]' value=' {{ ((isset($cargo_detail)and $cargo_detail->hazardous_un_id >0) ? $cargo_detail->hazardous_un->code: null)  }}' /></td>
                                <td hidden>{{ $cargo_detail->hazardous_un_description }}<input hidden type='text' name='hazardous_un_description[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->hazardous_un_description }} ' /></td>
                                <td hidden>{{ $cargo_detail->hazardous_class_id }}<input hidden type='text' name='hazardous_class_id[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->hazardous_class_id }} ' /></td>
                                <td hidden>{{ $cargo_detail->hazardous_class_description }}<input hidden type='text' name='hazardous_class_description[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->hazardous_class_description }} ' /></td>

                                <td hidden>{{ $cargo_detail->hazardous_packing_group }}<input hidden type='text' name='hazardous_packing_group[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->hazardous_packing_group }} ' /></td>
                                <td hidden>{{ $cargo_detail->hazardous_flash_point }}<input hidden type='text' name='hazardous_flash_point[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->hazardous_flash_point }} ' /></td>
                                <td hidden>{{ $cargo_detail->hazardous_flashing_point_type }}<input hidden type='text' name='hazardous_flashing_point_type[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->hazardous_flashing_point_type }} ' /></td>
                                <td hidden>{{ $cargo_detail->hazardous_special_instructions }}<input hidden type='text' name='hazardous_special_instructions[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->hazardous_special_instructions }} ' /></td>
                                <td hidden>{{ $cargo_detail->hazardous_units }}<input hidden type='text' name='hazardous_units[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->hazardous_units }} ' /></td>
                                <td hidden>{{ $cargo_detail->hazardous_material_page }}<input hidden type='text' name='hazardous_material_page[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->hazardous_material_page }} ' /></td>
                                <td hidden>{{ $cargo_detail->hazardous_quantity }}<input hidden type='text' name='hazardous_quantity[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->hazardous_quantity }} ' /></td>
                                <td hidden>{{ $cargo_detail->hazardous_label_required }}<input hidden type='text' name='hazardous_label_required[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->hazardous_label_required }} ' /></td>
                                <td hidden>{{ $cargo_detail->hazardous_emergency_contact }}<input hidden type='text' name='hazardous_emergency_contact[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->hazardous_emergency_contact }} ' /></td>
                                <td hidden>{{ $cargo_detail->hazardous_emergency_contact_phone }}<input hidden type='text' name='hazardous_emergency_contact_phone[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->hazardous_emergency_contact_phone }} ' /></td>
                                <td hidden>{{ $cargo_detail->reference_vendor_code }}<input hidden type='text' name='reference_vendor_code[{{ $cargo_detail->line}}]' value='{{ $cargo_detail->reference_vendor_code }} ' /></td>
                                <td hidden>{{ ((isset($cargo_detail)and $cargo_detail->reference_vendor_code >0) ? $cargo_detail->reference_vendor->code: null) }}<input hidden type='text' name='reference_vendor_name[{{ $cargo_detail->line }}]' value='{{((isset($cargo_detail)and $cargo_detail->reference_vendor_code >0) ? $cargo_detail->reference_vendor->code: null) }}' /></td>
                                <td hidden>{{ $cargo_detail->reference_final_dest }}<input hidden type='text' name='reference_final_dest[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->reference_final_dest }} ' /></td>
                                <td hidden>{{ $cargo_detail->reference_customer_reference }}<input hidden type='text' name='reference_customer_reference[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->reference_customer_reference }} ' /></td>
                                <td hidden>{{ $cargo_detail->shipping_type }}<input hidden type='text' name='shipping_type[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->shipping_type }} ' /></td>
                                <td hidden>{{ $cargo_detail->shipping_date_in }}<input hidden type='text' name='shipping_date_in[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->shipping_date_in }} ' /></td>
                                <td hidden>{{ $cargo_detail->shipping_date_out }}<input hidden type='text' name='shipping_date_out[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->shipping_date_out }} ' /></td>
                                <td hidden>{{   Auth::user()->id }}<input hidden type='text' name='user_id[{{ $cargo_detail->line }}]' value='{{ Auth::user()->id }} ' /></td>
                                <td hidden>{{ $cargo_detail->shipping_reference }}<input hidden type='text' name='shipping_reference[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->shipping_reference }} ' /></td>
                                <td hidden>{{ $cargo_detail->shipping_file }}<input hidden type='text' name='shipping_file[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->shipping_file }} ' /></td>
                                <td hidden>{{ $cargo_detail->other_vendor_delivery }}<input hidden type='text' name='other_vendor_delivery[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->other_vendor_delivery }} ' /></td>
                                <td hidden>{{ $cargo_detail->other_shipping_date }}<input hidden type='text' name='other_shipping_date[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->other_shipping_date }} ' /></td>
                                <td hidden>{{ $cargo_detail->other_department_id }}<input hidden type='text' name='other_department_id[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->other_department_id }} ' /></td>
                                <td hidden>{{ ((isset($cargo_detail)and $cargo_detail->other_department_id >0) ? $cargo_detail->other_department->code: null) }}<input hidden type='text' name='other_department_name[{{ $cargo_detail->line }}]' value='{{ ((isset($cargo_detail)and $cargo_detail->other_department_id >0) ? $cargo_detail->other_department->code: null)  }}' /></td>
                                <td hidden>{{ $cargo_detail->other_from_system }}<input hidden type='text' name='other_from_system[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->other_from_system }} ' /></td>
                                <td hidden>{{ $cargo_detail->other_concession }}<input hidden type='text' name='other_concession[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->other_concession }} ' /></td>
                                <td hidden>{{ $cargo_detail->other_ultimate_consignee_id }}<input hidden type='text' name='other_ultimate_consignee_id[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->other_ultimate_consignee_id }} ' /></td>
                                <td hidden>{{ ((isset($cargo_detail)and $cargo_detail->other_ultimate_consignee_id >0) ? $cargo_detail->other_ultimate_consignee->name: null) }}<input hidden type='text' name='other_ultimate_consignee_name[{{ $cargo_detail->line  }}]' value='{{ ((isset($cargo_detail)and $cargo_detail->other_ultimate_consignee_id >0) ? $cargo_detail->other_ultimate_consignee->name: null) }}' /></td>
                                <td hidden>{{ $cargo_detail->comments_comment }}<input hidden type='text' name='comments_comment[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->comments_comment }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_vin }}<input hidden type='text' name='vehicle_vin[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_vin }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_type }}<input hidden type='text' name='vehicle_type[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->vehicle_type }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_color }}<input hidden type='text' name='vehicle_color[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_color }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_year }}<input hidden type='text' name='vehicle_year[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_year }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_condition }}<input hidden type='text' name='vehicle_condition[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_condition }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_make }}<input hidden type='text' name='vehicle_make[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_make }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_keys }}<input hidden type='text' name='vehicle_keys[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_keys }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_model }}<input hidden type='text' name='vehicle_model[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_model }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_running }}<input hidden type='text' name='vehicle_running[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_running }} ' /></td>

                                <td hidden>{{ $cargo_detail->vehicle_trim }}<input hidden type='text' name='vehicle_trim[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_trim }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_mileage }}<input hidden type='text' name='vehicle_mileage[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_mileage }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_engine }}<input hidden type='text' name='vehicle_engine[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_engine }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_tag }}<input hidden type='text' name='vehicle_tag[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_tag }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_body }}<input hidden type='text' name='vehicle_body[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_body }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_other }}<input hidden type='text' name='vehicle_other[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_other }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_number }}<input hidden type='text' name='vehicle_number[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_number }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_state_province_id }}<input hidden type='text' name='vehicle_state_province_id[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_state_province_id }} ' /></td>
                                <td hidden>{{ ((isset($cargo_detail)and $cargo_detail->vehicle_state_province_id >0) ? $cargo_detail->vehicle_state_province->name: null) }}<input hidden type='text' name='vehicle_state_province_name[{{ $cargo_detail->line  }}]' value='{{ ((isset($cargo_detail)and $cargo_detail->vehicle_state_province_id >0) ? $cargo_detail->vehicle_state_province->name: null) }}' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_received }}<input hidden type='text' name='vehicle_received[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_received }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_inspection_number }}<input hidden type='text' name='vehicle_inspection_number[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_inspection_number }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_inspection_date }}<input hidden type='text' name='vehicle_inspection_date[{{ $cargo_detail->line }}]' value='{{ $cargo_detail->vehicle_inspection_date }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_inspection_by }}<input hidden type='text' name='vehicle_inspection_by[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_inspection_by }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_lot_number }}<input hidden type='text' name='vehicle_lot_number[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_lot_number }} ' /></td>
                                <td hidden>{{ $cargo_detail->vehicle_buyer_number }}<input hidden type='text' name='vehicle_buyer_number[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->vehicle_buyer_number }} ' /></td>
                                <td hidden>{{ $cargo_detail->type_package }}<input hidden type='text' name='type_package[{{ $cargo_detail->line  }}]' value='{{ $cargo_detail->type_package }} ' /></td>

                                @if ($cargo_detail->type_package == 0)
                                    <td><div class='btn-group btn-group-sm pull-right' role='group'><b class='btn btn-default' id="btn_edit_cargo"><span class='icon ion-edit' aria-hidden='true'></span></b><b class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></b></div></td>
                                @else
                                    <td><div class='btn-group btn-group-sm pull-right' role='group'><c class='btn btn-default' id="btn_edit_vehicle"><span class='icon ion-edit' aria-hidden='true'></span></c><c class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></c></div></td>
                                @endif
                            </tr>
                        @endforeach
                        @endif

                        </tbody>
                    </table>
                    <table class="table hidden" id="items_warehouse_details">
                         <tbody>
                         @if (isset($cargo_items_details))
                            @foreach($cargo_items_details as $cargo_item_detail)
                                <tr data-id="{{$cargo_item_detail->cargo_id }}">
                                    <td hidden>{{$cargo_item_detail->cargo_id}}<input hidden type='text' name='cargo_whr_id[{{ $cargo_item_detail->line }}]' value='{{ $cargo_item_detail->cargo_id }} ' /></td>

                                    <td hidden>{{$cargo_item_detail->line}}<input hidden type='text' name='item_whr_line[{{ $cargo_item_detail->line }}]' value='{{ $cargo_item_detail->line }} ' /></td>

                                    <td hidden>{{$cargo_item_detail->item_pieces}}<input hidden type='text' name='item_whr_pieces[{{ $cargo_item_detail->line  }}]' value='{{ $cargo_item_detail->item_pieces }} ' /></td>

                                    <td hidden>{{ ((isset($cargo_item_detail)and $cargo_item_detail->item_detail_id >0) ? $cargo_item_detail->item_detail->code: null) }}<input hidden type='text' name='item_whr_item_name[{{ $cargo_item_detail->line  }}]' value='{{ ((isset($cargo_item_detail)and $cargo_item_detail->item_detail_id >0) ? $cargo_item_detail->item_detail->code: null)   }}' /></td>

                                    <td hidden>{{$cargo_item_detail->item_unit_weight}}<input hidden type='text' name='item_whr_unit_weight[{{ $cargo_item_detail->line  }}]' value='{{ $cargo_item_detail->item_unit_weight }} ' /></td>

                                    <td hidden>{{$cargo_item_detail->item_brand}}<input hidden type='text' name='item_whr_brand[{{ $cargo_item_detail->line }}]' value='{{ $cargo_item_detail->item_brand }} ' /></td>
                                    <td hidden>{{ ((isset($cargo_item_detail)and $cargo_item_detail->vendor_id >0) ? $cargo_item_detail->vendors->code: null) }}<input hidden type='text' name='item_whr_vendor_name[{{ $cargo_item_detail->line }}]' value='{{ ((isset($cargo_item_detail)and $cargo_item_detail->vendor_id >0) ? $cargo_item_detail->vendors->code: null) }}' /></td>
                                    <td hidden>{{$cargo_item_detail->item_origin}}<input hidden type='text' name='item_whr_origin[{{ $cargo_item_detail->line  }}]' value='{{ $cargo_item_detail->item_origin }} ' /></td>
                                    <td hidden>{{$cargo_item_detail->item_exp_date}}<input hidden type='text' name='item_whr_exp_date[{{ $cargo_item_detail->line  }}]' value='{{ $cargo_item_detail->item_exp_date }} ' /></td>
                                    <td hidden>{{$cargo_item_detail->item_detail_id}}<input hidden type='text' name='item_whr_item_id[{{ $cargo_item_detail->line  }}]' value='{{ $cargo_item_detail->item_detail_id }} ' /></td>
                                    <td hidden>{{$cargo_item_detail->vendor_id}}<input hidden type='text' name='item_whr_vendor_code[{{ $cargo_item_detail->line  }}]' value='{{ $cargo_item_detail->vendor_id }} ' /></td>

                                </tr>

                            @endforeach
                         @endif

                         </tbody>
                    </table>
                </div>
            </div>

            <div title="Container Details">
                <div class="form-horizontal">

                    <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Container_Details" onclick="cleanModalFields('Container_Details')">
                            <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-danger" onclick="clearTable('container_details')">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                    <table class="table table-bordered table-condensed" id="container_details">
                        <thead>
                        <tr>
                            <th  data-override="container_line" hidden></th>
                            <th width="10%" data-override="container_equipment_type">Equipment Type</th>
                            <th width="40%" data-override="container_container">Container</th>
                            <th width="25%"data-override="container_seal_number">Seal Number</th>
                            <th width="25%"data-override="container_comments">Comments</th>
                            <th width="0%"/>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($container_details))
                        @foreach ($container_details as $container_detail)

                            <tr id="{{ $container_detail->line }}">
                                <td hidden >{{ $container_detail["line"] }}</td>
                                <td >{{((isset($container_detail)and $container_detail->container_equipment_type_id >0) ? $container_detail->container_equipment_type->code: null)}}<input hidden type='text' name='container_equipment_type_code[{{ $container_detail->line  }}]' value='{{((isset($container_detail)and $container_detail->container_equipment_type_id >0) ? $container_detail->container_equipment_type->code: null)}} ' /></td>
                                <td hidden>{{ $container_detail["container_equipment_type_id"] }}<input hidden type='text' name='container_equipment_type_id[{{ $container_detail->line  }}]' value='{{ $container_detail->container_equipment_type_id }} ' /></td>
                                <td >{{ $container_detail["container_container"] }}<input hidden type='text' name='container_container[{{ $container_detail->line  }}]' value='{{ $container_detail->container_container }} ' /></td>
                                <td >{{ $container_detail["container_seal_number"] }}<input hidden type='text' name='container_seal_number[{{ $container_detail->line }}]' value='{{ $container_detail->container_seal_number }} ' /></td>
                                <td >{{ $container_detail["container_comments"] }}<input hidden type='text' name='container_comments[{{ $container_detail->line }}]' value='{{ $container_detail->container_comments }} ' /></td>
                                <td><div class='btn-group btn-group-sm pull-right' role='group'><a class='btn btn-default' ><span class='icon ion-edit' aria-hidden='true'></span></a><a class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>

            <div title="Dock Receipt">
                <div class="row">
                    <div class="col-md-3">{!! Form::bsText(null,null, 'Booking #', 'dr_booking_number', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null,null, 'Document Number', 'dr_document_number', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null,null, 'Export reference', 'dr_export_reference', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null,null, 'FMC number', 'dr_fmc_number', null, '') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-3">{!! Form::bsText(null,null, 'Pre-Carriage by', 'dr_pre_carriage', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null,null, 'Place of receipt', 'dr_place_receipt', null, '') !!}</div>
                    <div class="col-md-3"> {!! Form::bsText(null,null,  'Vessel',  'dr_vessel_name',  null, '') !!}</div>
                    <div class="col-md-3"> {!! Form::bsText(null,null,  'Voyage', 'dr_voyage_name', null, '') !!}</div>
                </div>

                <div class="row">
                    <div class="col-md-3">{!! Form::bsText(null,null, 'Exporting Carrrier #', 'dr_exporting_carrier', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null,null, 'Port of loading', 'dr_port_loading', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null,null, 'Loading Pier/Terminal', 'dr_loading', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null,null, 'City of Origin', 'dr_city_origin', null, '') !!}</div>
                </div>

                <div class="row">
                    <div class="col-md-3">{!! Form::bsText(null,null, 'Foreign port of unloading', 'dr_foreign_port', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null,null, 'Place of delivery', 'dr_place_delivery', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null,null, 'Typer of move', 'dr_type_of_move', null, '') !!}</div>
                    <div class="col-md-3"><p>Containerized (Vessel Only)</p>
                            {!! Form::bsCheck('Yes', 'dr_containerized') !!}
                            {!! Form::bsCheck('No', 'dr_containerized') !!}
                    </div>
                </div>

                <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#DR_Details" onclick="cleanModalFields('DR_Details')">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-danger" onclick="clearTable('dr_details')">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
                <table class="table table-bordered table-condensed" id="dr_details">
                    <thead>
                    <tr>
                        <th  data-override="dr_line" hidden></th>
                        <th width="10%" data-override="dr_cargo_marks">Marks</th>
                        <th width="10%" data-override="dr_cargo_pieces">Pcs</th>
                        <th width="25%"data-override="dr_cargo_description">Comm Description</th>
                        <th width="10%"data-override="dr_cargo_type">Unit</th>
                        <th width="10%"data-override="dr_cargo_grossw">Gross Weight</th>
                        <th width="10%"data-override="dr_cargo_cubic">Cubic</th>
                        <th width="15%"data-override="dr_cargo_chgrw">Charge Weight</th>
                        <th width="0%"/>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($dr_details))
                    @foreach ($dr_details as $dr_detail)
                        <tr id="{{ $dr_detail->line }}">
                            <td hidden >{{ $dr_detail->line }}<input hidden type='text' name='dr_line[{{ $dr_detail->line }}]' value='{{ $dr_detail->line }} ' /></td>
                            <td  >{{ $dr_detail->dr_marks }}<input hidden type='text' name='dr_cargo_marks[{{ $dr_detail->line }}]' value='{{ $dr_detail->dr_marks }} ' /></td>
                            <td  >{{ $dr_detail->dr_pieces }}<input hidden type='text' name='dr_cargo_pieces[{{ $dr_detail->line }}]' value='{{ $dr_detail->dr_pieces }} ' /></td>
                            <td  >{{ $dr_detail->dr_description }}<input hidden type='text' name='dr_cargo_description[{{ $dr_detail->line  }}]' value='{{ $dr_detail->dr_description }} ' /></td>
                            <td hidden >{{ $dr_detail->dr_container }}<input hidden type='text' name='dr_cargo_container[{{ $dr_detail->line  }}]' value='{{ $dr_detail->dr_container }} ' /></td>
                            <td hidden >{{ $dr_detail->commodity_id }}<input hidden type='text' name='dr_cargo_commodity_id[{{ $dr_detail->line  }}]' value='{{ $dr_detail->commodity_id }} ' /></td>
                            <td hidden >{{ ((isset($dr_detail)and $dr_detail->commodity_id >0) ? $dr_detail->cargo_commodity->name: null) }}<input hidden type='text' name='dr_cargo_commodity_name[{{ $dr_detail->line  }}]' value='{{ ((isset($dr_detail)and $dr_detail->commodity_id >0) ? $dr_detail->cargo_commodity->name: null) }} ' /></td>
                            <td  >{{ $dr_detail->dr_weight_metric }}<input hidden type='text' name='dr_cargo_weight_metric[{{ $dr_detail->line }}]' value='{{ $dr_detail->dr_weight_metric }} ' /></td>
                            <td  >{{ $dr_detail->dr_grossw }}<input hidden type='text' name='dr_cargo_grossw[{{ $dr_detail->line  }}]' value='{{ $dr_detail->dr_grossw }} ' /></td>
                            <td  >{{ $dr_detail->dr_cubic }}<input hidden type='text' name='dr_cargo_cubic[{{ $dr_detail->line }}]' value='{{ $dr_detail->dr_cubic }} ' /></td>
                            <td  >{{ $dr_detail->dr_chgrw }}<input hidden type='text' name='dr_cargo_chgrw[{{ $dr_detail->line  }}]' value='{{ $dr_detail->dr_chgrw }} ' /></td>
                            <td hidden >{{ $dr_detail->dr_rate }}<input hidden type='text' name='dr_cargo_rate[{{ $dr_detail->line }}]' value='{{ $dr_detail->dr_rate }} ' /></td>
                            <td hidden >{{ $dr_detail->dr_amount }}<input hidden type='text' name='dr_cargo_amount[{{ $dr_detail->line  }}]' value='{{ $dr_detail->dr_amount }} '/></td>
                            <td hidden >{{ $dr_detail->dr_comment }}<input hidden type='text' name='dr_cargo_comments[{{ $dr_detail->line  }}]' value='{{ $dr_detail->dr_comment }} '/></td>
                            <td><div class='btn-group btn-group-sm pull-right' role='group'><a class='btn btn-default'><span class='icon ion-edit' aria-hidden='true'></span></a><a class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>
                        </tr>
                    @endforeach
                @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
<div class="row row-panel">
    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Freight Charges', 'charges_freight_charges', array('BR' => 'BR - BANK RELEASE','COD' => 'COD - COD','COL' => 'COL - COLLECT','PPD' => 'PPD - PREPAID',), '') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Total Pcs', 'dr_total_pieces', null, '0') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Packages', 'dr_packages', null, '0') !!}</div>
    <div class="col-md-1">{!! Form::bsSelect(null, null, 'KGS/LBS', 'dr_freight_charges', array('K' => 'KGS','L' => 'LBS' ), null) !!}</div>

    <div class="col-md-1">{!! Form::bsText(null,null, 'Act. Wght', 'dr_act_weight', null, '0.00') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Vol. Weight', 'dr_volume_weight', null, '0.00') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Net. Weight', 'dr_net_weight', null, '0.00') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Cubic', 'dr_cubic_weight', null, '0.00') !!}</div>
</div>