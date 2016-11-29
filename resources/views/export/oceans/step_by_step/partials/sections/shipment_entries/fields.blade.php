<div id="errorBlock" class="help-block"></div>
<div class="row">
    @include('export.oceans.step_by_step.partials.sections.shipment_entries.general')
    @include('export.oceans.step_by_step.partials.sections.shipment_entries.origin_destination')
</div>
<div class="row">
    <div class="col-md-6">
        <div class="easyui-tabs" id="shipment_tabs">
            <!--- Shipper  -->
            <div title="Shipper">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            @include('export.oceans.step_by_step.partials.sections.shipment_entries.shipper')
                        </div>
                    </div>
                </div>
            </div>

            <!--- Consignee  -->
            <div title="Consignee">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            @include('export.oceans.step_by_step.partials.sections.shipment_entries.consignee')
                        </div>
                    </div>
                </div>
            </div>
            <!--- Notify  -->
            <div title="Notify">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            @include('export.oceans.step_by_step.partials.sections.shipment_entries.notify')
                        </div>
                    </div>
                </div>
            </div>
            <!--- Agent  -->
            <div title="Agent">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            @include('export.oceans.step_by_step.partials.sections.shipment_entries.agent')
                        </div>
                    </div>
                </div>
            </div>
            <!--- Third Party  -->
            <div title="Third Party">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            @include('export.oceans.step_by_step.partials.sections.shipment_entries.third_party')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        @include('export.oceans.step_by_step.partials.sections.shipment_entries.carrier')
    </div>
</div>
    <div class="row">
        <!--<div class="col-md-12">
            @include('export.oceans.step_by_step.partials.sections.cargo_loader.container_details')
        </div> -->
        <div class="col-md-12">
            {!! Form::bsMemo(null, null, 'Comments', 'shipment_comment', null, 5) !!}
        </div>
    </div>
