<fieldset id="shipper_section">
    <legend>Shipper</legend>
    <div class="form-horizontal">
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'shipper_id', 'shipper_name', Request::get('term'), ((isset($wr_entry) and $wr_entry->shipper_id > 0) ? $wr_entry->shipper->name : null), 'Customers...') !!}
        </div>
        <div class="row">
            {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'shipper_address', null, 1, 'Shipper address') !!}
        </div>
        <div class="row">
            {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'shipper_city', null, 'Shipper city') !!}
        </div>
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'State', 'shipper_state_id', 'shipper_state_name', Request::get('term'), ((isset($wr_entry) and $wr_entry->shipper_state_id > 0) ? $wr_entry->shipper_state->name : null), 'States...') !!}
        </div>
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Postal Code', 'shipper_zip_code_id', 'shipper_zip_code_code', Request::get('term'), ((isset($wr_entry) and $wr_entry->shipper_zipcode_id > 0) ? $wr_entry->shipper_zipcode->name : null), 'Zip Code...') !!}
        </div>
        <div class="row">
            {!! Form::bsText('col-md-3', 'col-md-4', 'Phone', 'shipper_phone', null, 'Shipper phone...') !!}
        </div>
        <div class="row">
            {!! Form::bsText('col-md-3', 'col-md-4', 'Fax', 'shipper_fax', null, 'Shipper fax...') !!}
        </div>
    </div>
</fieldset>