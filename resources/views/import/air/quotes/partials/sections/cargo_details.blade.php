
<div class="form-horizontal">
    <h4>Cargo Details</h4>
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
<div class="row row-padding">
    <div class="col-md-12">
        <div class="col-md-1">{{ Form::bsText(null, null, 'Quantity', 'total_quantity', null) }}</div>
        <div class="col-md-1">{{ Form::bsText(null, null, 'Pieces', 'total_pieces', null) }}</div>
        <div class="col-md-1">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'total_unit_weight', array('K' => 'Kgs','L' => 'Lbs'), null) !!}</div>
        <div class="col-md-1">{{ Form::bsText(null, null, 'T Weight', 'total_weight', null) }}</div>
        <div class="col-md-1">{{ Form::bsText(null, null, 'Cubic', 'total_cubic', null) }}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, 'Cargo Type', 'total_cargo_type_id', Sass\CargoType::all()->lists('code', 'id'), null, 'body') !!}</div>
        <div class="col-md-2">{!! Form::bsComplete(null, null, 'Commodity', 'total_commodity_id', 'total_commodity_code', Request::get('term'), ((isset($quotes) and $quotes->total_commodity_id > 0) ? $quotes->total_commodity->code : null), null, 'options.maintenance.items.commodities', 'options.maintenance.items.commodities', 'maintenance.items.commodities.index') !!}</div>

    </div>
</div>