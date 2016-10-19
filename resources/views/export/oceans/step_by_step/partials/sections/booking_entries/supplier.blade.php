<fieldset id="Supplier">
    <legend>Supplier</legend>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'supplier_id', 'supplier_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->supplier_id > 0) ? $booking_entry->supplier->name : null), 'Customers...') !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'supplier_address', null, 1, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'supplier_city', null, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'supplier_state_id', 'supplier_state_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->supplier_state_id > 0) ? $booking_entry->supplier_state->name : null), 'State') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Country Name', 'supplier_country_id', 'supplier_country_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->supplier_country_id > 0) ? $booking_entry->supplier_country->name : null), 'Country') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'supplier_zip_code_id', 'supplier_zip_code_code', Request::get('term'), ((isset($booking_entry) and $booking_entry->supplier_zip_code_id > 0) ? $booking_entry->supplier_zip_code->code : null), 'Zip Code...') !!}
    </div>
    <div class="row">
        <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'supplier_phone', null, '') !!}</div>
        <div class="col-md-6">  {!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'supplier_fax', null, '') !!}</div>
    </div>
</fieldset>