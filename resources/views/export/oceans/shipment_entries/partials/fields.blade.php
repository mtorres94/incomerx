<div id="errorBlock" class="help-block"></div>

@include('export.oceans.shipment_entries.partials.sections.general_info')

<div class="row">
     @include('export.oceans.shipment_entries.partials.sections.origin_destination')
    <div class="col-md-6">
        @include('export.oceans.shipment_entries.partials.sections.shipper')
    </div>
    <div class="col-md-6">
        @include('export.oceans.shipment_entries.partials.sections.consignee')
    </div>
    <div class="col-md-12">
        @include('export.oceans.shipment_entries.partials.sections.broker')
        @include('export.oceans.shipment_entries.partials.sections.booking_agent')
        @include('export.oceans.shipment_entries.partials.sections.agent')
       <!-- @include('export.oceans.shipment_entries.partials.sections.weight_totals')
        @include('export.oceans.shipment_entries.partials.sections.details_hbl')-->
    </div>
    <div class="col-md-12">
        {!! Form::bsMemo(null, null, 'Comments', 'shipment_comment', null, 5) !!}
    </div>

</div>

<!-- Modal forms section -->
@section('modals')
    @include('export.oceans.shipment_entries.partials.modals.hbl_details')

@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('export.oceans.shipment_entries.partials.scripts.init')
    @include('export.oceans.shipment_entries.partials.scripts.autocomplete')
    @include('export.oceans.shipment_entries.partials.scripts.compute')
    @include('export.oceans.shipment_entries.partials.scripts.tables')


@stop
