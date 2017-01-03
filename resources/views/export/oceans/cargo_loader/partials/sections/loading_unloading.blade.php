<div class="row">
    <div class="col-md-12">
        <div class="col-md-4">{!! Form::bsText('col-md-6', 'col-md-6', 'Pre-carriage by', 'pre_carriage_by', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsText('col-md-6', 'col-md-6', 'Place of Receipt', 'place_receipt', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsText('col-md-6', 'col-md-6', 'Loading Pier/Terminal', 'loading_terminal', null, ' ') !!}</div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-4">{!! Form::bsText('col-md-6', 'col-md-6', 'Exporting Carrier', 'exporting_carrier', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsText('col-md-6', 'col-md-6', 'Port of loading', 'port_loading', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsSelect('col-md-6', 'col-md-6', 'Type of Move', 'type_of_move', array('1' => 'DOOR TO DOOR', '2' => 'DOOR TO PIER', '3' => 'PIER TO DOOR', '4' => 'PIER TO PIER' ), null) !!}</div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-4">{!! Form::bsText('col-md-6', 'col-md-6', 'Foreign Port of Unloading', 'foreign_port', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsText('col-md-6', 'col-md-6', 'Place of Delivery', 'place_delivery', null, ' ') !!}</div>
        <div class="col-md-4">
            <div class="col-md-6"></div>
            <div class="col-md-6"><b> Containerized (Vessel Only)</b></div>
            <div class="col-md-6"></div>
            <div class="col-md-3">{!! Form::bsCheck('Yes', 'vessel_yes') !!}</div>
            <div class="col-md-3">{!! Form::bsCheck('No', 'vessel_no') !!}</div>
        </div>
    </div>

</div>