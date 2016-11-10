<fieldset>
    <div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9','Carrier ', 'carrier_id', 'carrier_name', Request::get('term'),((isset($cargo_loader) and $cargo_loader->carrier_id > 0) ? $cargo_loader->carrier->name: null), '') !!}</div>
        </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9','Place of receipt ', 'place_receipt_id', 'place_receipt_name', Request::get('term'),((isset($cargo_loader) and $cargo_loader->place_receipt_id > 0) ? $cargo_loader->receipt->name: null), '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9','Port of Loading ', 'port_loading_id', 'port_loading_name', Request::get('term'),((isset($cargo_loader) and $cargo_loader->port_loading_id > 0) ? $cargo_loader->loading->name : null), '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9','Port of Unloading ', 'port_unloading_id', 'port_unloading_name', Request::get('term'),((isset($cargo_loader) and $cargo_loader->port_unloading_id> 0) ? $cargo_loader->unloading->name: null), '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9','Place of Delivery', 'place_delivery_id', 'place_delivery_name', Request::get('term'),((isset($cargo_loader) and $cargo_loader->place_delivery_id > 0) ? $cargo_loader->delivery->name: null), '') !!}</div>
    </div>
</fieldset>