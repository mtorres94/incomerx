<div class="row">

    <div class="col-md-6">
        <div class="row">{!! Form::bsComplete('col-md-3', 'col-md-6', 'Carrier', 'carrier_id', 'carrier_name', Request::get('term'), ((isset($cargo_loader) and $cargo_loader->carrier_id > 0) ? $cargo_loader->carrier->name : null), 'Carriers') !!}</div>
        <div class="row"> {!! Form::bsComplete('col-md-3', 'col-md-6', 'Inland Carrier', 'inland_carrier_id', 'inland_carrier_name', Request::get('term'), ((isset($cargo_loader) and $cargo_loader->inland_driver_id > 0) ? $cargo_loader->inland_driver->name : null), 'Inland Carrier') !!}</div>
 <!--       <div class="row"> {!! Form::bsText('col-md-3', 'col-md-6', 'License/ ID #', 'inland_lic_number', null, null) !!} </div>-->
    </div>
    <div class="col-md-6">
        {!! Form::bsMemo(null, null, 'Marks', 'inland_mark', null, 2, ' ') !!}
    </div>
</div>
