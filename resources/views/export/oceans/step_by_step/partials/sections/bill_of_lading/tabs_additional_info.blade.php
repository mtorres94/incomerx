<!-- Tabs Additional Information -->
<legend>Additional info</legend>
<div class="easyui-tabs" id="tabs_add_info">
    <!--- Notify  -->
    <div title="Notify">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    @include('export.oceans.step_by_step.partials.sections.bill_of_lading.additional_information.notify')
                </div>
            </div>
        </div>
    </div>

    <!-- Third Party -->
    <div title="Third Party">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    @include('export.oceans.step_by_step.partials.sections.bill_of_lading.additional_information.third_party')
                </div>
            </div>
        </div>
    </div>

    <!-- Tab POD -->
    <div title="POD">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    @include('export.oceans.step_by_step.partials.sections.bill_of_lading.additional_information.POD')
                </div>
            </div>
        </div>
    </div>

    <!-- Tab Caller -->
    <div title="ITN">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    {!! Form::bsMemo(null, null, 'Instructions', 'add_info_comments', null, 4, '') !!}
                </div>
            </div>
        </div>
    </div>


    <!-- Tab Trailer -->
    <div title="SD Bank">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    @include('export.oceans.step_by_step.partials.sections.bill_of_lading.additional_information.SD_bank')
                </div>
            </div>
        </div>
    </div>

    <!-- Tab SO Details-->
    <div title="Inland Carrier">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    @include('export.oceans.step_by_step.partials.sections.bill_of_lading.additional_information.inland_carrier')
                </div>
            </div>
        </div>
    </div>

    <!-- Tab SO Details-->
    <div title="Cust Ref">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    @include('export.oceans.step_by_step.partials.sections.bill_of_lading.additional_information.cust_ref')
                </div>
            </div>
        </div>
    </div>

    <!-- Tab SO Details-->
    <div title="Item Details">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    @include('export.oceans.step_by_step.partials.sections.bill_of_lading.additional_information.item_details')
                </div>
            </div>
        </div>
    </div>

    <!-- Tab SO Details-->
    <div title="Import/Confirm">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    @include('export.oceans.step_by_step.partials.sections.bill_of_lading.additional_information.import')
                </div>
            </div>
        </div>
    </div>

    <!-- Tab SO Details-->
    <div title="Custom Broker">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    @include('export.oceans.step_by_step.partials.sections.bill_of_lading.additional_information.custom_broker')
                </div>
            </div>
        </div>
    </div>


</div>
