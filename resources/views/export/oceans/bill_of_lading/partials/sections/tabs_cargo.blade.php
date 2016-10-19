<div class="row">
    <div class="easyui-tabs">
        <div title="Cargo Details">
            <div class="form-horizontal">
                <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                    <button type="button" id="btn_cargo_details" class="btn btn-default" data-toggle="modal" data-target="#Cargo_Details" onclick="cleanModalFields('Cargo_Details'),  clearTable('cargo_vehicle_details')">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-danger"  onclick="clearTable('cargo_details')">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>

                <table class="table table-bordered table-condensed" id="cargo_details">
                    <thead>
                    <tr>
                        <th data-override="cargo_line" hidden></th>
                        <th width="10%" data-override="cargo_marks">Marks</th>
                        <th width="5%" data-override="cargo_pieces">Pieces</th>
                        <th width="15%" data-override="cargo_description">Comm. Description</th>
                        <th width="5%" data-override="cargo_unit">Unit</th>
                        <th width="10%" data-override="cargo_gross_weight">Gross Weight</th>
                        <th width="10%" data-override="cargo_cubic">Cubic</th>
                        <th width="10%" data-override="cargo_charge_weight">Charge Weight</th>
                        <th width="12%"/>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($bill_of_lading))
                        @foreach($bill_of_lading->cargo as $detail)
                            <tr id="{{ $detail->line }}">
                                {!! Form::bsRowTd($detail->line, 'cargo_line', $detail->line, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_marks', $detail->cargo_marks, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_pieces', $detail->cargo_pieces, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_description', $detail->cargo_description, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_weight_unit', $detail->cargo_weight_unit, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_weight_k', $detail->cargo_weight_k, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_cubic_k', $detail->cargo_cubic_k, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_charge_weight_k', $detail->cargo_charge_weight_k, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_weight_l', $detail->cargo_weight_l, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_cubic_l', $detail->cargo_cubic_l, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_charge_weight_l', $detail->cargo_charge_weight_l, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_rate', $detail->cargo_rate, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_amount', $detail->cargo_amount, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_container', $detail->cargo_container, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_type_id', $detail->cargo_type_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_type_code', (($detail->cargo_type_id >0) ? $detail->cargo_type->code: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_commodity_id', $detail->cargo_commodity_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_commodity_name', (($detail->cargo_commodity_id >0) ? $detail->cargo_commodity->code: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_comments', $detail->cargo_comments, true) !!}
                                {!! Form::bsRowBtns() !!}
                        </tr>
                        @endforeach
                        @endif


                    </tbody>
                </table>
                <table class="table hidden" id="details_hidden">
                    <tbody>
                    @if(isset($bill_of_lading))
                        @foreach($bill_of_lading->cargo_details as $detail)
                            <tr id="{{ $detail->line }}">
                            {!! Form::bsRowTd($detail->line, 'cargo_id', $detail->cargo_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_line', $detail->line, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_quantity', $detail->quantity, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_unit', $detail->unit, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_length', $detail->length, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_width', $detail->width, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_height', $detail->height, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_total_weight', $detail->total_weight, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_total_cubic', $detail->total_cubic, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_cargo_type_id', $detail->cargo_type_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_cargo_type_code',  (($detail->cargo_type_id >0) ? $detail->cargo_type->code: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_metric_unit', $detail->metric_unit, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_materials', $detail->materials, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_pieces', $detail->pieces, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_unit_weight', $detail->unit_weight, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_dim_fact', $detail->dim_fact, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_vol_weight', $detail->vol_weight, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_serial_number', $detail->serial_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_barcode', $detail->barcode, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_Model', $detail->Model, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_commodity_id', $detail->commodity_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_commodity_name', (($detail->commodity_id >0) ? $detail->commodity->code: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_pro_number', $detail->pro_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_project', $detail->project, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_po_number', $detail->po_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_inv_number', $detail->inv_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_lot_number', $detail->lot_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_sku_number', $detail->sku_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_destination_point', $detail->destination_point, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_attention', $detail->attention, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_scheduleb_id', $detail->scheduleb_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_scheduleb_code', (($detail->scheduleb_id >0) ? $detail->scheduleb->code: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_scheduleb_description', $detail->scheduleb_description, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_hts_id', $detail->hts_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_hts_code', (($detail->hts_id >0) ? $detail->details_hts->code: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_hts_description', $detail->hts_description, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_value', $detail->value, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_eccn', $detail->eccn, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_export_id', $detail->export_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_export_code',(($detail->export_id >0) ? $detail->export_id->code: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_license_type_id', $detail->license_type_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_license_type_code',(($detail->license_type_id >0) ? $detail->license_type->code: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_origin', $detail->origin, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_ncm_code', $detail->ncm_code, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_uns_id', $detail->uns_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_uns_code', (($detail->uns_id >0) ? $detail->uns_code->code: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_uns_description', $detail->uns_description, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_class_id', $detail->class_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_class_description', $detail->class_description, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_packing_group', $detail->packing_group, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_flash_point', $detail->flash_point, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_flashing_point_type', $detail->flashing_point_type, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_special_instructions', $detail->special_instructions, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_units', $detail->units, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_material_page', $detail->material_page, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_hazardous_quantity', $detail->hazardous_quantity, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_label_required', $detail->label_required, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_emergency_contact', $detail->emergency_contact, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_emergency_contact_phone', $detail->emergency_contact_phone, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_comments', $detail->comments, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_vin', $detail->vehicle_vin, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_type', $detail->vehicle_type, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_color', $detail->vehicle_color, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_year', $detail->vehicle_year, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_condition', $detail->vehicle_condition, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_make', $detail->vehicle_make, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_keys', $detail->vehicle_keys, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_model', $detail->vehicle_model, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_running', $detail->vehicle_running, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_trim', $detail->vehicle_trim, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_mileage', $detail->vehicle_mileage, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_engine', $detail->vehicle_engine, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_tag', $detail->vehicle_tag, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_body', $detail->vehicle_body, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_other', $detail->vehicle_other, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_number', $detail->vehicle_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_state_province_id', $detail->vehicle_state_province_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_state_province_name', (($detail->vehicle_state_province_id >0) ? $detail->vehicle_state_province->code: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_received', $detail->vehicle_received, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_inspection_number', $detail->vehicle_inspection_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_inspection_date', $detail->vehicle_inspection_date, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_inspection_by', $detail->vehicle_inspection_by, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_lot_number', $detail->vehicle_lot_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'vehicle_buyer_number', $detail->vehicle_buyer_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'detail_type', $detail->detail_type, true) !!}
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div title="BL Comments">
            <div class="row">
                <div class="col-md-3">{!! Form::bsText('col-md-5', 'col-md-7', 'BL Comments', 'bl_comments', null, ' ') !!}</div>
                <div class="col-md-3">{!! Form::bsSelect('col-md-4', 'col-md-8', 'Doc Type', 'bl_doc_type', array(
            'C' => 'ORIGINAL',
            'P' => 'EXPRESS RELEASE',
        ), 'Type') !!}</div>
            </div>

            <div class="row">
                <div class="col-md-12">{!! Form::bsMemo(null, null, '', 'bl_notes', null, ' ') !!}</div>
            </div>
        </div>


        <div title="Container Details">
            <div class="form-horizontal">
                <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                    <button type="button" id="btn_container_details" class="btn btn-default" data-toggle="modal" data-target="#Container_Details" onclick="cleanModalFields('Container_Details'), clearTable('hazardous-details')">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    </button>
                    <button type="button"  class="btn btn-danger" onclick="clearTable('container_details'), clearTable('hazardous-details')">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>

                <table class="table table-bordered table-condensed" id="container_details">
                    <thead>
                    <tr>
                        <th data-override="container_line" hidden></th>
                        <th width="10%" data-override="equipment_type">Equipment type</th>
                        <th width="10%" data-override="equipment_number">Equipment number.</th>
                        <th width="10%" data-override="equipment_seal" >Equip. Seal</th>
                        <th width="10%" data-override="container_unit">Pick up</th>
                        <th width="10%" data-override="container_status">Delivery</th>
                        <th width="10%" data-override="container_weight">Drop</th>

                        <th width="12%"/>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($bill_of_lading))
                        @foreach($bill_of_lading->container as $detail)
                            <tr id="{{ $detail->line }}">
                            {!! Form::bsRowTd($detail->line, 'container_line', $detail->line, true) !!}
                            {!! Form::bsRowTd($detail->line, 'equipment_type_id', $detail->equipment_type_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'equipment_type_code',  (($detail->equipment_type_id >0) ? $detail->equipment_type->code: null), false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_number', $detail->container_number, false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_seal_number', $detail->container_seal_number, false) !!}
                                {!! Form::bsRowTd($detail->line, 'shipper_owned', $detail->shipper_owned, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_commodity_id', $detail->container_commodity_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_commodity_name',  (($detail->container_commodity_id >0) ? $detail->container_commodity->code: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'pd_status', $detail->pd_status, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_spotting_date', $detail->container_spotting_date, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pull_date', $detail->container_pull_date, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_carrier_id', $detail->container_carrier_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_carrier_name',  (($detail->container_carrier_id >0) ? $detail->container_carrier->name: null), true) !!}

                                {!! Form::bsRowTd($detail->line, 'container_ventilation', $detail->container_ventilation, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_degrees', $detail->container_degrees, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_temperature', $detail->container_temperature, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_max', $detail->container_max, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_min', $detail->container_min, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_id', $detail->container_pickup_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_name',  (($detail->container_pickup_id >0) ? $detail->container_pickup->name: null), false) !!}

                                {!! Form::bsRowTd($detail->line, 'container_pickup_type', $detail->container_pickup_type, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_address', $detail->container_pickup_address, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_city', $detail->container_pickup_city, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_state_id', $detail->container_pickup_state_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_state_name',  (($detail->container_pickup_state_id >0) ? $detail->container_pickup_state->name: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_zip_code_id', $detail->container_pickup_zip_code_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_zip_code_code',  (($detail->container_pickup_zip_code_id >0) ? $detail->container_pickup_zip_code->name: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_phone', $detail->container_pickup_phone, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_contact', $detail->container_pickup_contact, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_date', $detail->container_pickup_date, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_number', $detail->container_pickup_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_id', $detail->container_delivery_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_name',  (($detail->container_delivery_id >0) ? $detail->container_delivery->name: null), false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_type', $detail->container_delivery_type, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_address', $detail->container_delivery_address, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_city', $detail->container_delivery_city, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_state_id', $detail->container_delivery_state_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_state_name',  (($detail->container_delivery_state_id >0) ? $detail->container_delivery_state->name: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_zip_code_id', $detail->container_delivery_zip_code_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_zip_code_code',  (($detail->container_delivery_zip_code_id >0) ? $detail->container_delivery_zip_code->name: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_phone', $detail->container_delivery_phone, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_contact', $detail->container_delivery_contact, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_date', $detail->container_delivery_date, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_number', $detail->container_delivery_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_id', $detail->container_drop_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_name', (($detail->container_drop_id >0) ? $detail->container_drop->name: null), false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_type', $detail->container_drop_type, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_address', $detail->container_drop_address, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_city', $detail->container_drop_city, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_state_id', $detail->container_drop_state_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_state_name', (($detail->container_drop_state_id >0) ? $detail->container_drop_state->name: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_zip_code_id', $detail->container_drop_zip_code_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_zip_code_code', (($detail->container_drop_zip_code_id >0) ? $detail->container_drop_zip_code->name: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_phone', $detail->container_drop_phone, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_contact', $detail->container_drop_contact, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_date', $detail->container_drop_date, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_number', $detail->container_drop_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_hazardous_contact', $detail->container_hazardous_contact, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_hazardous_phone', $detail->container_hazardous_phone, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_comments', $detail->container_comments, true) !!}
                                {!! Form::bsRowBtns() !!}
                        @endforeach
                    @endif
                    </tbody>
                </table>

                <table class="table hidden" id="hzd_details">
                    <tbody>
                    @if(isset($bill_of_lading))
                        @foreach($bill_of_lading->hazardous as $detail)
                            <tr id="{{ $detail->line }}">
                                {!! Form::bsRowTd($detail->line, 'hzd_container_id', $detail->container_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'hzd_line', $detail->line, true) !!}
                                {!! Form::bsRowTd($detail->line, 'hzd_uns_id', $detail->hzd_uns_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'hzd_uns_code',(($detail->hzd_uns_id >0) ? $detail->hzd_uns->name: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'hzd_uns_desc', $detail->hzd_uns_desc, true) !!}
                                {!! Form::bsRowTd($detail->line, 'hzd_uns_note', $detail->hzd_uns_note, true) !!}
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>

<div class="row row-panel">
    <div class="col-md-1">{!! Form::bsText(null,null, 'Pieces', 'total_pieces', null, '0') !!}</div>
    <div class="col-md-3">{!! Form::bsComplete(null, null,'Commodity', 'total_commodity_id', 'total_commodity_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->total_commodity_id > 0) ? $booking_entry->total_commodity->code : null), 'Commodity') !!}</div>
    <div class="col-md-1">{!! Form::bsSelect(null, null, 'Kgs/Lbs.', 'total_weight_unit_measurement',  array('K' => 'KGS','L' => 'LBS' ), null)!!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Weight (Kgs)', 'total_weight_kgs', null, '0.000') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Cubic (CBM)', 'total_cubic_cbm', null, '0.000') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'C Wght (Kgs)', 'total_charge_weight_kgs', null, '0.000') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Weight (Lbs)', 'total_weight_lbs', null, '0.000') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Cubic (CFT)', 'total_cubic_cft', null, '0.000') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'C Wght (Lbs)', 'total_charge_weight_lbs', null, '0.000') !!}</div>

</div>
