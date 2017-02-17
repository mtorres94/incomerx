<div class="row">
    <div class="col-md-12">    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Place Receipt', 'place_receipt_id', 'place_receipt_name', Request::get('term'), ((isset($quotes) and $quotes->place_receipt_id > 0) ? $quotes->place_receipt->name : null), 'World Locations') !!}</div>
</div>
<div class="row">
    <div class="col-md-12">    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Port Loading', 'port_loading_id', 'port_loading_name', Request::get('term'), ((isset($quotes) and $quotes->port_loading_id > 0) ? $quotes->port_loading->name : null), 'Ocean Ports') !!}</div>
</div>

<div class="row">
    <div class="col-md-12">    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Port of Unloading', 'port_unloading_id', 'port_unloading_name', Request::get('term'), ((isset($quotes) and $quotes->port_unloading_id > 0) ? $quotes->port_unloading->name : null), 'Ocean Ports') !!}</div>
</div>
<div class="row">
    <div class="col-md-12">    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Place of Delivery', 'place_delivery_id', 'place_delivery_name', Request::get('term'), ((isset($quotes) and $quotes->place_delivery_id > 0) ? $quotes->place_delivery->name : null), 'World Location') !!}</div>
</div>
<div class="row">
    <div class="col-md-12">    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Carrier', 'carrier_id', 'carrier_name', Request::get('term'), ((isset($quotes) and $quotes->carrier_id > 0) ? $quotes->carrier->name : null), 'Carriers') !!}</div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsSelect('col-md-3', 'col-md-3', 'Service', 'service_id', Sass\Service::all()->lists('code', 'id'), 'Services', 'body') !!}
        {!! Form::bsSelect('col-md-3', 'col-md-3', ' Incoterm', 'incoterm_type', Sass\Incoterm::all()->lists('code', 'id'), null, 'body') !!}
    </div>
</div>
