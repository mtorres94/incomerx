
<div class="row">
    <legend>Booking Entry</legend>
</div>
<div class="row">
    {!! Form::hidden('shipment_id', (isset($booking_entries) ? $booking_entries->shipment_id : '0'), ['id' => 'shipment_id', 'class' => 'form-control input-sm']) !!}
    <div class="col-md-3">{!! Form::bsText(null, null, 'Booking #', 'code', null, null) !!}</div>
    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Shipment Type', 'shipment_type', array('C' => 'CONSOLIDATION SHIPMENT','D' => 'DIRECT SHIPMENT'), '') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, ' Status', 'status', array('O' => 'OPEN','P' => 'IN PROCESS','C' => 'CLOSED'), 'STATUS') !!}</div>
    <div class="col-md-2">{!! Form::bsDate(null, null,'Date', 'date', null, '') !!}</div>

    <div class="col-md-2">{!! Form::bsText(null, null, 'User', 'user_id', ((isset($booking_entries) and $booking_entries->user_create_id > 0) ? $booking_entries->user_create->username :  Auth::user()->username), '') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="row">  {!! Form::bsComplete('col-md-3', 'col-md-9', 'Carrier', 'carrier_id', 'carrier_name', Request::get('term'), ((isset($booking_entries) and $booking_entries->carrier_id > 0) ? $booking_entries->carrier->name : null), 'Carrier') !!}</div>
        <div class="row">{!! Form::bsSelect('col-md-3', 'col-md-9', 'AWB Type', 'type', array('I' => 'INTERNATIONAL','D' => 'DOMESTIC'), '') !!}</div>
        <div class="row">{!! Form::bsText('col-md-3', 'col-md-9', 'AWB#', 'awb_number', null, null) !!}</div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'First Flight', 'first_flight', null, null) !!}</div>
            <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Last Flight', 'last_flight', null, null) !!}</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">   {!! Form::bsText('col-md-3', 'col-md-9', 'Shipment#', 'shipment_code', ((isset($booking_entries) and $booking_entries->shipment_id > 0 )? $booking_entries->shipment->code : ""), null) !!}</div>
        <div class="row">  {!! Form::bsComplete('col-md-3', 'col-md-9', 'Origin', 'origin_id', 'origin_name', Request::get('term'), ((isset($booking_entries) and $booking_entries->origin_id > 0) ? $booking_entries->origin->name : null), '') !!}</div>
        <div class="row">  {!! Form::bsComplete('col-md-3', 'col-md-9', 'Destination', 'destination_id', 'destination_name', Request::get('term'), ((isset($booking_entries) and $booking_entries->destination_id > 0) ? $booking_entries->destination->name : null), '') !!}</div>
        <div class="row">  {!! Form::bsText('col-md-3', 'col-md-9', 'Booking Agent', 'booking_agent', null, null) !!}</div>
    </div>


</div>
