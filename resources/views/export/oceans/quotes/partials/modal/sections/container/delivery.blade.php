<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-2','col-md-4', 'Name', 'container_delivery_id', 'container_delivery_name', Request::get('term'), null, 'ID') !!}
        {!! Form::bsSelect('col-md-1','col-md-2', 'Type', 'container_delivery_type', array('01' => '01 - CARRIER','02' => '02 - CUSTOMER'), null) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsMemo('col-md-2', 'col-md-7', 'Address', 'container_delivery_address', null, 1, ' ') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-2', 'col-md-7', 'City', 'container_delivery_city', null, ' ') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-2', 'col-md-7', 'State/ Province', 'container_delivery_state_id', 'container_delivery_state_name', Request::get('term'), ((isset($quotes) and $quotes->delivery_state_id > 0) ? $quotes->delivery_state->name : null), 'State') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-2', 'col-md-4', 'Zip Postal', 'container_delivery_zip_code_id', 'container_delivery_zip_code_code', Request::get('term'), ((isset($quotes) and $quotes->delivery_zip_code_id > 0) ? $quotes->delivery_zip_code->code : null), 'Zip Code') !!}
        {!! Form::bsText('col-md-1', 'col-md-2', 'Phone', 'container_delivery_phone', null, '') !!}
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-2', 'col-md-4', 'Drop Off #', 'container_delivery_number', null, '') !!}
        {!! Form::bsDate('col-md-1', 'col-md-2', 'Date', 'container_delivery_date', null, '') !!}
    </div>
</div>
