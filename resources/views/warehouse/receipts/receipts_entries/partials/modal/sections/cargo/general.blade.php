<div class="row">
    <div class="col-md-6">
        <div class="row row-panel">
            {!! Form::hidden('tmp_cargo_line', null, ['id' => 'tmp_cargo_line', 'class' => 'form-control input-sm']) !!}
            {!! Form::hidden('tmp_cargo_type_code', null, ['id' => 'tmp_cargo_type_code', 'class' => 'form-control input-sm']) !!}
            {!! Form::hidden('tmp_cargo_location_name', null, ['id' => 'tmp_cargo_location_name', 'class' => 'form-control input-sm']) !!}

            {!! Form::hidden('tmp_cargo_weight_unit_measurement_code', null, ['id' => 'tmp_cargo_weight_unit_measurement_code', 'class' => 'form-control input-sm']) !!}
            {!! Form::hidden('tmp_cargo_metric_unit_measurement_code', null, ['id' => 'tmp_cargo_metric_unit_measurement_code', 'class' => 'form-control input-sm']) !!}

            <div class="col-md-3">{!! Form::bsText(null, null, 'Qty.', 'tmp_cargo_quantity', null, '0') !!}</div>
            <div class="col-md-5">{!! Form::bsSelect(null, null, 'Cargo Type', 'tmp_cargo_type_id', Sass\CargoType::all()->lists('code', 'id'), 'CARGO TYPES', false) !!}</div>
            <div class="col-md-4">{!! Form::bsSelect(null, null, 'Inches/Cms', 'tmp_cargo_metric_unit_measurement_id', array('C' => 'CMS', 'I' => 'INCHES'), null) !!}</div>
            <div class="col-md-4">{!! Form::bsText(null, null, 'Length', 'tmp_cargo_length', null, '0.000') !!}</div>
            <div class="col-md-4">{!! Form::bsText(null, null, 'Width', 'tmp_cargo_width', null, '0.000') !!}</div>
            <div class="col-md-4">{!! Form::bsText(null, null, 'Height', 'tmp_cargo_height', null, '0.000') !!}</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row row-panel">
            <div class="col-md-12">{!! Form::bsMemo(null, null, 'Material Descriptions', 'tmp_cargo_material_description', null, 3, '') !!}</div>
        </div>
    </div>
</div>
<div class="row row-panel">
    <div class="col-md-1">{!! Form::bsText(null, null, 'Pcs.', 'tmp_cargo_pieces', null, '0') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'tmp_cargo_weight_unit_measurement_id', array('K' => 'KGS', 'L' => 'LBS'), null) !!}</div>
    <div class="col-md-1">{!! Form::bsText(null, null, 'Weight', 'tmp_cargo_unit_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Total Weight', 'tmp_cargo_total_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Cubic', 'tmp_cargo_cubic', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'DIM Fact', 'tmp_cargo_dim_fact', array('D' => 'DOM', 'I' => 'INT'), null) !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Vol. Weight', 'tmp_cargo_volume_weight', null, '0.000') !!}</div>
    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Location', 'tmp_cargo_location_id', Sass\Location::all()->lists('code', 'id'),  'Location', false) !!}</div>
    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Bin',  'tmp_cargo_location_bin_id', array('A' => 'A', 'B' => 'B', 'C' => 'C'),null) !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Tare Weight', 'tmp_cargo_tare_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Net Weight', 'tmp_cargo_net_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Sq. Foot', 'tmp_cargo_square_foot', null, '0.000') !!}</div>
</div>