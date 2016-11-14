<fieldset>
    <legend>Warehouse Details</legend>
    <div class="pull-left" style="padding-bottom: 15px;">
        <div class="btn-group" role="group" aria-label="...">
            <a type="button" class="btn btn-default btn-sm" id="btn-cargo" onclick="cleanModalFields('cargo-warehouse')" data-toggle="modal" data-target="#cargo-warehouse"><i class="fa fa-cube" aria-hidden="true"></i><span>Cargo</span></a>
            <a type="button" class="btn btn-default btn-sm"><i class="fa fa-car" aria-hidden="true"></i><span>Vehicle</span></a>
        </div>
    </div>
    <div class="pull-right">
        <div class="btn-group" role="group" aria-label="...">
            <a type="button" class="btn btn-default btn-sm" id="btn-cargo-multiline" onclick="cleanModalFields('cargo-multiline-warehouse')" data-toggle="modal" data-target="#cargo-multiline-warehouse"><i class="fa fa-cube" aria-hidden="true"></i><span>Package/Multi Line</span></a>
            <a type="button" class="btn btn-default btn-sm"><i class="fa fa-cube" aria-hidden="true"></i><span>Repack</span></a>
        </div>
    </div>
    <table class="table table-bordered table-condensed" id="warehouse-details" style="font-size: 11px;">
        <thead>
        <tr>
            <th data-override="warehouse_details_line" hidden></th>
            <th data-override="warehouse_details_type"></th>
            <th data-override="warehouse_details_quantity">Qty.</th>
            <th data-override="warehouse_details_cargo_type_id" hidden></th>
            <th data-override="warehouse_details_cargo_type_name">Type</th>
            <th data-override="warehouse_details_pieces">Pieces</th>
            <th data-override="warehouse_details_unit">Unit</th>
            <th data-override="warehouse_details_metric" hidden>Metric</th>
            <th data-override="warehouse_details_dim_fact" hidden>DIM</th>
            <th data-override="warehouse_details_length">Length</th>
            <th data-override="warehouse_details_width">Width</th>
            <th data-override="warehouse_details_height">Height</th>
            <th data-override="warehouse_details_weight">Weight</th>
            <th data-override="warehouse_details_cubic">Cubic</th>
            <th data-override="warehouse_details_volume_weight" width="7%">Vol. Weight</th>
            <th data-override="warehouse_details_barcode" hidden>Barcode</th>
            <th data-override="warehouse_details_location_id" hidden></th>
            <th data-override="warehouse_details_location">Location</th>
            <th data-override="warehouse_details_location_bin_id" hidden></th>
            <th data-override="warehouse_details_location_bin">Bin</th>
            <th data-override="warehouse_details_material_description" hidden></th>
            <th data-override="warehouse_details_serial_number">Serial #</th>
            <th></th>
            <th width="12%"/>
        </tr>
        </thead>
        <tbody>
            @if(isset($receipt_entry))
                @foreach($receipt_entry->cargo_details as $detail)
                    <tr id="{{ $detail->line }}">
                        {!! Form::bsRowTd($detail->line, 'cargo_line', $detail->line, true) !!}
                        <td><i class='fa fa-cube' aria-hidden='true'/></td>
                        {!! Form::bsRowTd($detail->line, 'cargo_quantity', $detail->quantity, false) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_type_id', $detail->cargo_type_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_type_code', $detail->cargo_type->code, false) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_pieces', $detail->pieces, false) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_weight_unit_measurement_id', $detail->weight_unit_measurement_id, false) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_metric_unit_measurement_id', $detail->metric_unit_measurement_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_dim_fact', $detail->dim_fact, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_length', $detail->length, false) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_width', $detail->width, false) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_height', $detail->height, false) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_total_weight', $detail->total_weight, false) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_cubic', $detail->cubic, false) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_volume_weight', $detail->volume_weight, false) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_location_id', $detail->location_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_location_name', ($detail->location_id > 0) ? $detail->location->code : "", false) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_location_bin_id', $detail->location_bin_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cargo_location_bin_name', ($detail->location_bin_id > 0) ? $detail->bin->code : "", false) !!}
                        <td></td>
                        {!! Form::bsRowTd($detail->line, 'cargo_material_description', $detail->material_description, true) !!}
                        <td></td>
                        {!! Form::bsRowBtns() !!}
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            {!! Form::hidden('sum_pieces', null, ['id' => 'sum_pieces', 'class' => 'form-control input-sm']) !!}
            {!! Form::hidden('sum_weight', null, ['id' => 'sum_weight', 'class' => 'form-control input-sm']) !!}
            {!! Form::hidden('sum_volume_weight', null, ['id' => 'sum_volume_weight', 'class' => 'form-control input-sm']) !!}
            {!! Form::hidden('sum_cubic', null, ['id' => 'sum_cubic', 'class' => 'form-control input-sm']) !!}
        </tfoot>
    </table>
</fieldset>