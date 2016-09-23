<fieldset id="third_party_section">
    <legend>Third Party</legend>
    <div class="form-horizontal">
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'third_party_id', 'third_party_name', Request::get('term'), ((isset($receipt_entry) and $receipt_entry->third_party_id > 0) ? $receipt_entry->third_party->name : null), 'Customers...') !!}
        </div>
        <div class="row">
            {!! Form::bsText('col-md-3', 'col-md-4', 'Phone', 'third_party_phone', null, 'Consignee phone...') !!}
        </div>
        <div class="row">
            {!! Form::bsText('col-md-3', 'col-md-4', 'Fax', 'third_party_fax', null, 'Consignee fax...') !!}
        </div>
    </div>
</fieldset>