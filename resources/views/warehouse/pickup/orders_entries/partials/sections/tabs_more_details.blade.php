
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
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_id', $cargo_detail->line, true) !!}
                                @if ($cargo_detail->type_package == 0)
                                    <td><i class="fa fa-cube" aria-hidden="true"/></td>
                                @else
                                    <td><i class="fa fa-car" aria-hidden="true"/></td>
                                @endif
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_id', $cargo_detail->line, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_quantity', $cargo_detail->cargo_quantity, false) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_cargo_type_id', $cargo_detail->cargo_type_id, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_cargo_type_name', ((isset($cargo_detail)and $cargo_detail->cargo_type_id >0) ? $cargo_detail->cargo_type->code: null), false) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_length', $cargo_detail->cargo_length, false) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_width', $cargo_detail->cargo_width, false) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_height', $cargo_detail->cargo_height, false) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_total_weight', $cargo_detail->cargo_total_weight, false) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_net_weight', $cargo_detail->cargo_net_weight, false) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_weight_unit_measurement_id', $cargo_detail->cargo_weight_unit_measurement_id, false) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_cubic', $cargo_detail->cargo_cubic, false) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'part_info_po_number', $cargo_detail->part_info_po_number, false) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_volume_weight', $cargo_detail->cargo_volume_weight, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_metric_unit_measurement_id', $cargo_detail->cargo_metric_unit_measurement_id, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_material', $cargo_detail->cargo_material, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_pieces', $cargo_detail->cargo_pieces, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_unit_weight', $cargo_detail->cargo_unit_weight, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_dim_fact', $cargo_detail->cargo_dim_fact, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_location_id', $cargo_detail->cargo_location_id, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_location_name', ((isset($cargo_detail)and $cargo_detail->cargo_location_id >0) ? $cargo_detail->cargo_location->code: null), true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_location_bin_id', $cargo_detail->cargo_location_bin_id, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_location_bin_name', ((isset($cargo_detail)and $cargo_detail->cargo_location_bin_id >0) ? $cargo_detail->cargo_location_bin->code: null), true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_tare_weight', $cargo_detail->cargo_tare_weight, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'cargo_square_foot', $cargo_detail->cargo_square_foot, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'part_info_serial_number', $cargo_detail->part_info_serial_number, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'part_info_barcode', $cargo_detail->part_info_barcode, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'part_info_Model', $cargo_detail->part_info_Model, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'part_info_commodity_id', $cargo_detail->part_info_commodity_id, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'part_info_commodity_name', ((isset($cargo_detail)and $cargo_detail->part_info_commodity_id >0) ? $cargo_detail->part_info_commodity->code: null), true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'part_info_pro_number', $cargo_detail->part_info_pro_number, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'part_info_project', $cargo_detail->part_info_project, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'part_info_inv_number', $cargo_detail->part_info_inv_number, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'part_info_lot_number', $cargo_detail->part_info_lot_number, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'part_info_sku_number', $cargo_detail->part_info_sku_number, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'part_info_destination_point', $cargo_detail->part_info_destination_point, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'part_info_attention', $cargo_detail->part_info_attention, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'eei_info_scheduleb_id', $cargo_detail->eei_info_scheduleb_id, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'eei_info_scheduleb_code',((isset($cargo_detail)and $cargo_detail->eei_info_scheduleb_id >0) ? $cargo_detail->eei_info_scheduleb->code: null), true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'eei_info_scheduleb_description', $cargo_detail->eei_info_scheduleb_description, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'eei_info_hts_id', $cargo_detail->eei_info_hts_id, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'eei_info_hts_name', ((isset($cargo_detail)and $cargo_detail->eei_info_hts_id >0) ? $cargo_detail->eei_info_hts->code: null), true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'eei_info_hts_description', $cargo_detail->eei_info_hts_description, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'eei_info_value', $cargo_detail->eei_info_value, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'eei_info_eccn', $cargo_detail->eei_info_eccn, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'eei_info_export_id', $cargo_detail->eei_info_export_id, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'eei_info_export_code', ((isset($cargo_detail)and $cargo_detail->eei_info_export_id >0) ? $cargo_detail->eei_info_export->code: null) , true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'eei_info_license_type_id', $cargo_detail->eei_info_license_type_id, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'eei_info_license_type_code', ((isset($cargo_detail)and $cargo_detail->eei_info_license_type_id >0) ? $cargo_detail->eei_info_license_type->code: null), true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'eei_info_origin', $cargo_detail->eei_info_origin, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_proper_shipping_name', $cargo_detail->hazardous_proper_shipping_name, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_un_id', $cargo_detail->hazardous_un_id, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_un_code', ((isset($cargo_detail)and $cargo_detail->hazardous_un_id >0) ? $cargo_detail->hazardous_un->code: null), true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_un_description', $cargo_detail->hazardous_un_description, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_class_id', $cargo_detail->hazardous_class_id, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_class_description', $cargo_detail->hazardous_class_description, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_packing_group', $cargo_detail->hazardous_packing_group, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_flash_point', $cargo_detail->hazardous_flash_point, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_flashing_point_type', $cargo_detail->hazardous_flashing_point_type, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_special_instructions', $cargo_detail->hazardous_special_instructions, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_units', $cargo_detail->hazardous_units, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_material_page', $cargo_detail->hazardous_material_page, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_quantity', $cargo_detail->hazardous_quantity, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_label_required', $cargo_detail->hazardous_label_required, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_emergency_contact', $cargo_detail->hazardous_emergency_contact, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'hazardous_emergency_contact_phone', $cargo_detail->hazardous_emergency_contact_phone, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'reference_vendor_code', $cargo_detail->reference_vendor_code, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'reference_vendor_name', ((isset($cargo_detail)and $cargo_detail->reference_vendor_code >0) ? $cargo_detail->reference_vendor->code: null), true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'reference_final_dest', $cargo_detail->reference_final_dest, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'reference_customer_reference', $cargo_detail->reference_customer_reference, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'shipping_type', $cargo_detail->shipping_type, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'shipping_date_in', $cargo_detail->shipping_date_in, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'shipping_date_out', $cargo_detail->shipping_date_out, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'shipping_reference', $cargo_detail->shipping_reference, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'shipping_file', $cargo_detail->shipping_file, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'other_vendor_delivery', $cargo_detail->other_vendor_delivery, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'other_shipping_date', $cargo_detail->other_shipping_date, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'other_department_id', $cargo_detail->other_department_id, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'other_department_name', ((isset($cargo_detail)and $cargo_detail->other_department_id >0) ? $cargo_detail->other_department->code: null), true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'other_from_system', $cargo_detail->other_from_system, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'other_concession', $cargo_detail->other_concession, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'other_ultimate_consignee_id', $cargo_detail->other_ultimate_consignee_id, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'other_ultimate_consignee_name', ((isset($cargo_detail)and $cargo_detail->other_ultimate_consignee_id >0) ? $cargo_detail->other_ultimate_consignee->name: null), true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'comments_comment', $cargo_detail->comments_comment, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_vin', $cargo_detail->vehicle_vin, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_type', $cargo_detail->vehicle_type, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_color', $cargo_detail->vehicle_color, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_year', $cargo_detail->vehicle_year, true) !!}

                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_condition', $cargo_detail->vehicle_condition, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_make', $cargo_detail->vehicle_make, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_keys', $cargo_detail->vehicle_keys, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_model', $cargo_detail->vehicle_model, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_running', $cargo_detail->vehicle_running, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_trim', $cargo_detail->vehicle_trim, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_mileage', $cargo_detail->vehicle_mileage, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_engine', $cargo_detail->vehicle_engine, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_tag', $cargo_detail->vehicle_tag, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_body', $cargo_detail->vehicle_body, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_other', $cargo_detail->vehicle_other, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_number', $cargo_detail->vehicle_number, true) !!}

                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_state_province_id', $cargo_detail->vehicle_state_province_id, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_state_province_name', ((isset($cargo_detail)and $cargo_detail->vehicle_state_province_id >0) ? $cargo_detail->vehicle_state_province->name: null), true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_received', $cargo_detail->vehicle_received, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_inspection_number', $cargo_detail->vehicle_inspection_number, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_inspection_date', $cargo_detail->vehicle_inspection_date, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_inspection_by', $cargo_detail->vehicle_inspection_by, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_lot_number', $cargo_detail->vehicle_lot_number, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'vehicle_buyer_number', $cargo_detail->vehicle_buyer_number, true) !!}
                                {!! Form::bsRowTd($cargo_detail->line, 'type_package', $cargo_detail->type_package, true) !!}
                                {!! Form::bsRowBtns() !!}
                            </tr>
                        @endforeach
                        @endif

                        </tbody>
                    </table>
                    <table class="table hidden" id="items_warehouse_details">
                         <tbody>
                         @if (isset($cargo_items_details))
                            @foreach($cargo_items_details as $detail)
                                <tr data-id="{{$detail->cargo_id }}">
                                    {!! Form::bsRowTd($detail->line, 'cargo_whr_id', $detail->cargo_id, true) !!}
                                    {!! Form::bsRowTd($detail->line, 'item_whr_line', $detail->line, true) !!}
                                    {!! Form::bsRowTd($detail->line, 'item_whr_pieces', $detail->item_pieces, true) !!}
                                    {!! Form::bsRowTd($detail->line, 'item_whr_item_name', ((isset($detail)and $detail->item_detail_id >0) ? $detail->item_detail->code: null), true) !!}
                                    {!! Form::bsRowTd($detail->line, 'item_whr_unit_weight', $detail->item_unit_weight, true) !!}
                                    {!! Form::bsRowTd($detail->line, 'item_whr_brand', $detail->item_brand, true) !!}
                                    {!! Form::bsRowTd($detail->line, 'item_whr_vendor_name', ((isset($detail)and $detail->vendor_id >0) ? $detail->vendors->code: null), true) !!}
                                    {!! Form::bsRowTd($detail->line, 'item_whr_origin', $detail->item_origin, true) !!}
                                    {!! Form::bsRowTd($detail->line, 'item_whr_exp_date', $detail->item_exp_date, true) !!}
                                    {!! Form::bsRowTd($detail->line, 'item_whr_item_id', $detail->item_detail_id, true) !!}
                                    {!! Form::bsRowTd($detail->line, 'item_whr_vendor_code', $detail->vendor_id, true) !!}
                                    {!! Form::bsRowTd($detail->line, 'cargo_whr_id', $detail->item_brand, true) !!}
                                    {!! Form::bsRowTd($detail->line, 'cargo_whr_id', $detail->item_brand, true) !!}
                                    {!! Form::bsRowTd($detail->line, 'cargo_whr_id', $detail->item_brand, true) !!}
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
                        @foreach ($container_details as $detail)

                            <tr id="{{ $detail->line }}">
                                {!! Form::bsRowTd($detail->line, 'container_line', $detail->line, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_equipment_type_code', ((isset($detail)and $detail->container_equipment_type_id >0) ? $detail->container_equipment_type->code: null), false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_equipment_type_id', $detail->container_equipment_type_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_container', $detail->container_container, false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_seal_number', $detail->container_seal_number, false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_comments', $detail->container_comments, false) !!}
                                {!! Form::bsRowBtns() !!}
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
                    @foreach ($dr_details as $detail)
                        <tr id="{{ $detail->line }}">
                            {!! Form::bsRowTd($detail->line, 'dr_line', $detail->line, true) !!}
                            {!! Form::bsRowTd($detail->line, 'dr_cargo_marks', $detail->dr_marks, false) !!}
                            {!! Form::bsRowTd($detail->line, 'dr_cargo_pieces', $detail->dr_pieces, false) !!}

                            {!! Form::bsRowTd($detail->line, 'dr_cargo_description', $detail->dr_description, false) !!}
                            {!! Form::bsRowTd($detail->line, 'dr_cargo_container', $detail->dr_container, true) !!}
                            {!! Form::bsRowTd($detail->line, 'dr_cargo_commodity_id', $detail->dr_commodity_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'dr_cargo_commodity_name', ((isset($detail)and $detail->commodity_id >0) ? $detail->cargo_commodity->name: null), true) !!}
                            {!! Form::bsRowTd($detail->line, 'dr_cargo_weight_metric', $detail->dr_weight_metric, false) !!}
                            {!! Form::bsRowTd($detail->line, 'dr_cargo_grossw', $detail->dr_grossw, false) !!}
                            {!! Form::bsRowTd($detail->line, 'dr_cargo_cubic', $detail->dr_cubic, false) !!}
                            {!! Form::bsRowTd($detail->line, 'dr_cargo_chgrw', $detail->dr_chgrw, false) !!}
                            {!! Form::bsRowTd($detail->line, 'dr_cargo_rate', $detail->dr_rate, true) !!}
                            {!! Form::bsRowTd($detail->line, 'dr_cargo_amount', $detail->dr_amount, true) !!}
                            {!! Form::bsRowTd($detail->line, 'dr_cargo_comments', $detail->dr_comments, true) !!}
                            {!! Form::bsRowBtns() !!}
                        </tr>
                    @endforeach
                @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
<div class="row">
    <div class="pull-right">
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Freight Charges', 'charges_freight_charges', array('BR' => 'BR - BANK RELEASE','COD' => 'COD - COD','COL' => 'COL - COLLECT','PPD' => 'PPD - PREPAID',), '') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Total Pcs', 'dr_total_pieces', null, '0') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Packages', 'dr_packages', null, '0') !!}</div>
    <div class="col-md-1">{!! Form::bsSelect(null, null, 'KGS/LBS', 'dr_freight_charges', array('K' => 'KGS','L' => 'LBS' ), null) !!}</div>

    <div class="col-md-1">{!! Form::bsText(null,null, 'Act. Wght', 'dr_act_weight', null, '0.00') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null,null, 'Vol. Weight', 'dr_volume_weight', null, '0.00') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null,null, 'Net. Weight', 'dr_net_weight', null, '0.00') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Cubic', 'dr_cubic_weight', null, '0.00') !!}</div>
</div>
</div>