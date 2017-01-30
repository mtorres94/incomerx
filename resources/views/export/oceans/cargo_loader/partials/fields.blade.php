<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
@include('export.oceans.cargo_loader.partials.sections.general')
<div class="row">
    <div class="col-md-6">
        @include('export.oceans.cargo_loader.partials.sections.carrier')
    </div>
    <div class="col-md-6">
        @include('export.oceans.cargo_loader.partials.sections.vessel')
    </div>
    <div class="col-md-12">
        @include('export.oceans.cargo_loader.partials.sections.container_details')
        @include('export.oceans.cargo_loader.partials.sections.inland_carrier')
    </div>
    <!--<div class="col-md-12">
        @include('export.oceans.cargo_loader.partials.sections.hbl_details')
    </div>-->
</div>
<!--
<div class="row">
    <div id="tabs_cargo" class="easyui-tabs">
        <!--- Shipper / Consignee
        <div title="Shipper - Consignee">
            <div class="form-horizontal">
                <div class="col-md-12">
                    <div style="padding-top: 10px;padding-bottom: 15px;">
                        <div class="row">
                            <div class="col-md-6">
                                @include('export.oceans.cargo_loader.partials.sections.shipper')
                            </div>
                            <div class="col-md-6">
                                @include('export.oceans.cargo_loader.partials.sections.consignee')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- Notify
        <div title="Notify">
            <div class="form-horizontal">
                <div class="col-md-12">
                    <div style="padding-top: 10px;padding-bottom: 15px;">
                        <div class="row">
                            @include('export.oceans.cargo_loader.partials.sections.notify')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- Loading/ Unloading
        <div title="Loading/ Unloading">
            <div class="form-horizontal">
                <div class="col-md-12">
                    <div style="padding-top: 10px;padding-bottom: 15px;">
                        <div class="row">
                            @include('export.oceans.cargo_loader.partials.sections.loading_unloading')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->


<!-- Modal forms section -->
@section('modals')
    @include('export.oceans.cargo_loader.partials.modal.container_details')
    @include('export.oceans.cargo_loader.partials.modal.sections.container.warehouse_receipts')
    @include('export.oceans.cargo_loader.partials.modal.sections.container.details_uns')
    @include('export.oceans.cargo_loader.partials.modal.sections.container.warehouse_details.warehouse_modal')
    @include('export.oceans.cargo_loader.partials.modal.sections.container.load_warehouse')
    @include('export.oceans.cargo_loader.partials.modal.createHouse')
    @include('export.oceans.cargo_loader.partials.modal.hbl_cargo')


@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('export.oceans.cargo_loader.partials.scripts.init')
    @include('export.oceans.cargo_loader.partials.scripts.compute')
    @include('export.oceans.cargo_loader.partials.scripts.autocomplete')
    @include('export.oceans.cargo_loader.partials.scripts.tables')
    @include('export.oceans.cargo_loader.partials.scripts.validation')

@stop
