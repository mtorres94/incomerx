<div class="row">
    <div class="col-md-6">
        {!! Form::hidden('cargo_id', null, ['id' => 'cargo_id', 'class' => 'form-control input-sm']) !!}
        {!! Form::hidden('cargo_cargo_type_code', null, ['id' => 'tmp_cargo_type_code', 'class' => 'form-control input-sm']) !!}

        <div class="col-md-3">{!! Form::bsText(null, null, 'Qty.', 'cargo_quantity', null, '0') !!}</div>
        <div class="col-md-5">{!! Form::bsSelect(null, null, 'Cargo Type', 'cargo_cargo_type_id',Sass\CargoType::all()->lists('code', 'id'), 'Cargo types', true) !!}</div>
        <div class="col-md-4">{!! Form::bsSelect(null, null, 'Inches/Cms', 'cargo_metric_unit_measurement_id', array('C' => 'CMS', 'I' => 'INCHES'), ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Length', 'cargo_length', null, '0.000') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Width', 'cargo_width', null, '0.000') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Height', 'cargo_height', null, '0.000') !!}</div>
    </div>
    <div class="col-md-6">
        {!! Form::bsMemo(null,null, 'Material Descriptions', 'cargo_material', null, 2, ' ') !!}
    </div>
</div>
<div class="row row-panel">
        <div class="col-md-1">{!! Form::bsText(null, null, 'Pieces', 'cargo_pieces', null, '0') !!}</div>
        <div class="col-md-1">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'cargo_weight_unit_measurement_id', array('K' => 'KGS', 'L' => 'LBS'), ' ') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'Unit Weight', 'cargo_unit_weight', null, '0.000') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'Total Weight', 'cargo_total_weight', null, '0.000') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'Cubic Weight', 'cargo_cubic', null, '0.000') !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, 'Dim Fact', 'cargo_dim_fact', array('I' => 'INT', 'D' => 'DOM'), ' ') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'Vol. Weight', 'cargo_volume_weight', null, '0.000') !!}</div>
        <div class="col-md-3">{!! Form::bsComplete(null, null, 'Location', 'cargo_location_id', 'cargo_location_name', Request::get('term'), null, 'Location...') !!}</div>
        <div class="col-md-3">{!! Form::bsComplete(null, null, 'Bin', 'cargo_location_bin_id', 'cargo_location_bin_name', Request::get('term'), null, 'Location bin...') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'Tare Weight', 'cargo_tare_weight', null, '0.000') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'Net Weight', 'cargo_net_weight', null, '0.000') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'Sq. Foot', 'cargo_square_foot', null, '0.000') !!}</div>
</div>


