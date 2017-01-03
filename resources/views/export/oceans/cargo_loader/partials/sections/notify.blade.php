<div class="row">
        <div class="col-md-6">
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

        </div>
        <div class="col-md-6">
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-8', 'Contact', 'notify_contact', null, ' ') !!}
            </div>
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-8', 'Contact Phone', 'notify_contact_phone', null, ' ') !!}
            </div>
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-8', 'Email', 'notify_email', null, ' ') !!}
            </div>
                <div class="row">
                    {!! Form::bsComplete('col-md-3', 'col-md-8', 'Agent', 'agent_id', 'agent_name', Request::get('term'), ((isset($cargo_loader) and $cargo_loader->notify_id > 0) ? $cargo_loader->notify->name : null), 'Customers...') !!}
                </div>
                <div class="row">
                    {!! Form::bsComplete('col-md-3', 'col-md-8', 'Forwarding agent', 'forwarding_agent_id', 'forwarding_agent_name', Request::get('term'), ((isset($cargo_loader) and $cargo_loader->notify_id > 0) ? $cargo_loader->notify->name : null), 'Customers...') !!}
                </div>

            <div class="row">
                    {!! Form::bsMemo('col-md-3', 'col-md-8', 'Domestic Routing/ Export Instructions', 'domestic_instruction', null, 1, ' ') !!}
            </div>

        </div>

    </div>