<div id="errorBlock" class="help-block"></div>

@include('export.oceans.cargo_loader.partials.sections.general')
<div class="row">
    <div class="col-md-6">
        @include('export.oceans.cargo_loader.partials.sections.carrier')
    </div>
    <div class="col-md-6">
        @include('export.oceans.cargo_loader.partials.sections.vessel')
    </div>
    <div class="col-md-12">
        @include('export.oceans.cargo_loader.partials.sections.container_details')
        @include('export.oceans.cargo_loader.partials.sections.inland_carrier')
    </div>
    <div class="col-md-6">
        @include('export.oceans.cargo_loader.partials.sections.shipper')
    </div>
    <div class="col-md-6">
        @include('export.oceans.cargo_loader.partials.sections.consignee')
    </div>
    <div class="col-md-12">
        @include('export.oceans.cargo_loader.partials.sections.notify')
    </div>
</div>


<!-- Modal forms section -->
@section('modal')
    @include('export.oceans.cargo_loader.partials.modal.container_details')
    @include('export.oceans.cargo_loader.partials.modal.sections.container.warehouse_receipts')
    @include('export.oceans.cargo_loader.partials.modal.sections.container.details_uns')
    @include('export.oceans.cargo_loader.partials.modal.sections.container.warehouse_details.warehouse_modal')
    @include('export.oceans.cargo_loader.partials.modal.sections.container.load_warehouse')


@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('export.oceans.cargo_loader.partials.scripts.init')
    @include('export.oceans.cargo_loader.partials.scripts.compute')
    @include('export.oceans.cargo_loader.partials.scripts.autocomplete')
    @include('export.oceans.cargo_loader.partials.scripts.tables')

@stop
