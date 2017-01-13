<div class="row">
    <div class="col-md-8">{!! Form::bsComplete(null, null, 'ID', 'tmp_drop_id', 'tmp_drop_name', Request::get('term'), null, 'ID') !!}</div>
    <div class="col-md-4">{!! Form::bsSelect(null, null, 'Type', 'tmp_drop_type', array(
                     '01' => '01 - CARRIER',
                     '02' => '02 - CUSTOMER',
                 ), null) !!} </div>
</div>   <div class="row">
    {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'tmp_drop_address', null, 1, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'tmp_drop_city', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-6', 'State/ Province', 'tmp_drop_state_id', 'tmp_drop_state_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->drop_state_id > 0) ? $booking_entry->drop_state->name : null), 'State') !!}
</div>
<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-6', 'Zip Postal Code', 'tmp_drop_zip_code_id', 'tmp_drop_zip_code_code', Request::get('term'), ((isset($booking_entry) and $booking_entry->drop_zip_code_id > 0) ? $booking_entry->drop_zip_code->code : null), 'Zip Code') !!}
</div>

<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-6', 'Phone', 'tmp_drop_phone', null, '') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-4', 'Contact', 'tmp_drop_contact', null, '') !!}
    {!! Form::bsDate('col-md-2', 'col-md-3', 'Date', 'tmp_drop_date', null, '') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-6', 'Drop off #', 'tmp_drop_number', null, '') !!}
</div>