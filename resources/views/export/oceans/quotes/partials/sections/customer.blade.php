
    <legend>Customer</legend>
    <div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'customer_id', 'customer_name', Request::get('term'), ((isset($quotes) and $quotes->customer_id > 0) ? $quotes->customer->name : null), 'Customers...') !!}</div></div>
    <div class="row"><div class="col-md-12">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'customer_address', null, 1, ' ') !!}</div></div>
    <div class="row"><div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'City', 'customer_city', null, ' ') !!}</div></div>
    <div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'customer_state_id', 'customer_state_name', Request::get('term'), ((isset($quotes) and $quotes->customer_state_id > 0) ? $quotes->customer_state->name : null), 'State') !!}</div></div>
    <div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Country Name', 'customer_country_id', 'customer_country_name', Request::get('term'), ((isset($quotes) and $quotes->customer_country_id > 0) ? $quotes->customer_country->name : null), 'Country') !!}</div></div>
    <div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'customer_zip_code_id', 'customer_zip_code_code', Request::get('term'), ((isset($quotes) and $quotes->customer_zip_code_id > 0) ? $quotes->customer_zip_code->code : null), 'Zip Code') !!}
    </div></div>
    <div class="row"><div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Contact', 'customer_contact', null, '') !!}</div></div>
    <div class="row"><div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Email', 'customer_email', null, '') !!}</div></div>
    <div class="row">
        <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'customer_phone', null, '') !!}</div>
        <div class="col-md-6">  {!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'customer_fax', null, '') !!}</div>
    </div>
