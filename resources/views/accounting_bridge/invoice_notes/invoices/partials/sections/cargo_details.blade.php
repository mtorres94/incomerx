<legend>Cargo Details</legend>
<div class="form-horizontal">
    <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
        <button type="button" id="btn_cargo_details" class="btn btn-default" data-toggle="modal" data-target="#cargo_details" onclick="cleanModalFields('cargo_details')">
            <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-danger" onclick="clearTable('cargo_table')" >
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </button>
    </div>

    <table class="table table-bordered table-condensed" id="cargo_table">
        <thead>
        <tr>
            <th hidden></th>
            <th width="10%" >Quantity</th>
            <th width="15%" >Cargo type</th>
            <th width="15%" >Pieces</th>
            <th width="10%" >Unit</th>
            <th width="10%" >Length</th>
            <th width="10%" >Width</th>
            <th width="10%" >Height</th>
            <th width="10%" >Total Weight</th>
            <th width="10%" >Cubic</th>
            <th width="10%" >Vol. weight</th>
            <th width="10%"/>
        </tr>
        </thead>
        <tbody>
        @if(isset($invoice))
            @foreach($invoice->cargo_details as $detail)
              <tr id=" {{ $detail->line }}">
                  {!! Form::bsRowTd($detail->line, 'cargo_line', $detail->line, true) !!}
                  {!! Form::bsRowTd($detail->line, 'cargo_quantity', $detail->quantity, false) !!}
                  {!! Form::bsRowTd($detail->line, 'cargo_type_id', $detail->cargo_type_id, true) !!}
                  {!! Form::bsRowTd($detail->line, 'cargo_type_code', strtoupper($detail->cargo_type_id > 0 ? $detail->cargo_type->code : ""), false) !!}
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
                  {!! Form::bsRowTd($detail->line, 'cargo_location_name', strtoupper($detail->location_id >0 ? $detail->location->code : ""), true) !!}
                  {!! Form::bsRowTd($detail->line, 'cargo_location_bin_id', $detail->location_bin_id, true) !!}
                  {!! Form::bsRowTd($detail->line, 'cargo_material_description', $detail->material_description, true) !!}
                  {!! Form::bsRowTd($detail->line, 'cargo_unit_weight', $detail->unit_weight, true) !!}
                  {!! Form::bsRowBtns() !!}
              </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>