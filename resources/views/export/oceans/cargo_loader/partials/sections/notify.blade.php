<fieldset id="state_of_origin">
    <div class="row">
        <div class="col-md-6">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Agent', 'agent_id', 'agent_name', Request::get('term'), ((isset($cargo_loader) and $cargo_loader->notify_id > 0) ? $cargo_loader->notify->name : null), 'Customers...') !!}
        </div>
        <div class="col-md-6">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Forwarding agent', 'forwarding_agent_id', 'forwarding_agent_name', Request::get('term'), ((isset($cargo_loader) and $cargo_loader->notify_id > 0) ? $cargo_loader->notify->name : null), 'Customers...') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">


            <legend>Notify</legend>
            <div class="row">
                {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'notify_id', 'notify_name', Request::get('term'), ((isset($cargo_loader) and $cargo_loader->notify_id > 0) ? $cargo_loader->notify->name : null), 'Customers...') !!}
            </div>
            <div class="row">
                {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'notify_address', null, 1, ' ') !!}
            </div>
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'notify_city', null, ' ') !!}
            </div>
            <div class="row">
                {!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'notify_state_id', 'notify_state_name', Request::get('term'), ((isset($cargo_loader) and $cargo_loader->notify_state_id > 0) ? $cargo_loader->notify_state->name : null), 'State') !!}
            </div>
            <div class="row">
                {!! Form::bsComplete('col-md-3', 'col-md-9', 'Country Name', 'notify_country_id', 'notify_country_name', Request::get('term'), ((isset($cargo_loader) and $cargo_loader->notify_country_id > 0) ? $cargo_loader->notify_country->name : null), 'Country') !!}
            </div>
            <div class="row">
                {!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'notify_zip_code_id', 'notify_zip_code_code', Request::get('term'), ((isset($cargo_loader) and $cargo_loader->notify_zip_code_id > 0) ? $cargo_loader->notify_zip_code->code : null), 'Zip Code') !!}
            </div>
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-9', 'Contact', 'notify_contact', null, ' ') !!}
            </div>
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-9', 'Contact Phone', 'notify_contact_phone', null, ' ') !!}
            </div>
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-9', 'Email', 'notify_email', null, ' ') !!}
            </div>
        </div>
        <div class="col-md-6">
            <legend>Domestic Routing/ Export Instructions</legend>
            <div class="row">
                {!! Form::bsMemo(null, null, '', 'domestic_instruction', null, 18, ' ') !!}
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-4">{!! Form::bsText(null, null, 'Pre-carriage by', 'pre_carriage_by', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Place of Receipt', 'place_receipt', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Loading Pier/Terminal', 'loading_terminal', null, ' ') !!}</div>
    </div>

    <div class="row">
        <div class="col-md-4">{!! Form::bsText(null, null, 'Exporting Carrier', 'exporting_carrier', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null,  null, 'Port of loading', 'port_loading', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsSelect(null, null, 'Type of Move', 'type_of_move', array('1' => 'DOOR TO DOOR', '2' => 'DOOR TO PIER', '3' => 'PIER TO DOOR', '4' => 'PIER TO PIER' ), null) !!}</div>
    </div>
    <div class="row">
        <div class="col-md-4">{!! Form::bsText(null, null, 'Foreign Port of Unloading', 'foreign_port', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Place of Delivery', 'place_delivery', null, ' ') !!}</div>
        <div class="col-md-4"><p><b> Containerized (Vessel Only)</b></p>
            <div class="col-md-4">{!! Form::bsCheck('Yes', 'vessel_yes') !!}</div>
            <div class="col-md-4">{!! Form::bsCheck('No', 'vessel_no') !!}</div>
        </div>
    </div>
   </fieldset>