<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
<div class="row">
<div class="col-md-12">
    <div class="col-md-6">
         @include('export.oceans.quotes.partials.sections.loading_details')
    </div>
    <div class="col-md-6">
        @include('export.oceans.quotes.partials.sections.general')
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
                            <div class="col-md-6">@include('export.oceans.quotes.partials.sections.customer')</div>
                            <div class="col-md-6">@include('export.oceans.quotes.partials.sections.agent_information')</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--- Shipper / Consignee-->
            <div title="Shipper / Consignee">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            <div class="col-md-6">@include('export.oceans.quotes.partials.sections.from')</div>
                            <div class="col-md-6">@include('export.oceans.quotes.partials.sections.to')</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--- Container details -->
            <div title="Container Details">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            @include('export.oceans.quotes.partials.sections.instructions')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row">
   <div class="col-md-12"> @include('export.oceans.quotes.partials.sections.cargo_details')</div>
</div>
<div class="row">
    <div class="col-md-12">@include('export.oceans.quotes.partials.sections.weight_totals')</div>
</div>
<div class="row">
    <div class="col-md-12">@include('export.oceans.quotes.partials.sections.charge_details')</div>
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsMemo(null, null, '', 'quotes_comments', null, ' ') !!}</div>
</div>

@section('modals')
    @include('export.oceans.quotes.partials.modal.container_details')
    @include('export.oceans.quotes.partials.modal.cargo_details')
    @include('export.oceans.quotes.partials.modal.charge_details')
@endsection

@section('scripts')
    <script>

    </script>

    @include('export.oceans.quotes.partials.scripts.init')
    @include('export.oceans.quotes.partials.scripts.compute')
    @include('export.oceans.quotes.partials.scripts.autocomplete')
    @include('export.oceans.quotes.partials.scripts.tables')
    @include('export.oceans.quotes.partials.scripts.validation')

@stop