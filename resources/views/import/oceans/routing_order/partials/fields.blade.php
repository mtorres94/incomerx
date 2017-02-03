<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
@include('import.oceans.routing_order.partials.sections.general')
<div class="row">
    <div class="col-md-12">
        <div class="easyui-tabs" id="routing_tabs">
            <!--- Origin / Destination  -->
            <div title="Origin / Destination Agent">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            <div class="col-md-6">@include('import.oceans.routing_order.partials.sections.agent_origin')</div>
                            <div class="col-md-6">@include('import.oceans.routing_order.partials.sections.agent_destination')</div>
                        </div>
                    </div>
                </div>
            </div>

            <!--- Shipper / Consignee  -->
            <div title="Shipper / Consignee">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            <div class="col-md-6">@include('import.oceans.routing_order.partials.sections.shipper')</div>
                            <div class="col-md-6">@include('import.oceans.routing_order.partials.sections.consignee')</div>

                        </div>
                    </div>
                </div>
            </div>
            <!--- Instructions  -->
            <div title="Instructions">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            @include('import.oceans.routing_order.partials.sections.instructions')
                        </div>
                    </div>
                </div>
            </div>
            <!--- Supplier  -->
       <!--     <div title="Supplier">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            @include('import.oceans.routing_order.partials.sections.supplier')
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>
<div class="row">
    @include('import.oceans.routing_order.partials.sections.charge_details')
</div>
<div class="row">
    <div class="col-md-12">{{ Form::bsMemo(null, null, 'Special Instructions', 'instructions',null, '')  }}</div>

</div>


<!-- Modal forms section -->
@section('modals')
    @include('import.oceans.routing_order.partials.modal.charge_details')

@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>
    @include('import.oceans.routing_order.partials.scripts.init')
    @include('import.oceans.routing_order.partials.scripts.compute')
    @include('import.oceans.routing_order.partials.scripts.autocomplete')
    @include('import.oceans.routing_order.partials.scripts.tables')
    @include('import.oceans.routing_order.partials.scripts.validation')


@stop
