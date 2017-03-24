<div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9','Carrier ', 'carrier_id', 'carrier_name', Request::get('term'),((isset($loading_guide) and $loading_guide->carrier_id > 0) ? $loading_guide->carrier->name: null), 'CARRIER') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9','Origin ', 'origin_id', 'origin_name', Request::get('term'),((isset($loading_guide) and $loading_guide->origin_id > 0) ? $loading_guide->origin->name: null), 'PORT') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9','Destination ', 'destination_id', 'destination_name', Request::get('term'),((isset($loading_guide) and $loading_guide->destination_id > 0) ? $loading_guide->destination->name: null), 'PORT') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9','Via ', 'via_id', 'via_name', Request::get('term'),((isset($loading_guide) and $loading_guide->via_id > 0) ? $loading_guide->via->name: null), 'PORT') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9','Agent ', 'agent_id', 'agent_name', Request::get('term'),((isset($loading_guide) and $loading_guide->agent_id > 0) ? $loading_guide->agent->name: null), 'Agent') !!}</div>
    </div>