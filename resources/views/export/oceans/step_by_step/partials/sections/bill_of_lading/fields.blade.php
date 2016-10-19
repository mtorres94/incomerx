<div id="errorBlock" class="help-block"></div>

@include('export.oceans.step_by_step.partials.sections.bill_of_lading.general')
<div class="row">
    <div class="col-md-6">
        @include('export.oceans.step_by_step.partials.sections.bill_of_lading.details')
    </div>
    <div class="col-md-6">
        @include('export.oceans.step_by_step.partials.sections.bill_of_lading.tabs_additional_info')
    </div>
    <div class="col-md-12">
        @include('export.oceans.step_by_step.partials.sections.bill_of_lading.agent')
    </div>
    <div class="col-md-12">
        @include('export.oceans.step_by_step.partials.sections.bill_of_lading.transportation_details')
    </div>
    <div class="col-md-12">
        @include('export.oceans.step_by_step.partials.sections.bill_of_lading.BL_comments')
    </div>

</div>


