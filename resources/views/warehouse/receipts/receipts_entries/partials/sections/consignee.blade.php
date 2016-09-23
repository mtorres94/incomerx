<fieldset id="consignee_section">
    <legend>Consignee</legend>
    <div class="form-horizontal">
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'consignee_id', 'consignee_name', Request::get('term'), ((isset($receipt_entry) and $receipt_entry->consignee_id > 0) ? $receipt_entry->consignee->name : null), 'Customers...') !!}
        </div>
        <div class="row">
            {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'consignee_address', null, 1, 'Consignee address') !!}
        </div>
        <div class="row">
            {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'consignee_city', null, 'Consignee city') !!}
        </div>
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'State', 'consignee_state_id', 'consignee_state_name', Request::get('term'), ((isset($receipt_entry) and $receipt_entry->consignee_state_id > 0) ? $receipt_entry->consignee_state->name : null), 'States...') !!}
        </div>
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Postal Code', 'consignee_zip_code_id', 'consignee_zip_code_code', Request::get('term'), ((isset($receipt_entry) and $receipt_entry->consignee_zipcode_id > 0) ? $receipt_entry->consignee_zipcode->code : null), 'Zip Code...') !!}
        </div>
        <div class="row">
            {!! Form::bsText('col-md-3', 'col-md-4', 'Phone', 'consignee_phone', null, 'Consignee phone...') !!}
        </div>
        <div class="row">
            {!! Form::bsText('col-md-3', 'col-md-4', 'Fax', 'consignee_fax', null, 'Consignee fax...') !!}
        </div>
    </div>
</fieldset>