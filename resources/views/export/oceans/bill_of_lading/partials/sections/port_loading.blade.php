<fieldset id="Port_loading">
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9','Port of Loading ', 'loading_port_id', 'loading_port_name', Request::get('term'),((isset($booking_entry) and $booking_entry->loading_port_id > 0) ? $booking_entry->loading_port->name : null), 'Ports') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9','Port of Unloading ', 'unloading_port_id', 'unloading_port_name', Request::get('term'),((isset($bill_lading) and $bill_lading->unloading_port_id > 0) ? $bill_lading->unloading_port->name : null), 'Ports') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9','Carrier ', 'carrier_id', 'carrier_name', Request::get('term'),((isset($bill_lading) and $bill_lading->carrier_id > 0) ? $bill_lading->carrier->name : null), 'Carrier') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'Vessel', 'vessel_name', null, null) !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'Voyage', 'voyage_name', null, null) !!}
    </div>
    <div class="row">
        <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Departure', 'departure', null, null) !!}</div>
        <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Arrival', 'arrival', null, null) !!}</div>
    </div>
</fieldset>
<fieldset id="More details">
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9','Country of origin ', 'origin_country_id', 'origin_country_name', Request::get('term'),((isset($bill_lading) and $bill_lading->origin_country_id > 0) ? $bill_lading->origin_country->name : null), 'Country') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'Customs Code', 'customs_code', null, null) !!}
    </div>
    <div class="row">
            <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'IT Number', 'it_number', null, null) !!}
        </div>
        <div class="col-md-6">{!! Form::bsSelect('col-md-6', 'col-md-6', ' Incoterm', 'incoterm_type', Sass\Incoterm::all()->lists('code', 'id'), null) !!}</div>
    </div>
    <div class="row"> {!! Form::bsComplete('col-md-3', 'col-md-9','Forwarding Agent ', 'forwarding_agent_id', 'forwarding_agent_name', Request::get('term'),((isset($bill_lading) and $bill_lading->forwarding_agent_id > 0) ? $bill_lading->forwarding_agent->name : null), 'Agent') !!}</div>

    <div class="row">
        <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Comm. (%)', 'commission_p', null, null) !!}</div>
    </div>
    <div class="row"> {!! Form::bsComplete('col-md-3', 'col-md-9','Co-Loader ', 'coloader_id', 'coloader_name', Request::get('term'),((isset($bill_lading) and $bill_lading->coloader_id > 0) ? $bill_lading->coloader->name : null), null) !!}
    </div>

</fieldset>
<fieldset id="document_number">
    <div class="row">
        <div class="col-md-6">{!! Form::bsText(null, null, 'Document Number', 'document_number', null, null) !!}</div>
        <div class="col-md-6">{!! Form::bsText(null, null, 'BL Number', 'bl_number', null, null) !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsMemo(null, null, 'Export References', 'export_reference', null,2, null) !!}</div>
    </div>
    <div class="row">
        <div class="col-md-6">{!! Form::bsText(null, null, 'Point (state) of origin', 'point_of_origin', null, null) !!}</div>
        <div class="col-md-6">{!! Form::bsText(null, null, 'FMC Number', 'fmc_number', null, null) !!}</div>
    </div>

</fieldset>