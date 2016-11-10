<fieldset id="Agent">

    <div class="row">
        <div class="col-md-6">
            <div class="row"> {!! Form::bsComplete('col-md-3', 'col-md-9', 'Agent', 'agent_id', 'agent_name', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->agent_id > 0) ? $shipment_entry->agent->name : null), 'Customers') !!} </div>
            <div class="row"> {!! Form::bsText('col-md-3', 'col-md-9', 'Contact', 'agent_contact', null, '') !!}</div>

            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-3', 'Phone', 'agent_phone', null, '') !!}
                {!! Form::bsText('col-md-2', 'col-md-3', 'Fax', 'agent_fax', null, '') !!}
            </div>
            <div class="row"> {!! Form::bsText('col-md-3', 'col-md-2', 'Commission %', 'agent_commission_p', null, '') !!}</div>
        </div>
        <div class="col-md-6">

            <div class="row">
                <div class="col-md-3"> {!! Form::bsCheck('Confirmed', 'confirmed') !!}</div>
                <div class="col-md-3"> {!! Form::bsCheck('Spot Rate', 'spot_rate') !!}</div>
                {!! Form::bsText('col-md-2', 'col-md-4', 'Amount $', 'agent_commission_amount', null, '') !!}
            </div>
            <div class="row"> {!! Form::bsComplete('col-md-3', 'col-md-9', 'Service', 'service_id', 'service_name', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->service_id > 0) ? $shipment_entry->service->name : null), 'Services') !!} </div>
        </div>
    </div>


</fieldset>