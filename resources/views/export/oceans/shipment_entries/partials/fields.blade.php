<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', ($user_open_id == Auth::user()->id ? "0" : "1"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
@include('export.oceans.shipment_entries.partials.sections.general_info')

<div class="row">
    @include('export.oceans.shipment_entries.partials.sections.origin_destination')
</div>
<div class="easyui-tabs">
    <!--- Shipper / Consignee  -->
    <div title="Shipper/ Consignee">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    <div class="row">
                        <div class="col-md-6">
                            @include('export.oceans.shipment_entries.partials.sections.shipper')
                        </div>
                        <div class="col-md-6">
                            @include('export.oceans.shipment_entries.partials.sections.consignee')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--- Broker / Agent  -->
    <div title="Broker/ Agent">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    <div class="row">
                        <div class="col-md-6">
                            @include('export.oceans.shipment_entries.partials.sections.broker')
                            @include('export.oceans.shipment_entries.partials.sections.booking_agent')
                        </div>
                        <div class="col-md-6">
                            @include('export.oceans.shipment_entries.partials.sections.agent')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--- Notify  -->
    <div title="Notify">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    <div class="row">
                        @include('export.oceans.shipment_entries.partials.sections.notify')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">@include('export.oceans.shipment_entries.partials.sections.container_details')</div>
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsMemo(null, null, 'Comments', 'shipment_comments', null, 2, ' ') !!}</div>
</div>



<!-- Modal forms section -->
@section('modals')
    @include('export.oceans.shipment_entries.partials.modal.container_details')
    @include('export.oceans.shipment_entries.partials.modal.sections.container.details_uns')
@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('export.oceans.shipment_entries.partials.scripts.init')
    @include('export.oceans.shipment_entries.partials.scripts.autocomplete')
    @include('export.oceans.shipment_entries.partials.scripts.compute')
    @include('export.oceans.shipment_entries.partials.scripts.tables')
    @include('export.oceans.shipment_entries.partials.scripts.validation')



@stop
