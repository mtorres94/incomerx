<fieldset id="Booking Agent">

    <div class="row"> <div class="col-md-12"> {!! Form::bsComplete('col-md-2', 'col-md-9', 'Carrier', 'carrier_id', 'carrier_name', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->carrier_id > 0) ? $shipment_entry->carrier->name : null), 'Carriers') !!} </div></div>



</fieldset>