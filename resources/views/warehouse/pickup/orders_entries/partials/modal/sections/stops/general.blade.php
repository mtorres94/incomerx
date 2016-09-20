
<div class="row">
    {!! Form::hidden('stop_id', null, ['id' => 'stop_id', 'class' => 'form-control input-sm']) !!}
    <div class="col-md-3"> {!! Form::bsSelect(null, null , 'Type', 'stop_type', array(
                                                    'D' => 'D - DELIVERY',
                                                    'P' => 'P - PICKUP',
                                                ), ' ') !!}
    </div>
    <div class="col-md-3">{!! Form::bsText(null, null, 'Qty.', 'stop_quantity', null, ' ') !!}</div>
    <div class="col-md-3">{!! Form::bsComplete(null, null, 'Cargo Type', 'stop_cargo_type_id', 'stop_cargo_type_code',  Request::get('term'),((isset($stop_number) and $stop_number->stop_cargo_type_id > 0) ? $stop_number->stop_cargo_type->code : null) , 'Cargo types...') !!}</div>
    <div class="col-md-3"> {!! Form::bsSelect(null, null , 'Kgs/Lbs', 'stop_unit', array(
                                                    'K' => 'KGS',
                                                    'L' => 'LBS',
                                                ), ' ') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-3">{!! Form::bsText(null, null, 'Length', 'stop_length', null, '0.000') !!}</div>
    <div class="col-md-3">{!! Form::bsText(null, null, 'Width', 'stop_width', null, '0.000') !!}</div>
    <div class="col-md-3">{!! Form::bsText(null, null, 'Height', 'stop_height', null, '0.000') !!}</div>
    <div class="col-md-3">{!! Form::bsText(null, null, 'Weight', 'stop_weight', null, '0.000') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText(null, null, 'Appt', 'stop_appt', null, '') !!}</div>
    <div class="col-md-4">{!! Form::bsDate(null, null, 'Date', 'stop_date', null, '') !!}</div>
</div>