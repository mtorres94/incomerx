<div id="errorBlock" class="help-block"></div>

@include('export.oceans.step_by_step.partials.sections.HBL_details.general')
<div class="row">
    <div class="col-md-12">
        @include('export.oceans.step_by_step.partials.sections.HBL_details.details')
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <legend>Domestic Routing/ Export Instructions</legend>
            <div class="row">
                {!! Form::bsMemo(null, null, '', 'domestic_instruction', null, 7, ' ') !!}
            </div>
        </div>
        <div class="col-md-6">
            @include('export.oceans.step_by_step.partials.sections.HBL_details.BL_comments')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="easyui-tabs" id="tabs_HBL">
                <!--- HBL Details  -->
                <div title="HBL Details">
                    <div class="form-horizontal">
                        <div class="col-md-12">
                            <div style="padding-top: 10px;padding-bottom: 15px;">
                                @include('export.oceans.step_by_step.partials.sections.HBL_details.hbl_details')
                            </div>
                        </div>
                    </div>
                </div>
                <!--- Charges Details  -->
                <div title="Charges Details">
                    <div class="form-horizontal">
                        <div class="col-md-12">
                            <div style="padding-top: 10px;padding-bottom: 15px;">
                                @include('export.oceans.step_by_step.partials.sections.HBL_details.charge_details')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="col-md-12">

</div>

</div>


