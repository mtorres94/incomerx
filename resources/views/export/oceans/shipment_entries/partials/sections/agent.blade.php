<fieldset id="Agent">

    <div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Agent', 'agent_id', 'agent_name', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->agent_id > 0) ? $shipment_entry->agent->name : null), 'Customers') !!} </div></div>
    <div class="row"><div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Contact', 'agent_contact', null, '') !!}</div></div>
    <div class="row">
        <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'agent_phone', null, '') !!}</div>
        <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'agent_fax', null, '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Commission %', 'agent_commission_p', null, '') !!}</div>
        <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Amount', 'agent_commission_amount', null, '') !!}</div>

    </div>
    <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-4">
                    {!! Form::bsCheck('Confirmed', 'confirmed',  (isset($shipment_entry)? $shipment_entry->confirmed : 0)) !!}</div>
                <div class="col-md-5">
                    {!! Form::bsCheck('Spot Rate', 'spot_rate', (isset($shipment_entry)? $shipment_entry->spot_rate : 0)) !!}</div>
    </div>
    <div class="row"> <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Service', 'service_id', 'service_name', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->service_id > 0) ? $shipment_entry->service->name : null), 'Services') !!} </div></div>
    <div class="row"> <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'State of Origin', 'state_of_origin_id', 'state_of_origin_name', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->state_of_origin_id > 0) ? $shipment_entry->state_of_origin->name : null), 'State') !!} </div></div>
    <div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Forwarding Agent', 'forwarding_agent_id', 'forwarding_agent_name', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->forwarding_agent_id > 0) ? $shipment_entry->forwarding_agent->name : null), 'Customers') !!} </div></div>
</fieldset>