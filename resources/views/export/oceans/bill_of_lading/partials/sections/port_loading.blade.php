
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsComplete('col-md-3', 'col-md-9','Port of Loading ', 'port_loading_id', 'port_loading_name', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->port_loading_id > 0) ? $bill_of_lading->loading->name : null), 'Ports') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsComplete('col-md-3', 'col-md-9','Port of Unloading ', 'port_unloading_id', 'port_unloading_name', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->port_unloading_id > 0) ? $bill_of_lading->unloading->name : null), 'Ports') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsComplete('col-md-3', 'col-md-9','Carrier ', 'carrier_id', 'carrier_name', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->carrier_id > 0) ? $bill_of_lading->carrier->name : null), 'Carrier') !!}
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            {!! Form::bsComplete('col-md-3', 'col-md-9','Country of origin ', 'origin_country_id', 'origin_country_name', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->origin_country_id > 0) ? $bill_of_lading->origin_country->name : null), 'Country') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Customs Code', 'customs_code', null, '') !!}</div>
    </div>

    <div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9','Forwarding Agent ', 'forwarding_agent_id', 'forwarding_agent_name', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->forwarding_agent_id > 0) ? $bill_of_lading->forwarding_agent->name : null), 'Agent') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsText('col-md-3', 'col-md-3', 'Comm. (%)', 'commission_p', null, '') !!}
            {!! Form::bsText('col-md-3', 'col-md-3', 'Amount $', 'amount', null, ' ') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsComplete('col-md-3', 'col-md-9','Co-Loader ', 'coloader_id', 'coloader_name', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->coloader_id > 0) ? $bill_of_lading->coloader->name : null), '') !!}

        </div>
    </div>




