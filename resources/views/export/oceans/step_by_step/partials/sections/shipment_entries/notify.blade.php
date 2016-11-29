<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'notify_id', 'notify_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->notify_id > 0) ? $booking_entry->notify->name : null), 'Customers...') !!}
</div>
<div class="row">
    {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'notify_address', null, 1, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'notify_city', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'notify_state_id', 'notify_state_name', Request::get('term'), ((isset($bill_lading) and $bill_lading->notify_state_id > 0) ? $bill_lading->notify_state->name : null), 'State') !!}
</div>
<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Country Name', 'notify_country_id', 'notify_country_name', Request::get('term'), ((isset($bill_lading) and $bill_lading->notify_country_id > 0) ? $bill_lading->notify_country->name : null), 'Country') !!}
</div>
<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'notify_zip_code_id', 'notify_zip_code_code', Request::get('term'), ((isset($bill_lading) and $bill_lading->notify_zip_code_id > 0) ? $bill_lading->notify_zip_code->code : null), 'Zip Code') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'Contact', 'notify_contact', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'Contact Phone', 'notify_contact_phone', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'Email', 'notify_email', null, ' ') !!}
</div>