<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-2','col-md-4', 'ID', 'container_pickup_id', 'container_pickup_name', Request::get('term'), null, 'ID') !!}
        {!! Form::bsSelect('col-md-1','col-md-2', 'Type', 'container_pickup_type', array('01' => '01 - CARRIER','02' => '02 - CUSTOMER'), null) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsMemo('col-md-2', 'col-md-7', 'Address', 'container_pickup_address', null, 1, ' ') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-2', 'col-md-7', 'City', 'container_pickup_city', null, ' ') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-2', 'col-md-7', 'State/ Province', 'container_pickup_state_id', 'container_pickup_state_name', Request::get('term'), ((isset($quotes) and $quotes->pickup_state_id > 0) ? $quotes->pickup_state->name : null), 'State') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-2', 'col-md-4', 'Zip Postal', 'container_pickup_zip_code_id', 'container_pickup_zip_code_code', Request::get('term'), ((isset($quotes) and $quotes->pickup_zip_code_id > 0) ? $quotes->pickup_zip_code->code : null), 'Zip Code') !!}
        {!! Form::bsText('col-md-1', 'col-md-2', 'Phone', 'container_pickup_phone', null, '') !!}
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-2', 'col-md-4', 'Pickup #', 'container_pickup_number', null, '') !!}
        {!! Form::bsDate('col-md-1', 'col-md-2', 'Date', 'container_pickup_date', null, '') !!}
    </div>
</div>
