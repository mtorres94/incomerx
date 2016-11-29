<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-2','col-md-4', 'ID', 'container_drop_id', 'container_drop_name', Request::get('term'), null, 'ID') !!}
        {!! Form::bsSelect('col-md-1','col-md-2', 'Type', 'container_drop_type', array('01' => '01 - CARRIER','02' => '02 - CUSTOMER'), null) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsMemo('col-md-2', 'col-md-7', 'Address', 'container_drop_address', null, 1, ' ') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-2', 'col-md-7', 'City', 'container_drop_city', null, ' ') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-2', 'col-md-3', 'State/ Province', 'container_drop_state_id', 'container_drop_state_name', Request::get('term'), ((isset($quotes) and $quotes->drop_state_id > 0) ? $quotes->drop_state->name : null), 'State') !!}
        {!! Form::bsComplete('col-md-1', 'col-md-3', 'Zip Postal', 'container_drop_zip_code_id', 'container_drop_zip_code_code', Request::get('term'), ((isset($quotes) and $quotes->drop_zip_code_id > 0) ? $quotes->drop_zip_code->code : null), 'Zip Code') !!}
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-2', 'col-md-4', 'Phone', 'container_drop_phone', null, '') !!}
        {!! Form::bsDate('col-md-1', 'col-md-2', 'Date', 'container_drop_date', null, '') !!}
    </div>
</div>
