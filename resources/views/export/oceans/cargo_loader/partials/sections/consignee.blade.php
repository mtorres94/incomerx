<fieldset id="Consignee">
    <legend>Consignee</legend>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'consignee_id', 'consignee_name', Request::get('term'), ((isset($cargo_loader) and $cargo_loader->consignee_id > 0) ? $cargo_loader->consignee->name : null), 'Customers...') !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'consignee_address', null, 1, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'consignee_city', null, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'consignee_state_id', 'consignee_state_name', Request::get('term'), ((isset($cargo_loader) and $cargo_loader->consignee_state_id > 0) ? $cargo_loader->consignee_state->name : null), 'State') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Country Name', 'consignee_country_id', 'consignee_country_name', Request::get('term'), ((isset($cargo_loader) and $cargo_loader->consignee_country_id > 0) ? $cargo_loader->consignee_country->name : null), 'Country') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'consignee_zip_code_id', 'consignee_zip_code_code', Request::get('term'), ((isset($cargo_loader) and $cargo_loader->consignee_zip_code_id > 0) ? $cargo_loader->consignee_zip_code->code : null), 'Zip Code') !!}
    </div>
    <div class="row">
        <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'consignee_phone', null, '') !!}</div>
        <div class="col-md-6">  {!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'consignee_fax', null, '') !!}</div>
    </div>
</fieldset>