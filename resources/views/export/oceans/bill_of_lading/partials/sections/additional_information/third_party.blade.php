<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'third_id', 'third_name', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->third_id > 0) ? $bill_of_lading->third->name : null), 'Customers...') !!}
</div>
<div class="row">
    {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'third_address', null, 1, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'third_city', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'third_state_id', 'third_state_name', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->third_state_id > 0) ? $bill_of_lading->third_state->name : null), 'State') !!}
</div>
<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'third_zip_code_id', 'third_zip_code_code', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->third_zip_code_id > 0) ? $bill_of_lading->third_zip_code->code : null), 'Zip Code') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'Contact', 'third_contact', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'Contact Phone', 'third_contact_phone', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'Email', 'third_email', null, ' ') !!}
</div>