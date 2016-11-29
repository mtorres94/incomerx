<fieldset id="From">
    <legend>From</legend>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Shipper', 'shipper_id', 'shipper_name', Request::get('term'), ((isset($quotes) and $quotes->shipper_id > 0) ? $quotes->shipper->name : null), 'Customers...') !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'shipper_address', null, 1, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'shipper_city', null, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'shipper_state_id', 'shipper_state_name', Request::get('term'), ((isset($quotes) and $quotes->shipper_state_id > 0) ? $quotes->shipper_state->name : null), 'State') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Country Name', 'shipper_country_id', 'shipper_country_name', Request::get('term'), ((isset($quotes) and $quotes->shipper_country_id > 0) ? $quotes->shipper_country->name : null), 'Country') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'shipper_zip_code_id', 'shipper_zip_code_code', Request::get('term'), ((isset($quotes) and $quotes->shipper_zip_code_id > 0) ? $quotes->shipper_zip_code->code : null), 'Zip Code') !!}
    </div>
    <div class="row">{!! Form::bsText('col-md-3', 'col-md-9', 'Contact', 'shipper_contact', null, '') !!}</div>
    <div class="row">
        <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'shipper_phone', null, '') !!}</div>
        <div class="col-md-6">  {!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'shipper_fax', null, '') !!}</div>
    </div>
</fieldset>