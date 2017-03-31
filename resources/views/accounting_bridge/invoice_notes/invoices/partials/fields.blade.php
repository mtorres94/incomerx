<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
{!! Form::hidden('invoice_id', (isset($invoice) ? $invoice->id : ""), ['id' => 'invoice_id', 'class' => 'form-control input-sm']) !!}

    @if(isset($invoice))
        <div class="pull-right">
            <button type="button" id="btn_transfer" class="btn btn-primary">Transfer to Account</button>
        </div>
    @endif

<div class="col-md-12">
    @include('accounting_bridge.invoice_notes.invoices.partials.sections.general')
</div>
<div class="row">
    <div class="col-md-6">@include('accounting_bridge.invoice_notes.invoices.partials.sections.tabs')</div>
    <div class="col-md-6">@include('accounting_bridge.invoice_notes.invoices.partials.sections.additional_information')</div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('accounting_bridge.invoice_notes.invoices.partials.sections.transaction_cargo_details')
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="easyui-tabs" id="details_tabs">
            <!---Charge Details -->
            <div title="Charge Details">
                <div class="col-md-12">
                    <div style="padding-top: 10px;padding-bottom: 15px;">
                        @include('accounting_bridge.invoice_notes.invoices.partials.sections.charge_details')
                    </div>
                </div>
            </div>
            <!---Cargo Details -->
            <div title="Cargo Details">
                <div class="col-md-12">
                    <div style="padding-top: 10px;padding-bottom: 15px;">
                        @include('accounting_bridge.invoice_notes.invoices.partials.sections.cargo_details')
                    </div>
                </div>
            </div>
            <!---Container Details -->
            <div title="Container Details">
                <div class="col-md-12">
                    <div style="padding-top: 10px;padding-bottom: 15px;">
                        @include('accounting_bridge.invoice_notes.invoices.partials.sections.container_details')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Invoice Comments', 'invoice_comments', null, null) !!}</div>
    <div class="col-md-6">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Comments', 'comments', null, null) !!}</div>
</div>

<!-- Modal forms section -->
@section('modals')
    @include('accounting_bridge.invoice_notes.invoices.partials.modal.charge_details')
    @include('accounting_bridge.invoice_notes.invoices.partials.modal.cargo_details')
    @include('accounting_bridge.invoice_notes.invoices.partials.modal.container_details')

@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('accounting_bridge.invoice_notes.invoices.partials.scripts.init')
    @include('accounting_bridge.invoice_notes.invoices.partials.scripts.autocomplete')
    @include('accounting_bridge.invoice_notes.invoices.partials.scripts.tables')
    @include('accounting_bridge.invoice_notes.invoices.partials.scripts.compute')


@stop
