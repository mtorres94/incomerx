<div class="row">
    <div class="col-md-12">{!! Form::bsComplete(null, null, 'Drayage by', 'container_carrier_id', 'container_carrier_name', Request::get('term'), null, 'Carriers') !!}</div>
</div>
<h4>Reefer Settings</h4>
<div class="row">
    <div class="col-md-4"><b>Temperature control</b></div>
    <div class="col-md-4">{!! Form::bsSelect(null, null, 'Ventilation', 'container_ventilation', array(
                        'A' => 'A - 25%',
                        'B' => 'B - 50%',
                        'C' => 'C - 75%',
                        'D' => 'D - CLOSED',
                        'E' => 'E - 10%',
                    ), null) !!}</div>
    <div class="col-md-4">{!! Form::bsSelect(null, null, 'Degrees', 'container_degrees', array(
                        'F' => 'Fahrenheit',
                        'C' => 'Celsius',
                    ), null) !!}</div>

</div>
<div class="row">
    <div class="col-md-4">{!! Form::bsText(null, null, 'Temperature', 'container_temperature', null, '0.00') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'Max', 'container_max', null, '0.00') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'Min', 'container_min', null, '0.00') !!}</div>
</div>