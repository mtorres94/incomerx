<fieldset id="Import Information">
<legend>Exporter/ Shipper</legend>
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Entry#', 'entry_number', null,  ' ') !!}</div>
            <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Date', 'entry_date', null,  ' ') !!}</div>
        </div>
        <div class="row">{!! Form::bsText('col-md-3', 'col-md-8', 'IT#', 'it_number', null,  ' ') !!}</div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'IT Date', 'it_date', null,  ' ') !!}</div>
            <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'IT Port', 'it_port', null,  ' ') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'GO #', 'go_number', null,  ' ') !!}</div>
            <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Available', 'go_available', null,  ' ') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'GO Date', 'go_date', null,  ' ') !!}</div>
            <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Expired Date', 'go_expired_date', null,  ' ') !!}</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Location', 'location_id', 'location_name', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->location_id > 0) ? $shipment_entry->location->name : null), 'Customers...') !!}</div>
        <div class="row">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'location_address', null, 1, ' ') !!}</div>
        <div class="row">{!! Form::bsText('col-md-3', 'col-md-9', 'City', 'location_city', null, ' ') !!}</div>
        <div class="row">{!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'location_state_id', 'location_state_name', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->location_state_id > 0) ? $shipment_entry->location_state->name : null), 'State') !!}</div>
        <div class="row">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'location_zip_code_id', 'location_zip_code_code', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->location_zip_code_id > 0) ? $shipment_entry->location_zip_code->code : null), 'Zip Code') !!}</div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'consignee_phone', null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'consignee_fax', null, '') !!}</div>
        </div>
    </div>
</div>

</fieldset>