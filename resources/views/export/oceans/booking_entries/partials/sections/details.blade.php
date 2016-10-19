<fieldset id="Details">

    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Forwarding Agent', 'forwarding_agent_id', 'forwarding_agent_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->forwarding_agent_id > 0) ? $booking_entry->forwarding_agent->name : null), 'Customers...') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Service', 'service_id', 'service_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->service_id > 0) ? $booking_entry->service->name : null), 'Service') !!}
    </div>
    <div class="row"><legend>Spot Information</legend></div>
    <div class="row no-padding-top">
        <div class="col-md-4">{!! Form::bsCheck('Confirmed', 'confirmed') !!}</div>
        <div class="col-md-4">{!! Form::bsCheck('Spot Rate', 'spot_rate') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Spotting amount', 'spotting_amount', null, '0.000') !!}</div>
    </div>
    <div class="row no-padding-top">
        <div class="col-md-4">{!! Form::bsCheck('All inclusive', 'all_inclusive') !!}</div>
        <div class="col-md-4">{!! Form::bsCheck('+ Fuel/Security', 'fuel_security') !!}</div>
        <div class="col-md-4">{!! Form::bsDate(null, null, 'Spotting date', 'spotting_date', null, ' ') !!}</div>

    </div>
</fieldset>