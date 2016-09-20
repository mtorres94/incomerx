<legend>Customers </legend>
<div class="row">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Customers', 'stop_customer_id', 'stop_customer_name', Request::get('term'),((isset($stop_number) and $stop_number->stop_customer_id > 0) ? $stop_number->stop_customer->name : null), 'Customers...') !!}</div>
<div class="row">
    {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'stop_address', null, 1, 'Address') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'stop_city', null, 'City') !!}
</div>
<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-9', 'State', 'stop_state_id', 'stop_state_name', Request::get('term'), ((isset($stop_number) and $stop_number->stop_state_id > 0) ? $stop_number->stop_state->name : null), 'States...') !!}
</div>
<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Postal Code', 'stop_zip_code_id', 'stop_zip_code_code', Request::get('term'), ((isset($stop_number) and $stop_number->stop_zip_code_id > 0) ? $stop_number->stop_zip_code->name : null), 'Zip Code...') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-6', 'Contact', 'stop_contact', null, '') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-6', 'Phone', 'stop_phone', null, '') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-6', 'Ref', 'stop_ref', null, '') !!}
</div>