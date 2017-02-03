<div class="col-md-12">
    <div class="easyui-tabs">
        <!--- Shipper/Consignee-->
        <div title="Shipper/Consignee">
            <div class="form-horizontal">
                <div class="col-md-12">
                    <div style="padding-top: 10px;padding-bottom: 15px;">
                        <div class="row">
                            <div class="col-md-6">
                                @include('import.air.bill_of_lading.partials.sections.details.shipper')
                            </div>
                            <div class="col-md-6">
                                @include('import.air.bill_of_lading.partials.sections.details.consignee')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div title="Notify/Agent">
            <div class="form-horizontal">
                <div class="col-md-12">
                    <div style="padding-top: 10px;padding-bottom: 15px;">
                        <div class="row">
                            <div class="col-md-6">
                                @include('import.air.bill_of_lading.partials.sections.details.notify')
                            </div>
                            <div class="col-md-6">
                                @include('import.air.bill_of_lading.partials.sections.details.agent')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div title="Location">
            <div class="form-horizontal">
                <div class="col-md-12">
                    <div style="padding-top: 10px;padding-bottom: 15px;">
                        <div class="row">
                            @include('import.air.bill_of_lading.partials.sections.details.location')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>