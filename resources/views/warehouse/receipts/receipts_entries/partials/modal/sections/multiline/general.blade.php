<div class="row">
    <div class="col-md-6">
        <div class="row row-panel">
            <div class="col-md-3">{!! Form::bsText(null, null, 'Records', 'multiline_records') !!}</div>
        </div>
        <div class="row row-panel">
            {!! Form::hidden('multiline_cargo_id', null, ['id' => 'multiline_cargo_id', 'class' => 'form-control input-sm']) !!}
            {!! Form::hidden('multiline_cargo_type_code', null, ['id' => 'multiline_cargo_type_code', 'class' => 'form-control input-sm']) !!}
            {!! Form::hidden('multiline_cargo_location_name', null, ['id' => 'multiline_cargo_location_name', 'class' => 'form-control input-sm']) !!}

            {!! Form::hidden('multiline_cargo_weight_unit_measurement_code', null, ['id' => 'multiline_cargo_weight_unit_measurement_code', 'class' => 'form-control input-sm']) !!}
            {!! Form::hidden('multiline_cargo_metric_unit_measurement_code', null, ['id' => 'multiline_cargo_metric_unit_measurement_code', 'class' => 'form-control input-sm']) !!}

            <div class="col-md-3">{!! Form::bsText(null, null, 'Qty.', 'multiline_cargo_quantity', null, '0') !!}</div>
            <div class="col-md-5">{!! Form::bsSelect(null, null, 'Cargo Type', 'multiline_cargo_type_id', Sass\CargoType::all()->lists('code', 'id'), 'CARGO TYPES', true) !!}</div>
            <div class="col-md-4">{!! Form::bsSelect(null, null, 'Inches/Cms', 'multiline_cargo_metric_unit_measurement_id', array('C' => 'CMS', 'I' => 'INCHES'), null) !!}</div>
            <div class="col-md-4">{!! Form::bsText(null, null, 'Length', 'multiline_cargo_length', null, '0.000') !!}</div>
            <div class="col-md-4">{!! Form::bsText(null, null, 'Width', 'multiline_cargo_width', null, '0.000') !!}</div>
            <div class="col-md-4">{!! Form::bsText(null, null, 'Height', 'multiline_cargo_height', null, '0.000') !!}</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row row-panel">
            <div class="col-md-12">{!! Form::bsMemo(null, null, 'Material Descriptions', 'multiline_cargo_material_description', null, 6, '') !!}</div>
        </div>
    </div>
</div>
<div class="row row-panel">
    <div class="col-md-1">{!! Form::bsText(null, null, 'Pcs.', 'multiline_cargo_pieces', null, '0') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'multiline_cargo_weight_unit_measurement_id', array('K' => 'KGS', 'L' => 'LBS'), null) !!}</div>
    <div class="col-md-1">{!! Form::bsText(null, null, 'Weight', 'multiline_cargo_unit_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Total Weight', 'multiline_cargo_total_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Cubic', 'multiline_cargo_cubic', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'DIM Fact', 'multiline_cargo_dim_fact', array('D' => 'DOM', 'I' => 'INT'), null) !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Vol. Weight', 'multiline_cargo_volume_weight', null, '0.000') !!}</div>
    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Location', 'multiline_cargo_location_id', Sass\Location::all()->lists('code', 'id'), 'Location', false) !!}</div>
    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Bin', 'multiline_cargo_location_bin_id',array('A' => 'A', 'B' => 'B', 'C' => 'C'), null) !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Tare Weight', 'multiline_cargo_tare_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Net Weight', 'multiline_cargo_net_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Sq. Foot', 'multiline_cargo_square_foot', null, '0.000') !!}</div>
</div>