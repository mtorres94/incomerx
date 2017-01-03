<fieldset id="Shipper">
    <legend>Exporter/ Shipper</legend>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'shipper_id', 'shipper_name', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->shipper_id > 0) ? $bill_of_lading->shipper->name : null), 'Customers...') !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'shipper_address', null, 1, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'shipper_city', null, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'shipper_state_id', 'shipper_state_name', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->shipper_state_id > 0) ? $bill_of_lading->shipper_state->name : null), 'State') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Country Name', 'shipper_country_id', 'shipper_country_name', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->shipper_country_id > 0) ? $bill_of_lading->shipper_country->name : null), 'Country') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'shipper_zip_code_id', 'shipper_zip_code_code', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->shipper_zip_code_id > 0) ? $bill_of_lading->shipper_zip_code->code : null), 'Zip Code') !!}
    </div>
    <div class="row">
         {!! Form::bsText('col-md-3', 'col-md-6', 'Phone', 'shipper_phone', null, '') !!}
    </div>
</fieldset>