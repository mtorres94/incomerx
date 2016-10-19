<fieldset id="state_of_origin">


    <div class="row">
        <div class="col-md-4">{!! Form::bsText(null, null, 'Pre-carriage by', 'pre_carriage_by', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Place of Receipt', 'place_receipt', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Loading Pier/Terminal', 'loading_terminal', null, ' ') !!}</div>
    </div>

    <div class="row">
        <div class="col-md-4">{!! Form::bsText(null, null, 'Exporting Carrier', 'exporting_carrier', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null,  null, 'Port of loading', 'port_loading', null, ' ') !!}</div>
        <div class="col-md-4"> {!! Form::bsComplete(null, null, 'Transhipment Port', 'transhipment_port_id', 'transhipment_port_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->transhipment_port_id > 0) ? $booking_entry->transhipment_port->code : null), 'Port') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-4">{!! Form::bsText(null, null, 'Foreign Port of Unloading', 'foreign_port', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Place of Delivery', 'place_delivery', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsSelect(null, null, 'Type of Move', 'type_of_move', array('1' => 'DOOR TO DOOR', '2' => 'DOOR TO PIER', '3' => 'PIER TO DOOR', '4' => 'PIER TO PIER' ), null) !!}</div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"><p><b> Containerized (Vessel Only)</b></p>
            <div class="col-md-4">{!! Form::bsCheck('Yes', 'vessel_yes') !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('No', 'vessel_no') !!}</div>
        </div>
    </div>


</fieldset>