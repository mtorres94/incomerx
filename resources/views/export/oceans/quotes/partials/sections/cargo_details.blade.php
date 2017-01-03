<legend>Cargo Details</legend>
<div class="form-horizontal">
    <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
        <button type="button" id="btn_cargo_details" class="btn btn-default" data-toggle="modal" data-target="#Cargo_Details" onclick="cleanModalFields('Cargo_Details')">
            <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-danger"  onclick="clearTable('cargo_details'), calculate_warehouse_details()">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </button>
    </div>

    <table class="table table-bordered table-condensed" id="cargo_details">
        <thead>
        <tr>
            <th data-override="cargo_line" hidden></th>
            <th width="5%" data-override="cargo_fa"></th>
            <th width="15%" data-override="cargo_type">Cargo type</th>
            <th width="10%" data-override="quantity">Quantity</th>
            <th width="10%" data-override="units">Unit</th>
            <th width="10%" data-override="length">Length</th>
            <th width="10%" data-override="width">Width</th>
            <th width="10%" data-override="height">Height</th>
            <th width="10%" data-override="total_weight">Total Weight</th>
            <th width="10%" data-override="cubic">Cubic</th>
            <th width="10%"/>
        </tr>
        </thead>
        <tbody>
        @if(isset($quotes))
            @foreach($quotes->cargo as $detail)
                <tr id="{{ $detail->line }}">
                    {!! Form::bsRowTd($detail->line, 'cargo_line', $detail->line, true) !!}
                    <td><i class='fa fa-cube' aria-hidden='true'/></td>
                    {!! Form::bsRowTd($detail->line, 'cargo_type_id', $detail->cargo_type_id, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_type_code', ($detail->cargo_type_id >0 ? $detail->cargo_type->code : ""), false) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_quantity', $detail->quantity, false) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_weight_unit', $detail->weight_unit, false) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_length', $detail->length, false) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_width', $detail->width, false) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_height', $detail->height, false) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_unit_weight', $detail->unit_weight, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_total_weight', $detail->total_weight, false) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_total_cubic', $detail->total_cubic, false) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_charge_weight', $detail->charge_weight, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_rate', $detail->rate, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_total', $detail->cargo_total, true) !!}

                    {!! Form::bsRowTd($detail->line, 'cargo_metric_unit', $detail->metric_unit, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_material', $detail->material, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_pieces', $detail->pieces, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_dim_fact', $detail->dim_fact, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_vol_weight', $detail->vol_weight, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_serial_number', $detail->serial_number, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_barcode', $detail->barcode, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_Model', $detail->model, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_commodity_id', $detail->commodity_id, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_commodity_name', ($detail->commodity_id >0 ? $detail->commodity->code : ""), true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_pro_number', $detail->pro_number, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_project', $detail->project, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_po_number', $detail->po_number, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_inv_number', $detail->inv_number, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_lot_number', $detail->lot_number, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_sku_number', $detail->sku_number, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_destination_point', $detail->destination_point, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_attention', $detail->attention, true) !!}

                    {!! Form::bsRowTd($detail->line, 'cargo_scheduleb_id', $detail->scheduleb_id, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_scheduleb_code', ($detail->scheduleb_id >0 ? $detail->scheduleb->code : ""), true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_scheduleb_description', $detail->schedule_description, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_hts_id', $detail->hts_id, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_hts_code',($detail->hts_id >0 ? $detail->hts->code :""), true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_hts_description', $detail->hts_description, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_value', $detail->value, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_eccn', $detail->eccn, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_export_id', $detail->export_id, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_export_code', ($detail->export_id > 0 ? $detail->export->code: ""), true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_license_type_id', $detail->license_type_id, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_license_type_code', ($detail->license_type_id >0 ? $detail->license_type->code : ""), true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_origin', $detail->origin, true) !!}

                    {!! Form::bsRowTd($detail->line, 'cargo_uns_id', $detail->uns_id, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_uns_code', ($detail->uns_id >0 ? $detail->uns->code : ""), true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_uns_description', $detail->uns_description, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_class_id', $detail->class_id, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_class_description', $detail->class_description, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_special_instructions', $detail->special_instructions, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_material_page', $detail->material_page, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_hazardous_levels', $detail->hazardous_level, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_emergency_contact', $detail->emergency_contact, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_emergency_contact_phone', $detail->emergency_contact_phone, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_comments', $detail->comments, true) !!}

                    {!! Form::bsRowTd($detail->line, 'cargo_marks', $detail->marks, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_container', $detail->container, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cargo_gross_weight', $detail->gross_weight, true) !!}
                    {!! Form::bsRowBtns()!!}

                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
</div>