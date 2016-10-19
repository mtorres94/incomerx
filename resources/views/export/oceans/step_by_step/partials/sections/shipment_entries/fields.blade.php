<div id="errorBlock" class="help-block"></div>
<div class="row">
    @include('export.oceans.step_by_step.partials.sections.shipment_entries.general')
    @include('export.oceans.step_by_step.partials.sections.shipment_entries.origin_destination')
    <div class="col-md-6">
        @include('export.oceans.step_by_step.partials.sections.shipment_entries.shipper')
    </div>
    <div class="col-md-6">
        @include('export.oceans.step_by_step.partials.sections.shipment_entries.consignee')
    </div>
    <div class="col-md-12">
        @include('export.oceans.step_by_step.partials.sections.shipment_entries.carrier')
    </div>
    <div class="col-md-12">
        {!! Form::bsMemo(null, null, 'Comments', 'shipment_comment', null, 5) !!}
    </div>

</div>
