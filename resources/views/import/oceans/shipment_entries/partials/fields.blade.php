<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
@include('import.oceans.shipment_entries.partials.sections.general')
<div class="row">
    @include('import.oceans.shipment_entries.partials.sections.details')
    @include('import.oceans.shipment_entries.partials.sections.origin_destination')
</div>
<div class="row">
    <div class="col-md-6">
        @include('import.oceans.shipment_entries.partials.sections.shipper')
    </div>
    <div class="col-md-6">
        @include('import.oceans.shipment_entries.partials.sections.consignee')
    </div>
</div>
<div class="row">
    @include('import.oceans.shipment_entries.partials.sections.broker')
</div>
<div class="row">
    @include('import.oceans.shipment_entries.partials.sections.import_information')
</div>
<div class="row">
    @include('import.oceans.shipment_entries.partials.sections.container_details')
</div>


<!-- Modal forms section -->
@section('modals')
    @include('import.oceans.shipment_entries.partials.modal.container_details')


@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('import.oceans.shipment_entries.partials.scripts.init')
    @include('import.oceans.shipment_entries.partials.scripts.compute')
    @include('import.oceans.shipment_entries.partials.scripts.autocomplete')
    @include('import.oceans.shipment_entries.partials.scripts.tables')

@stop
