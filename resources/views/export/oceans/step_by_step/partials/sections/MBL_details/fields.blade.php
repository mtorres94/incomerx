<div id="errorBlock" class="help-block"></div>

@include('export.oceans.step_by_step.partials.sections.MBL_details.general')
<div class="row">
    <div class="col-md-6">
        @include('export.oceans.step_by_step.partials.sections.MBL_details.details')
    </div>
    <div class="col-md-6">
        @include('export.oceans.step_by_step.partials.sections.MBL_details.tabs_additional_info')
    </div>
    <div class="col-md-12">
        @include('export.oceans.step_by_step.partials.sections.MBL_details.agent')
    </div>

    <div class="col-md-12">
        @include('export.oceans.step_by_step.partials.sections.MBL_details.BL_comments')
    </div>

</div>


