<div class="row">
    <div class="col-md-6">
        <div class="row">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Agent', 'agent_id', 'agent_name', Request::get('term'), ((isset($booking_entries) and $booking_entries->agent_id > 0) ? $booking_entries->agent->name : null), 'Agent') !!}</div>
        <div class="row">{!! Form::bsText('col-md-3', 'col-md-9', 'Contact', 'agent_contact', null, null) !!}</div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'agent_phone', null, null) !!}</div>
            <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'agent_fax', null, null) !!}</div>
        </div>
        <div class="row">{!! Form::bsText('col-md-3', 'col-md-2', 'Commission %', 'agent_commission', null, '0') !!}</div>

    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Departure', 'departure_date', null, null) !!}</div>
            <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Arrival', 'arrival_date', null, null) !!}</div>
        </div>
        <div class="row">{!! Form::bsSelect('col-md-3', 'col-md-9', 'Service', 'service_id', Sass\Service::all()->lists('name','id'), 'Services', 'body', false) !!}</div>
    </div>
</div>