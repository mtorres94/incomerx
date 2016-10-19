<div id="errorBlock" class="help-block"></div>

<div class="container">
    <div class="row">
        <section>
            <div class="wizard">
                @include('export.oceans.step_by_step.partials.sections.nav_tabs')
            </div>
        </section>
    </div>

</div>


<!-- Modal forms section -->
@section('modals')
    @include('export.oceans.step_by_step.partials.modal.load_warehouse')
    @include('export.oceans.step_by_step.partials.modal.warehouse_details')
    @include('export.oceans.step_by_step.partials.modal.sections.warehouse.warehouse_cargo_details')
    @include('export.oceans.step_by_step.partials.modal.container_details')
    @include('export.oceans.step_by_step.partials.modal.charge_details')
    @include('export.oceans.step_by_step.partials.modal.transportation_details')
    @include('export.oceans.step_by_step.partials.modal.PRO_Numbers')
    @include('export.oceans.step_by_step.partials.modal.customer_reference')
    @include('export.oceans.step_by_step.partials.modal.items_details')
    @include('export.oceans.step_by_step.partials.modal.details_UNs')

@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('export.oceans.step_by_step.partials.scripts.init')
    @include('export.oceans.step_by_step.partials.scripts.compute')
    @include('export.oceans.step_by_step.partials.scripts.autocomplete')
    @include('export.oceans.step_by_step.partials.scripts.tables')

@stop
