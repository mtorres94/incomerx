<fieldset id="destination">

    <legend>Destination</legend>
    <div class="row">{!! Form::bsComplete("col-md-3", "col-md-9",'Port of Unloading ', 'port_unloading_id', 'port_unloading_name', Request::get('term'),((isset($booking_entry) and $booking_entry->port_unloading_id > 0) ? $booking_entry->unloading->name : null), 'Ports') !!}</div>
    <div class="row"> {!! Form::bsComplete("col-md-3", "col-md-9",'Place of delivery', 'place_delivery_id', 'place_delivery_name', Request::get('term'),((isset($booking_entry) and $booking_entry->place_delivery_id > 0) ? $booking_entry->delivery->name : null), 'World Location') !!}</div>

    <legend>Carrier / Vessel / Voyage </legend>
    <div class="row">{!! Form::bsComplete("col-md-3", "col-md-9",'Carrier', 'carrier_id', 'carrier_name', Request::get('term'),((isset($booking_entry) and $booking_entry->carrier_id > 0) ? $booking_entry->carrier->name : null), 'Carrier') !!}</div>
    <div class="row">{!! Form::bsText("col-md-3", "col-md-9",'Vessel', 'vessel_name', null, '') !!}</div>
    <div class="row">{!! Form::bsText("col-md-3", "col-md-9",'Voyage', 'voyage_name', null, '') !!}</div>

<div class="row">
    <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Departure', 'departure_date',null , null) !!}</div>
    <div class="col-md-6">        {!! Form::bsDate('col-md-6', 'col-md-6', 'Arrival', 'arrival_date',null , null) !!} </div>
</div>
    <div class="row">
        <div class="col-md-6"> {!! Form::bsDate('col-md-6', 'col-md-6', 'Booked On', 'booked_on_date',null , null) !!}</div>
        <div class="col-md-6"> {!! Form::bsDate('col-md-6', 'col-md-6', 'Loading date', 'loading_date',null , null) !!}</div>
    </div>
    <div class="row">
        <div class="col-md-6">  {!! Form::bsDate('col-md-6', 'col-md-6', 'Cut off', 'cut_off_date',null , null) !!}</div>
        <div class="col-md-6">  {!! Form::bsDate('col-md-6', 'col-md-6', 'Docs Cut off', 'documents_cut_off_date',null , null) !!}</div>
    </div>

</fieldset>