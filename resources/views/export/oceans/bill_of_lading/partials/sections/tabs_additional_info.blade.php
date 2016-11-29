<!-- Tabs Additional Information -->
<legend>Additional info</legend>
<div class="easyui-tabs">
    <!--- Notify  -->
    <div title="Notify">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    @include('export.oceans.bill_of_lading.partials.sections.additional_information.notify')
                </div>
            </div>
        </div>
    </div>

    <!-- Third Party -->
    <div title="Third Party">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    @include('export.oceans.bill_of_lading.partials.sections.additional_information.third_party')
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

</div>
