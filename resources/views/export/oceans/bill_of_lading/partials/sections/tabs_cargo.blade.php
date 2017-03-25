
    <div class="easyui-tabs" id="tabs_details">
        <div title="Cargo Details">
            <div class="form-horizontal">
                <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                    <a type="button" class="btn btn-primary btn-sm" id="btn-load-houses" onclick="validateRequiredField(), clearTableCondition('load_warehouses')"><span>Link Houses</span></a>
                    <button type="button" class="btn btn-danger"  id="delete_cargo">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>

                <table class="table table-bordered table-condensed" id="cargo_details">
                    <thead>
                    <tr>
                        <th data-override="cargo_line" hidden></th>
                        <th width="20%" data-override="cargo_marks">Marks</th>
                        <th width="5%" data-override="cargo_pieces">Pieces</th>
                        <th width="20%" data-override="cargo_description">Comm. Description</th>
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
                            {!! Form::bsRowTd($detail->line, 'cargo_description', strtoupper($detail->cargo_description), false) !!}
                            {!! Form::bsRowTd($detail->line, 'cargo_weight_unit', $detail->cargo_weight_unit, false) !!}
                            {!! Form::bsRowTd($detail->line, 'cargo_weight_k', $detail->cargo_weight_k, true) !!}
                            {!! Form::bsRowTd($detail->line, 'cargo_cubic_k', $detail->cargo_cubic_k, true) !!}
                            {!! Form::bsRowTd($detail->line, 'cargo_charge_weight_k', $detail->cargo_charge_weight_k, true) !!}
                            {!! Form::bsRowTd($detail->line, 'cargo_weight_l', $detail->cargo_weight_l, false) !!}
                            {!! Form::bsRowTd($detail->line, 'cargo_cubic_l', $detail->cargo_cubic_l, false) !!}
                            {!! Form::bsRowTd($detail->line, 'cargo_charge_weight_l', $detail->cargo_charge_weight_l, false) !!}
                            {!! Form::bsRowTd($detail->line, 'cargo_rate', $detail->cargo_rate, true) !!}
                            {!! Form::bsRowTd($detail->line, 'cargo_amount', $detail->cargo_amount, true) !!}
                            {!! Form::bsRowTd($detail->line, 'cargo_container', $detail->cargo_container, true) !!}
                            {!! Form::bsRowTd($detail->line, 'cargo_type_id', $detail->cargo_type_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'cargo_type_code', strtoupper(($detail->cargo_type_id >0) ? $detail->cargo_type->code: null), true) !!}
                            {!! Form::bsRowTd($detail->line, 'cargo_commodity_id', strtoupper($detail->cargo_commodity), true) !!}
                            {!! Form::bsRowTd($detail->line, 'cargo_commodity_name', strtoupper($detail->cargo_commodity), true) !!}
                            {!! Form::bsRowTd($detail->line, 'cargo_comments', $detail->cargo_comments, true) !!}
                            {!! Form::bsRowBtns() !!}
                                    </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <table id="hidden_id" class="table hidden">
                    <tbody>
                    @if(isset($bill_of_lading))
                        @if ($bill_of_lading->bl_class == '3')
                            @foreach($bill_of_lading->hbl_node as $key=>$detail)
                                <tr id="{{ $key + 1 }}">
                                    {!! Form::bsRowTd($key + 1, 'cargo_hbl_id', $detail->id, true) !!}
                                </tr>
                            @endforeach
                        @else
                            @foreach($bill_of_lading->pivot as $key=>$detail)
                                <tr id="{{ $key + 1 }}">
                                    {!! Form::bsRowTd($key + 1, 'cargo_hbl_id', (count($detail->receipt_entry) > 0 ? $detail->receipt_entry->id  : "" ), true) !!}
                                </tr>
                            @endforeach
                        @endif

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
                            {!! Form::bsRowTd($detail->line, 'details_cargo_type_code',  strtoupper(($detail->cargo_type_id >0) ? $detail->cargo_type->code: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_metric_unit', $detail->metric_unit, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_materials', strtoupper($detail->materials), true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_pieces', $detail->pieces, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_unit_weight', $detail->unit_weight, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_dim_fact', $detail->dim_fact, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_vol_weight', $detail->vol_weight, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_serial_number', $detail->serial_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_barcode', $detail->barcode, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_Model', $detail->Model, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_commodity_id', $detail->commodity_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'details_commodity_name', strtoupper(($detail->commodity_id >0) ? $detail->commodity->code: null), true) !!}
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
                <div class="col-md-4">{!!Form::bsSelect(null, null, 'BL Comments', 'bl_comments_id',  Sass\BlComment::all()->lists('comment', 'id'), null,'body')!!}</div>
                <div class="col-md-4">{!! Form::bsSelect('col-md-4', 'col-md-8', 'Doc Type', 'bl_doc_type', array(
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
                    <button type="button" id="btn_container_details" class="btn btn-default" data-toggle="modal" data-target="#Container_Details" onclick="cleanModalFields('Container_Details'), clearTableCondition('hazardous-details')">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    </button>
                    <button type="button"  class="btn btn-danger" id="delete_container">
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
                        @foreach($bill_of_lading->shipment->containers as $detail)
                            <tr id="{{ $detail->line }}">
                            {!! Form::bsRowTd($detail->line, 'container_line', $detail->line, true) !!}
                            {!! Form::bsRowTd($detail->line, 'equipment_type_id', $detail->equipment_type_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'equipment_type_code',  strtoupper(($detail->equipment_type_id >0) ? $detail->equipment_type->code: null), false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_number', strtoupper($detail->container_number), false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_seal_number', $detail->container_seal_number, false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_seal_number2', $detail->container_seal_number2, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_commodity_id', strtoupper($detail->container_commodity), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_commodity_name',  strtoupper($detail->container_commodity), true) !!}
                                {!! Form::bsRowTd($detail->line, 'pd_status', $detail->pd_status, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_spotting_date', $detail->spotting_date, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pull_date', $detail->pull_date, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_carrier_id', $detail->carrier_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_carrier_name',  (($detail->carrier_id >0) ? $detail->carrier->name: null), true) !!}

                                {!! Form::bsRowTd($detail->line, 'container_ventilation', $detail->container_ventilation, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_degrees', $detail->container_degrees, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_temperature', $detail->container_temperature, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_max', $detail->container_max, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_min', $detail->container_min, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_id', $detail->pickup_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_name',  strtoupper(($detail->pickup_id >0) ? $detail->pickup->name: null), false) !!}

                                {!! Form::bsRowTd($detail->line, 'container_pickup_type', $detail->pickup_type, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_address', strtoupper($detail->pickup_address), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_city', strtoupper($detail->pickup_city), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_state_id', $detail->pickup_state_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_state_name',  strtoupper(($detail->pickup_state_id >0) ? $detail->pickup_state->name: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_zip_code_id', $detail->pickup_zip_code_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_zip_code_code',  strtoupper(($detail->pickup_zip_code_id >0) ? $detail->pickup_zip_code->name: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_phone', $detail->pickup_phone, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_contact', $detail->pickup_contact, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_date', $detail->pickup_date, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_number', $detail->pickup_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_id', $detail->delivery_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_name',  strtoupper(($detail->delivery_id >0) ? $detail->delivery->name: null), false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_type', $detail->delivery_type, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_address', strtoupper($detail->delivery_address), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_city', strtoupper($detail->delivery_city), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_state_id', $detail->delivery_state_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_state_name',  strtoupper(($detail->delivery_state_id >0) ? $detail->delivery_state->name: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_zip_code_id', $detail->delivery_zip_code_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_zip_code_code',  strtoupper(($detail->delivery_zip_code_id >0) ? $detail->delivery_zip_code->name: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_phone', $detail->delivery_phone, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_contact', $detail->delivery_contact, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_date', $detail->delivery_date, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_number', $detail->delivery_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_id', $detail->drop_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_name', strtoupper(($detail->drop_id >0) ? $detail->drop->name: null), false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_type', $detail->drop_type, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_address', strtoupper($detail->drop_address), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_city', strtoupper($detail->drop_city), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_state_id', $detail->drop_state_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_state_name', strtoupper(($detail->drop_state_id >0) ? $detail->drop_state->name: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_zip_code_id', $detail->drop_zip_code_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_zip_code_code', strtoupper(($detail->drop_zip_code_id >0) ? $detail->drop_zip_code->name: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_phone', $detail->drop_phone, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_contact', $detail->drop_contact, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_date', $detail->drop_date, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_number', $detail->drop_number, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_hazardous_contact', $detail->container_hazardous_contact, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_hazardous_phone', $detail->container_hazardous_phone, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_comments', strtoupper($detail->container_comments), true) !!}
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

    <div class="row">
        <div class="col-md-6">
            <div class="col-md-2">{!! Form::bsText(null,null, 'Pieces', 'total_pieces', null, '0') !!}</div>
            <div class="col-md-5">{!! Form::bsText(null,null, 'Commodity', 'total_commodity_name', null, '') !!}</div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">{!! Form::bsSelect(null, null, 'Kgs/Lbs.', 'total_weight_unit_measurement',  array('K' => 'KGS','L' => 'LBS' ), null)!!}</div>
                <div class="col-md-3">{!! Form::bsText(null,null, 'Weight(K)', 'total_weight_kgs', null, '0.000') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null,null, 'Cubic(Cbm)', 'total_cubic_cbm', null, '0.000') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null,null, 'C Wght(K)', 'total_charge_weight_kgs', null, '0.000') !!}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-6 col-md-6">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3">{!! Form::bsText(null,null, 'Weight(L)', 'total_weight_lbs', null, '0.000') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null,null, 'Cubic(cft)', 'total_cubic_cft', null, '0.000') !!}</div>
                <div class="col-md-3">{!! Form::bsText(null,null, 'C Wght(L)', 'total_charge_weight_lbs', null, '0.000') !!}</div>
            </div>
        </div>
    </div>
