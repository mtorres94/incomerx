<fieldset id="Consignee">
    <legend>Consignee</legend>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'warehouse_consignee_id', 'warehouse_consignee_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->consignee_id > 0) ? $booking_entry->consignee->name : null), 'Customers...') !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'warehouse_consignee_address', null, 1, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'warehouse_consignee_city', null, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'warehouse_consignee_state_id', 'warehouse_consignee_state_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->consignee_state_id > 0) ? $booking_entry->consignee_state->name : null), 'State') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Country Name', 'warehouse_consignee_country_id', 'warehouse_consignee_country_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->consignee_country_id > 0) ? $booking_entry->consignee_country->name : null), 'Country') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'warehouse_consignee_zip_code_id', 'warehouse_consignee_zip_code_code', Request::get('term'), ((isset($booking_entry) and $booking_entry->consignee_zip_code_id > 0) ? $booking_entry->consignee_zip_code->code : null), 'Zip Code') !!}
    </div>
    <div class="row">
        <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'warehouse_consignee_phone', null, '') !!}</div>
        <div class="col-md-6">  {!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'warehouse_consignee_fax', null, '') !!}</div>
    </div>
</fieldset>