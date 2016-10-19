<div class="row">
    {!! Form::hidden('vehicle_cargo_type_code', null, ['id' => 'vehicle_cargo_type_code', 'class' => 'form-control input-sm']) !!}

    <div class="col-md-1">{!! Form::bsText(null, null, 'Qty', 'vehicle_quantity', null, '') !!}</div>
    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Cargo Type', 'vehicle_cargo_type_id', Sass\CargoType::all()->lists('code', 'id') , 'Type', true) !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Inches/Cms', 'vehicle_metric_unit',  array('C' => 'CMS','I' => 'INCHES' ), null)!!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Length', 'vehicle_length', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Width', 'vehicle_width', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Height', 'vehicle_height', null, '0.000') !!}</div>
</div>
<div class="row">
    {!! Form::bsMemo(null, null, 'Material Descriptions', 'vehicle_materials', null, 3, '') !!}
</div>
<div class="row">
    <div class="col-md-1">{!! Form::bsText(null, null, 'Pieces', 'vehicle_pieces', null, '0') !!}</div>
    <div class="col-md-1">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'vehicle_weight_unit',  array('K' => 'KGS','L' => 'LBS' ), null)!!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Unit Wght', 'vehicle_unit_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Total Wght', 'vehicle_total_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Cubic', 'vehicle_total_cubic', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'DIM Fact', 'vehicle_dim_fact',  array('D' => 'DOM','I' => 'INT' ), '')!!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Vol. Weight', 'vehicle_vol_weight', null, '0.000') !!}</div>
</div>
