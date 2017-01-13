<h4> To - Origin</h4>
<div class="row">
    <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9','Agent', 'origin_id', 'origin_name', Request::get('term'),
    ((isset($routing_order) and $routing_order->origin_id > 0) ? $routing_order->origin->name : null), 'Name') !!}</div>
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9','Country', 'origin_country_id', 'origin_country_name', Request::get('term'),
    ((isset($routing_order) and $routing_order->origin_country_id > 0) ? $routing_order->origin_country->name : null), 'Country') !!}</div>
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9','Contact', 'origin_contact',null, '') !!}</div>
</div>


