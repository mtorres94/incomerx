<div id="errorBlock" class="help-block"></div>

<div class="row">
    @include('export.oceans.step_by_step.partials.sections.booking_entries.general')

    <div class="col-md-6">
        @include('export.oceans.step_by_step.partials.sections.booking_entries.booking_reference')
    </div>
    <div class="col-md-6">
        @include('export.oceans.step_by_step.partials.sections.booking_entries.supplier')
    </div>
    <div class="col-md-12">
        @include("export.oceans.step_by_step.partials.sections.booking_entries.container_details")
        @include("export.oceans.step_by_step.partials.sections.booking_entries.point_of_state")
        @include("export.oceans.step_by_step.partials.sections.booking_entries.charge_details")
    </div>

</div>
<!-- Modal forms section -->
