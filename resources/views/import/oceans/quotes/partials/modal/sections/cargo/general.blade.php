<div class="row">
    {!! Form::hidden('box_cargo_type_code', null, ['id' => 'box_cargo_type_code', 'class' => 'form-control input-sm']) !!}

    <div class="col-md-2">{!! Form::bsText(null, null, 'Qty', 'box_quantity', null, '') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Cargo Type', 'box_cargo_type_id', Sass\CargoType::all()->lists('code', 'id'),'Type', false) !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Inches/Cms', 'box_metric_unit',  array('C' => 'CMS','I' => 'INCHES' ), null)!!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Length', 'box_length', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Width', 'box_width', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Height', 'box_height', null, '0.000') !!}</div>
</div>
<div class="row">
    {!! Form::bsMemo(null, null, 'Material Descriptions', 'box_materials', null, 3, '') !!}
</div>
<div class="row">
    <div class="col-md-1">{!! Form::bsText(null, null, 'Pieces', 'box_pieces', null, '0') !!}</div>
    <div class="col-md-1">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'box_weight_unit',  array('K' => 'KGS','L' => 'LBS' ),'body',  null)!!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Unit Wght', 'box_unit_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Total Wght', 'box_total_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Cubic', 'box_total_cubic', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Dim Fact', 'box_dim_fact', array('I' => 'INT', 'D' => 'DOM'), 'body', ' ') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Vol. Weight', 'box_vol_weight', null, '0.000') !!}</div>
</div>
