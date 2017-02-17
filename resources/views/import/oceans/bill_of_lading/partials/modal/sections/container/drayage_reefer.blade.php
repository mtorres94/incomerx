<div class="row">
    <div class="col-md-12">{!! Form::bsComplete(null, null, 'Drayage by', 'tmp_carrier_id', 'tmp_carrier_name', Request::get('term'), null, 'Carriers') !!}</div>
</div>
<h4>Reefer Settings</h4>
<div class="row">
    <div class="col-md-4"><b>Temperature control</b></div>
    <div class="col-md-4">{!! Form::bsSelect(null, null, 'Ventilation', 'tmp_ventilation', array(
                        'A' => 'A - 25%',
                        'B' => 'B - 50%',
                        'C' => 'C - 75%',
                        'D' => 'D - CLOSED',
                        'E' => 'E - 10%',
                    ), null, 'body') !!}</div>
    <div class="col-md-4">{!! Form::bsSelect(null, null, 'Degrees', 'tmp_degrees', array(
                        'F' => 'Fahrenheit',
                        'C' => 'Celsius',
                    ), null) !!}</div>

</div>
<div class="row">
    <div class="col-md-4">{!! Form::bsText(null, null, 'Temperature', 'tmp_temperature', null, '0.00') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'Max', 'tmp_max', null, '0.00') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'Min', 'tmp_min', null, '0.00') !!}</div>
</div>