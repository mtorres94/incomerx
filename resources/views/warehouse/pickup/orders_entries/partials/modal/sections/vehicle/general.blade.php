<div class="row">
    <div class="col-md-6">
        {!! Form::hidden('vehicle_id', null, ['id' => 'vehicle_id', 'class' => 'form-control input-sm']) !!}
        {!! Form::hidden('vehicle_cargo_type_code', null, ['id' => 'tmp_cargo_type_code', 'class' => 'form-control input-sm']) !!}

        <div class="col-md-3">{!! Form::bsText(null, null, 'Qty.', 'vehicle_quantity', null, '0') !!}</div>
        <div class="col-md-5">{!! Form::bsSelect(null, null, 'Cargo Type', 'vehicle_cargo_type_id',Sass\CargoType::all()->lists('code', 'id') ,'Cargo types', true) !!}</div>
        <div class="col-md-4">{!! Form::bsSelect(null, null, 'Inches/Cms', 'vehicle_metric_unit_measurement_id', array('C' => 'CMS', 'I' => 'INCHES'), ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Length', 'vehicle_length', null, '0.000') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Width', 'vehicle_width', null, '0.000') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Height', 'vehicle_height', null, '0.000') !!}</div>
    </div>
    <div class="col-md-6">
        {!! Form::bsMemo(null,null, 'Material Descriptions', 'vehicle_material', null, 2, '...') !!}
    </div>
</div>
<div class="row row-panel">
    <div class="col-md-1">{!! Form::bsText(null, null, 'Pieces', 'vehicle_pieces', null, '0') !!}</div>
    <div class="col-md-1">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'vehicle_weight_unit_measurement_id', array('K' => 'KGS', 'L' => 'LBS'), ' ') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Unit Weight', 'vehicle_unit_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Total Weight', 'vehicle_total_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Cubic Weight', 'vehicle_cubic_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Dim Fact', 'vehicle_dim_fact', array('I' => 'INT', 'D' => 'DOM'), ' ') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Vol. Weight', 'vehicle_volume_weight', null, '0.000') !!}</div>
    <div class="col-md-3">{!! Form::bsComplete(null, null, 'Location', 'vehicle_location_id', 'vehicle_location_name',Request::get('term'), null, 'Location...') !!}</div>
    <div class="col-md-3">{!! Form::bsComplete(null, null, 'Bin', 'vehicle_location_bin_id', 'vehicle_location_bin_name', Request::get('term'), null, 'Location bin...') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Tare Weight', 'vehicle_tare_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Net Weight', 'vehicle_net_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Sq. Foot', 'vehicle_square_foot', null, '0.000') !!}</div>
</div>