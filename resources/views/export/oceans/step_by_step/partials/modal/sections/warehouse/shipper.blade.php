<fieldset id="Shipper">
    <legend>Shipper</legend>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'warehouse_shipper_id', 'warehouse_shipper_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->shipper_id > 0) ? $booking_entry->shipper->name : null), 'Customers...') !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'warehouse_shipper_address', null, 1, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'warehouse_shipper_city', null, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'warehouse_shipper_state_id', 'warehouse_shipper_state_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->shipper_state_id > 0) ? $booking_entry->shipper_state->name : null), 'State') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Country Name', 'warehouse_shipper_country_id', 'warehouse_shipper_country_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->shipper_country_id > 0) ? $booking_entry->shipper_country->name : null), 'Country') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'warehouse_shipper_zip_code_id', 'warehouse_shipper_zip_code_code', Request::get('term'), ((isset($booking_entry) and $booking_entry->shipper_zip_code_id > 0) ? $booking_entry->shipper_zip_code->code : null), 'Zip Code') !!}
    </div>
    <div class="row">
        <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'warehouse_shipper_phone', null, '') !!}</div>
        <div class="col-md-6">  {!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'warehouse_shipper_fax', null, '') !!}</div>
    </div>
</fieldset>