<!-- Tabs Additional Information -->
<legend>Additional info</legend>
<div class="easyui-tabs" id="tabs_HBL">
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
    <!-- Tab SO Details-->
    <div title="Agent">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    @include('export.oceans.step_by_step.partials.sections.shipment_entries.agent')
                </div>
            </div>
        </div>
    </div>
    <!-- Tab Third Party -->
    <div title="Third Party">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    @include('export.oceans.step_by_step.partials.sections.shipment_entries.third_party')
                </div>
            </div>
        </div>
    </div>
    <!-- Tab Inland Carrier-->
    <div title="Inland Carrier">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    @include('export.oceans.step_by_step.partials.sections.HBL_details.additional_information.inland_carrier')
                </div>
            </div>
        </div>
    </div>

    <!-- Tab SO Details -->
    <div title="Customer Reference">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    @include('export.oceans.step_by_step.partials.sections.HBL_details.additional_information.cust_ref')
                </div>
            </div>
        </div>
    </div>
</div>
