<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}


<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            @include('import.air.quotes.partials.sections.shipment_details')
        </div>
        <div class="col-md-6">
            @include('import.air.quotes.partials.sections.general')
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="easyui-tabs" id="quotes_tabs">
            <!--- Customer / Agent  -->
            <div title="Customer / Agent">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            <div class="col-md-6">@include('import.air.quotes.partials.sections.customer')</div>
                            <div class="col-md-6">@include('import.air.quotes.partials.sections.agent')</div>
                        </div>
                    </div>
                </div>
            </div>

            <!--- Shipper / Consignee  -->
            <div title="Shipper / Consignee">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            <div class="col-md-6">@include('import.air.quotes.partials.sections.shipper')</div>
                            <div class="col-md-6">@include('import.air.quotes.partials.sections.consignee')</div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('import.air.quotes.partials.sections.cargo_details')
    </div>
</div>
<div class="row">
    @include('import.air.quotes.partials.sections.charge_details')
</div>
<div class="row">
    <div class="col-md-12">{{ Form::bsMemo(null, null, 'Special Instructions', 'instructions',null, '')  }}</div>

</div>


<!-- Modal forms section -->
@section('modals')
    @include('import.air.quotes.partials.modal.cargo_details')
    @include('import.oceans.quotes.partials.modal.origin_charge')
    @include('import.oceans.quotes.partials.modal.destination_charge')

@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('import.air.quotes.partials.scripts.init')
    @include('import.air.quotes.partials.scripts.compute')
    @include('import.air.quotes.partials.scripts.autocomplete')
    @include('import.air.quotes.partials.scripts.tables')
    @include('import.air.quotes.partials.scripts.validation')


@stop
