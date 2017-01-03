<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}

<div class="wizard">
    @include('export.oceans.step_by_step.partials.sections.nav_tabs')
</div>



<!-- Modal forms section -->
@section('modals')
    @include('export.oceans.step_by_step.partials.modal.container_details')
    @include('export.oceans.step_by_step.partials.modal.charge_details')
    @include('export.oceans.step_by_step.partials.modal.transportation_details')
    @include('export.oceans.step_by_step.partials.modal.warehouse_details')
    @include('export.oceans.step_by_step.partials.modal.load_warehouse')
    @include('export.oceans.step_by_step.partials.modal.sections.warehouse.warehouse_cargo_details')
    @include('export.oceans.step_by_step.partials.modal.PRO_Numbers')
    @include('export.oceans.step_by_step.partials.modal.customer_reference')
    @include('export.oceans.step_by_step.partials.modal.items_details')
    @include('export.oceans.step_by_step.partials.modal.createHouse')
    @include('export.oceans.step_by_step.partials.modal.details_UNs')

    @include('export.oceans.step_by_step.partials.modal.HBL_cargo')
@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('export.oceans.step_by_step.partials.scripts.init')
    @include('export.oceans.step_by_step.partials.scripts.compute')
    @include('export.oceans.step_by_step.partials.scripts.autocomplete')
    @include('export.oceans.step_by_step.partials.scripts.tables')
    @include('export.oceans.step_by_step.partials.scripts.validation')

@stop
