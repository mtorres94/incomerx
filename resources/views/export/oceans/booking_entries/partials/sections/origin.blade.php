<fieldset id="Origin">

        <legend>Origin</legend>
    <div class="row">
         {!! Form::bsComplete("col-md-3", "col-md-9",'Place of receipt ', 'place_receipt_id', 'place_receipt_name', Request::get('term'),((isset($booking_entry) and $booking_entry->place_receipt_id> 0) ? $booking_entry->place_receipt->name : null), 'World Location') !!}
    </div>
    <div class="row">   {!! Form::bsComplete("col-md-3", "col-md-9",'Port of Loading ', 'port_loading_id', 'port_loading_name', Request::get('term'),((isset($booking_entry) and $booking_entry->port_loading_id > 0) ? $booking_entry->port_loading->name : null), 'Ports') !!}
    </div>
    <legend>Booking Reference</legend>
    <div class="row">{!!  Form::bsText("col-md-3", "col-md-9",'Booking Agent', 'booking_agent', null, '') !!}</div>
    <div class="row">{!! Form::bsText("col-md-3", "col-md-9",'Reference #', 'booking_reference', null, '') !!}</div>


    <div class="row">
        {!! Form::bsComplete("col-md-3", "col-md-9",'Agent ', 'agent_id', 'agent_name', Request::get('term'),((isset($booking_entry) and $booking_entry->division_id > 0) ? $booking_entry->division->name : null), 'Customer') !!}</div>
    <div class="row">{!! Form::bsText("col-md-3", "col-md-9",'Contact', 'agent_contact', null, '') !!}</div>
    <div class="row">
        <div class="col-md-6">{!! Form::bsText("col-md-6", "col-md-6",'Phone', 'agent_phone', null, '') !!}</div>
        <div class="col-md-6">{!! Form::bsText("col-md-6", "col-md-6",'Fax', 'agent_fax', null, '') !!}</div>
    </div>
    <div class="row">{!! Form::bsText("col-md-3", "col-md-2",'Commission %', 'agent_commission', null, '0') !!}</div>

</fieldset>