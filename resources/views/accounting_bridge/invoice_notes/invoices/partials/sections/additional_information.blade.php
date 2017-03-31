<div class="row">
    <div class="col-md-12">
        <div class="easyui-tabs" id="invoice_tabs">
            <!---Agent -->
            <div title="Agent">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            @include('accounting_bridge.invoice_notes.invoices.partials.sections.agent')
                        </div>
                    </div>
                </div>
            </div>
            <!--- Air / Ocean-->
            <div title="Air/ Ocean">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            @include('accounting_bridge.invoice_notes.invoices.partials.sections.air_ocean')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>