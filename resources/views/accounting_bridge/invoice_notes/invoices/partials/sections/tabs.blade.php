<div class="row">
    <div class="col-md-12">
        <div class="easyui-tabs" id="invoice_tabs">
            <!---Bill to  -->
            <div title="Bill to">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                          @include('accounting_bridge.invoice_notes.invoices.partials.sections.bill_to')
                        </div>
                    </div>
                </div>
            </div>
            <!--- Shipper -->
            <div title="Shipper ">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            @include('accounting_bridge.invoice_notes.invoices.partials.sections.shipper')
                        </div>
                    </div>
                </div>
            </div>
            <!--- Container details -->
            <div title="Consignee">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            @include('accounting_bridge.invoice_notes.invoices.partials.sections.consignee')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>