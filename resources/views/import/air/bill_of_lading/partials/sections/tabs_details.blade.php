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
  <!--  <div title="Date/POD">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    <div class="row">
                            @include('import.oceans.bill_of_lading.partials.sections.details.date_pdo')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div title="Import/Customs">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    <div class="row">
                        @include('import.oceans.bill_of_lading.partials.sections.details.import_customs')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div title="Routing/Export">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    <div class="row">
                        @include('import.oceans.bill_of_lading.partials.sections.details.routing_export')
                    </div>
                </div>
            </div>
        </div>
    </div>-->
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

<!--<div title="Pick up & Delivery Order">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    <div class="row">
                        @include('import.oceans.bill_of_lading.partials.sections.details.pickup_delivery_orders')
                    </div>
                </div>
            </div>
        </div>
    </div>-->
</div>