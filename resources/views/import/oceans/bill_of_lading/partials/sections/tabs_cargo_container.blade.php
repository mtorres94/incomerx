
    <div class="easyui-tabs">
        <div title="Cargo Details">
            <div class="form-horizontal">
                <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                    <button type="button" id="btn_cargo_details" class="btn btn-default" data-toggle="modal" data-target="#Cargo_Details" onclick="cleanModalFields('Cargo_Details')">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-danger"  id="delete_cargo">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>

                <table class="table table-bordered table-condensed" id="cargo_details">
                    <thead>
                    <tr>
                        <th hidden></th>
                        <th width="10%" >Marks</th>
                        <th width="5%" >Pieces</th>
                        <th width="15%" >Comm. Description</th>
                        <th width="5%" >Unit</th>
                        <th width="10%" >Gross Weight</th>
                        <th width="10%" >Cubic</th>
                        <th width="10%" >Amount</th>

                        <th width="12%"/>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($bill_of_lading))
                        @foreach($bill_of_lading->cargo as $detail)
                            <tr id="{{ $detail->line }}">
                                {!! Form::bsRowTd($detail->line, 'cargo_line', $detail->line, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_marks', $detail->crago_marks, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_pieces', $detail->cargo_pieces, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_description', $detail->cargo_description, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_container', $detail->container, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_type_id', $detail->cargo_type_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_type_code', ($detail->cargo_type_id >0 ? $detail->cargo_type->code : ""), true) !!}

                                {!! Form::bsRowTd($detail->line, 'cargo_weight_unit', $detail->cargo_weight_unit, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_gross_weight', $detail->cargo_gross_weight, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_cubic', $detail->cargo_cubic, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_comments', $detail->cargo_comments, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_charge_weight', $detail->cargo_charge_weight, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_rate', $detail->cargo_rate, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cargo_amount', $detail->cargo_amount, false) !!}

                                {!! Form::bsRowBtns() !!}
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <table class="table hidden" id="details_hidden">
                    <tbody>
                    @if(isset($routing_order))
                        @foreach($bill_of_lading->cargo_details as $detail)
                            <tr data-id="{{ $detail->cargo_id }}">
                            {!! Form::bsRowTd($detail->line, 'details_id', $detail->cargo_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_line', $detail->line, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_quantity', $detail->quantity, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_weight_unit', $detail->weight_unit, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_length', $detail->length, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_width', $detail->width, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_height', $detail->height, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_total_weight', $detail->total_weight, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_total_cubic', $detail->total_cubic, true) !!}

                            {!! Form::bsRowTd($detail->line, 'details_cargo_type_id', $detail->cargo_type_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_cargo_type_code', ($detail->cargo_type_id >0 ? $detail->cargo_type->code : ""), true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_metric_unit', $detail->metric_unit, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_material', $detail->material, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_pieces', $detail->pieces, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_unit_weight', $detail->unit_weight, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_dim_fact', $detail->dim_fact, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_vol_weight', $detail->vol_weight, true) !!}

                            {!! Form::bsRowTd($detail->line, 'details_serial_number', $detail->serial_number, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_barcode', $detail->barcode, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_Model', $detail->model, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_commodity_id', $detail->commodity_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_commodity_name', ($detail->commodity_id >0 ? $detail->commodity->code : ""), true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_pro_number', $detail->pro_number, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_project', $detail->project, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_po_number', $detail->po_number, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_inv_number', $detail->inv_number, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_lot_number', $detail->lot_number, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_sku_number', $detail->sku_number, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_destination_point', $detail->destination_point, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_attention', $detail->attention, true) !!}

                            {!! Form::bsRowTd($detail->line, 'details_scheduleb_id', $detail->scheduleb_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_scheduleb_code', ($detail->scheduleb_id >0 ? $detail->scheduleb->code : ""), true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_scheduleb_description', $detail->schedulb_description, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_hts_id', $detail->hts_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_hts_code', ($detail->hts_id > 0 ? $detail->hts->code : ""), true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_hts_description', $detail->hts_description, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_value', $detail->value, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_eccn', $detail->eccn, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_export_id', $detail->export_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_export_code', ($detail->export_id >0 ? $detail->export->code : ""), true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_license_type_id',$detail->license_type_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_license_type_code', ($detail->license_type_id > 0 ? $detail->license_type->code : ""), true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_origin', $detail->origin, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_ncm_code', $detail->ncm_code, true) !!}

                            {!! Form::bsRowTd($detail->line, 'details_uns_id', $detail->uns_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'details_uns_code', ($detail->uns_id >0 ? $detail->uns->code : ""), true) !!}
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
                            {!! Form::bsRowBtns() !!}

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
                    <button type="button" id="btn_container_details" class="btn btn-default" data-toggle="modal" data-target="#Container_Details" onclick="cleanModalFields('Container_Details')">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    </button>
                    <button type="button"  class="btn btn-danger" onclick="clearTable('container_details')">
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
                        <th width="10%" data-override="container_pickup">Pickup</th>
                        <th width="10%" data-override="container_delivery">Delivery</th>
                        <th width="10%" data-override="container_drop"> Drop</th>

                        <th width="12%"/>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($bill_of_lading))
                        @foreach($bill_of_lading->container as $detail)
                            <tr id="{{ $detail->line }}">
                            {!! Form::bsRowTd($detail->line, 'container_line', $detail->line, true) !!}
                            {!! Form::bsRowTd($detail->line, 'equipment_type_id',  $detail->equipment_type_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'equipment_type_code', ($detail->equipment_type_id >0 ? $detail->equipment_type->code : ""), false) !!}
                            {!! Form::bsRowTd($detail->line, 'container_number', $detail->container_number, false) !!}
                            {!! Form::bsRowTd($detail->line, 'container_seal_number', $detail->seal_number, false) !!}
                            {!! Form::bsRowTd($detail->line, 'container_seal_number2', $detail->seal_number2, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_commodity_id', $detail->commodity_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_commodity_name', ($detail->commodity_id >0 ?$detail->commodity->code : "" ), true) !!}
                            {!! Form::bsRowTd($detail->line, 'pd_status', $detail->pd_status, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_spotting_date', $detail->spotting_date, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_pull_date', $detail->pull_date, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_carrier_id', $detail->carrier_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_carrier_name', ($detail->carrier_id >0 ? $detail->carrier->name : "" ), true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_ventilation', $detail->ventilation, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_degrees', $detail->degrees, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_temperature', $detail->temperature, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_max', $detail->max, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_min', $detail->min, true) !!}

                            {!! Form::bsRowTd($detail->line, 'container_pickup_id', $detail->pickup_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_pickup_name', ($detail->pickup_id >0 ? $detail->pickup->name : ""), false) !!}
                            {!! Form::bsRowTd($detail->line, 'container_pickup_type', $detail->pickup_type, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_pickup_address', $detail->pickup_address, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_pickup_city', $detail->pickup_city, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_pickup_state_id', $detail->pickup_state_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_pickup_state_name', ($detail->pickup_state_id >0 ? $detail->pickup_state->name : ""), true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_pickup_zip_code_id', $detail->pickup_zip_code_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_pickup_zip_code_code', ($detail->pickup_zip_code_id >0 ? $detail->pickup_zip_code->code : ""), true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_pickup_phone', $detail->pickup_phone, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_pickup_contact', $detail->pickup_contact, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_pickup_date', $detail->pickup_date, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_pickup_number', $detail->pickup_number, true) !!}

                            {!! Form::bsRowTd($detail->line, 'container_delivery_id', $detail->delivery_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_delivery_name', ($detail->delivery_id > 0 ? $detail->delivery->name : "" ), false) !!}
                            {!! Form::bsRowTd($detail->line, 'container_delivery_type', $detail->delivery_type, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_delivery_address', $detail->delivery_address, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_delivery_city', $detail->delivery_city, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_delivery_state_id', $detail->delivery_state_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_delivery_state_name', ($detail->delivery_state_id >0 ? $detail->delivery_state->name : ""), true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_delivery_zip_code_id', $detail->delivery_zip_code_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_delivery_zip_code_code', ($detail->delivery_zip_code_id > 0 ? $detail->delivery_zip_code->code : ""), true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_delivery_phone', $detail->delivery_phone, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_delivery_contact', $detail->delivery_contact, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_delivery_date', $detail->delivery_date, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_delivery_number', $detail->delivery_number, true) !!}

                            {!! Form::bsRowTd($detail->line, 'container_drop_id', $detail->drop_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_drop_name', ($detail->drop_id >0 ? $detail->drop->name : ""), false) !!}
                            {!! Form::bsRowTd($detail->line, 'container_drop_type', $detail->drop_type, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_drop_address', $detail->drop_address, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_drop_city', $detail->drop_city, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_drop_state_id', $detail->drop_state_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_drop_state_name', ($detail->drop_state_id >0 ? $detail->drop_state->name : ""), true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_drop_zip_code_id', $detail->drop_zip_code_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_drop_zip_code_code', ($detail->drop_zip_code_id > 0 ? $detail->drop_zip_code->code : ""), true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_drop_phone', $detail->drop_phone, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_drop_contact', $detail->drop_contact, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_drop_date', $detail->drop_date, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_drop_number', $detail->drop_number, true) !!}
                            {!! Form::bsRowTd($detail->line, 'container_comments', $detail->comments, true) !!}

                            {!! Form::bsRowBtns() !!}
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>



            </div>
        </div>
    </div>



<div class="row row-panel">
    <div class="col-md-2">{!! Form::bsText(null,null, 'Value Declared', 'total_value_declared', null, '0') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Pcs', 'total_pieces', null, '0') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null,'Cargo Type', 'total_cargo_type_id', Sass\CargoType::all()->lists('code', 'id'), '', 'body') !!}</div>
    <!--<div class="col-md-2">{!! Form::bsComplete(null, null,'Commodity', 'total_commodity_id', 'total_commodity_name', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->total_commodity_id > 0) ? $bill_of_lading->total_commodity->code : null), '', 'options.maintenance.items.commodities', 'options.maintenance.items.commodities', 'maintenance.items.commodities.index') !!}</div>-->
    <div class="col-md-2">{!! Form::bsText(null,null, 'Commodity', 'total_commodity_name', null) !!}</div>

    <div class="col-md-1">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'total_weight_unit',  array('K' => 'KGS','L' => 'LBS' ), null)!!}</div>

    <div class="col-md-1">{!! Form::bsText(null,null, 'Gross W.', 'total_gross_weight', null, '0.000') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Amount', 'total_amount', null, '0.000') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Cubic', 'total_cubic', null, '0.000') !!}</div>

</div>
