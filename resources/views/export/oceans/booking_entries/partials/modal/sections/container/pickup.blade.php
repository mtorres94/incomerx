<div class="row">
    <div class="col-md-8">{!! Form::bsComplete(null, null, 'ID', 'container_pickup_id', 'container_pickup_name', Request::get('term'), null, 'ID') !!}</div>
     <div class="col-md-4">{!! Form::bsSelect(null, null, 'Type', 'container_pickup_type', array(
                     '01' => '01 - CARRIER',
                     '02' => '02 - CUSTOMER',
                 ), null) !!} </div>
</div>   <div class="row">
    {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'container_pickup_address', null, 1, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'container_pickup_city', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-6', 'State/ Province', 'container_pickup_state_id', 'container_pickup_state_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->pickup_state_id > 0) ? $booking_entry->pickup_state->name : null), 'State') !!}
    </div>
<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-6', 'Zip Postal', 'container_pickup_zip_code_id', 'container_pickup_zip_code_code', Request::get('term'), ((isset($booking_entry) and $booking_entry->pickup_zip_code_id > 0) ? $booking_entry->pickup_zip_code->code : null), 'Zip Code') !!}
</div>

<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-6', 'Phone', 'container_pickup_phone', null, '') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-4', 'Contact', 'container_pickup_contact', null, '') !!}
    {!! Form::bsDate('col-md-2', 'col-md-3', 'Date', 'container_pickup_date', null, '') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-6', 'Pickup #', 'container_pickup_number', null, '') !!}
</div>