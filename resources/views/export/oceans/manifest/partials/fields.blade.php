
<div class="row">
    <legend> Ocean Manifest</legend>
</div>
<div class="row">
    <div class="col-md-2">
        {!! Form::bsComplete(null, null, 'FILE #', 'shipment_id', 'shipment_code', Request::get('term'), null, 'File...') !!}
    </div>
    <div class="col-md-2">
        {!! Form::bsSelect(null, null, 'Status', 'status', array('O' => 'Open','C' => 'Closed', 'H'=> 'Hold', 'V'=> 'Void'), 'Status'), null !!}
    </div>
    <div class="col-md-2">
        {!! Form::bsComplete(null, null, 'Destination', 'port_unloading_id', 'port_unloading_name', Request::get('term'), null, 'Port...') !!}
    </div>
    <div class="col-md-3">
        {!! Form::bsComplete(null, null, 'Shipper', 'shipper_id', 'shipper_name', Request::get('term'), null, 'Shipper...') !!}
    </div>
    <div class="col-md-3">
        {!! Form::bsComplete(null, null, 'Consignee', 'consignee_id', 'consignee_name', Request::get('term'), null, 'Consignee...') !!}
    </div>
</div>




<!-- Scripts sections -->
@section('scripts')
    @include('export.oceans.manifest.partials.scripts.autocomplete')

@stop