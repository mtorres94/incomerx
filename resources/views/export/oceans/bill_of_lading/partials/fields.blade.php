<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}

    <div class="col-md-12">
        @include('export.oceans.bill_of_lading.partials.sections.general_info')
    </div>

<div class="row">
    <div class="col-md-6">@include('export.oceans.bill_of_lading.partials.sections.shipment_details')</div>
    <div class="col-md-6">@include('export.oceans.bill_of_lading.partials.sections.port_loading')</div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="easyui-tabs" id="bill_of_lading_tabs">
            <!--- Shipper / Consignee  -->
            <div title="Shipper / Consignee">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            <div class="col-md-6">@include('export.oceans.bill_of_lading.partials.sections.shipper')</div>
                            <div class="col-md-6">@include('export.oceans.bill_of_lading.partials.sections.consignee')</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--- Agent / Document  -->
            <div title="Agent / Document">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            <div class="col-md-6">@include('export.oceans.bill_of_lading.partials.sections.agent')</div>
                            <div class="col-md-6">@include('export.oceans.bill_of_lading.partials.sections.document')</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--- Agent / Document  -->
            <div title="Notify / Third Party">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            <div class="col-md-6">@include('export.oceans.bill_of_lading.partials.sections.additional_information.notify')</div>
                            <div class="col-md-6">@include('export.oceans.bill_of_lading.partials.sections.additional_information.third_party')</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--- Agent / Document  -->
            <div title="Instructions">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            <div class="col-md-6">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Instructions', 'add_info_comments', null, 4, '') !!}</div>
                            <div class="col-md-6">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Domestic Routing/ Export Instructions', 'domestic_instruction', null, 4, ' ') !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        @include('export.oceans.bill_of_lading.partials.sections.details_of_loading')
        @include('export.oceans.bill_of_lading.partials.sections.tabs_cargo')
        @include('export.oceans.bill_of_lading.partials.sections.tabs_charges')
    </div>
    <div class="col-md-12">
        {!! Form::bsMemo(null,null, 'Letter of Credit Comments', 'letter_comments', null, 3, null) !!}
        {!! Form::bsMemo(null,null, 'Comments', 'comments_comment', null, 3, null) !!}
    </div>
</div>


<!-- Modal forms section -->
@section('modals')
    @include('export.oceans.bill_of_lading.partials.modal.PRO-Numbers')
    @include('export.oceans.bill_of_lading.partials.modal.createHouse')
    @include('export.oceans.bill_of_lading.partials.modal.charge_details')
    @include('export.oceans.bill_of_lading.partials.modal.transportation_details')
    @include('export.oceans.bill_of_lading.partials.modal.container_details')
    @include('export.oceans.bill_of_lading.partials.modal.sections.container.details_uns')
    @include('export.oceans.bill_of_lading.partials.modal.customer_reference')
    @include('export.oceans.bill_of_lading.partials.modal.cargo_detail')
    @include('export.oceans.bill_of_lading.partials.modal.sections.cargo_details.box_details')
    @include('export.oceans.bill_of_lading.partials.modal.sections.cargo_details.vehicle_details')
    @include('export.oceans.bill_of_lading.partials.modal.items_details')

@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('export.oceans.bill_of_lading.partials.scripts.init')
    @include('export.oceans.bill_of_lading.partials.scripts.compute')
    @include('export.oceans.bill_of_lading.partials.scripts.autocomplete')
    @include('export.oceans.bill_of_lading.partials.scripts.tables')
    @include('export.oceans.bill_of_lading.partials.scripts.validation')

@stop
