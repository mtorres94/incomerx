<div class="col-md-6">
    <div class="row">
        <div class="col-md-12">    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Place Receipt', 'place_receipt_id', 'place_receipt_name', Request::get('term'), ((isset($routing_order) and $routing_order->place_receipt_id > 0) ? $routing_order->place_receipt->name : null), 'World Locations') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Port Loading', 'port_loading_id', 'port_loading_name', Request::get('term'), ((isset($routing_order) and $routing_order->port_loading_id > 0) ? $routing_order->port_loading->name : null), 'Port') !!}
    </div></div>
    <div class="row">
        <div class="col-md-12">    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Place of Delivery', 'place_delivery_id', 'place_delivery_name', Request::get('term'), ((isset($routing_order) and $routing_order->place_delivery_id > 0) ? $routing_order->place_delivery->name : null), 'World Location') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Carrier', 'carrier_id', 'carrier_name', Request::get('term'), ((isset($routing_order) and $routing_order->carrier_id > 0) ? $routing_order->carrier->name : null), 'Carriers') !!}</div>
    </div>
    <div class="row"><div class="col-md-12">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Port Unloading', 'port_unloading_id', 'port_unloading_name', Request::get('term'), ((isset($routing_order) and $routing_order->port_unloading_id > 0) ? $routing_order->port_unloading->name : null), 'Port') !!}
    </div></div>
    <div class="row"><div class="col-md-12">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Type of Service', 'service_id', Sass\Service::all()->lists('code', 'id'), 'Service') !!}
    </div></div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsSelect('col-md-3', 'col-md-3', ' Incoterm', 'incoterm_type', Sass\Incoterm::all()->lists('code', 'id'), null) !!}
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="row"><div class="col-md-12">{!! Form::bsText('col-md-4', 'col-md-8', 'LCL Ocean to Miami', 'lcl_instruction', null, ' ') !!}</div></div>
    <div class="row"><div class="col-md-12">{!! Form::bsText('col-md-4', 'col-md-8', 'Air/ Air Via to Miami', 'air_air_to_miami', null, ' ') !!}</div></div>
    <div class="row"><div class="col-md-12">{!! Form::bsText('col-md-4', 'col-md-8', 'Air/ Air Via LA', 'air_air_to_la', null, ' ') !!}</div></div>
    <div class="row"><div class="col-md-12">{!! Form::bsText('col-md-4', 'col-md-8', 'Sea/ Air via Miami', 'sea_air_to_miami', null, ' ') !!}</div></div>
    <div class="row"><div class="col-md-12">{!! Form::bsText('col-md-4', 'col-md-8', 'Air/ Sea via Miami', 'air_sea_to_miami', null, ' ') !!}</div></div>
    <div class="row"><div class="col-md-12">{!! Form::bsText('col-md-4', 'col-md-8', 'Other', 'other', null, ' ') !!}</div></div>
</div>