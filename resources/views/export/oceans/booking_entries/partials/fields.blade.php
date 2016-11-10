<div id="errorBlock" class="help-block"></div>

@include('export.oceans.booking_entries.partials.sections.general_info')
<div class="row">
    <div class="col-md-6">
        @include('export.oceans.booking_entries.partials.sections.origin')
        @include('export.oceans.booking_entries.partials.sections.shipper')
        @include('export.oceans.booking_entries.partials.sections.consignee')
    </div>
    <div class="col-md-6">
        @include('export.oceans.booking_entries.partials.sections.destination')
        @include('export.oceans.booking_entries.partials.sections.supplier')
        @include('export.oceans.booking_entries.partials.sections.details')
    </div>
    <div class="col-md-12">
        @include('export.oceans.booking_entries.partials.sections.tabs_container_cargo')
        @include('export.oceans.booking_entries.partials.sections.state_of_origin')
        @include('export.oceans.booking_entries.partials.sections.charges_details')
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsMemo(null, null, 'Booking Comments', 'booking_comments', null, 5, ' ') !!}
    </div>
</div>

<!-- Modal forms section -->
@section('modals')
    @include('export.oceans.booking_entries.partials.modal.charge_details')
    @include('export.oceans.booking_entries.partials.modal.container_details')
    @include('export.oceans.booking_entries.partials.modal.sections.container.details_uns')
    @include('export.oceans.booking_entries.partials.modal.cargo_details')
    @include('export.oceans.booking_entries.partials.modal.sections.cargo_details.box_details')
    @include('export.oceans.booking_entries.partials.modal.sections.cargo_details.vehicle_details')
    @include('export.oceans.booking_entries.partials.modal.sections.cargo_details.pick_cargo')


@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('export.oceans.booking_entries.partials.scripts.init')
    @include('export.oceans.booking_entries.partials.scripts.compute')
    @include('export.oceans.booking_entries.partials.scripts.autocomplete')
    @include('export.oceans.booking_entries.partials.scripts.tables')

@stop
