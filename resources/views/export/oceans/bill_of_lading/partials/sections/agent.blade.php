<fieldset id="Agent">
    <legend>Agent's Name and City</legend>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'agent_id', 'agent_name', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->agent_id > 0) ? $bill_of_lading->agent->name : null), 'Customers...') !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'agent_address', ((isset($bill_of_lading) and $bill_of_lading->agent_id > 0) ? $bill_of_lading->agent->address : null), 1, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'agent_city', ((isset($bill_of_lading) and $bill_of_lading->agent_id > 0) ? $bill_of_lading->agent->city : null), ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'agent_state_id', 'agent_state_name', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->agent_state_id > 0) ? $bill_of_lading->agent_state->name : null), 'State') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Country Name', 'agent_country_id', 'agent_country_name', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->agent_country_id > 0) ? $bill_of_lading->agent_country->name : null), 'Country') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'agent_zip_code_id', 'agent_zip_code_code', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->agent_zip_code_id > 0) ? $bill_of_lading->agent_zip_code->code : null), 'Zip Code') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-6', 'Phone', 'agent_phone', null, '') !!}
    </div>
    <div class="row">
        <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Commission', 'agent_commission_amount', null, '') !!}</div>
        <div class="col-md-6">{!! Form::bsText('col-md-2', 'col-md-6', 'Amnt %', 'agent_commission_p', null, '') !!}</div>
    </div>

</fieldset>