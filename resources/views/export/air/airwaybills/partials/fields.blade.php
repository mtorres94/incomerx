<div id="errorBlock" class="help-block"></div>
<!--{!! Form::bsFile('Select files', 'file') !!}-->
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
<div class="pull-right">
        <button type="button" class="btn btn-primary btn-sm" id="btn_link_house" ><span>Link Houses</span></button>
</div>

<div class="col-md-12">
    @include('export.air.airwaybills.partials.sections.general')
</div>
<div class="row">
    @include('export.air.airwaybills.partials.sections.agent')
    @include('export.air.airwaybills.partials.sections.airports')
</div>
<div class="row">
    <div class="col-md-12">
        <div class="easyui-tabs" id="bill_of_lading_tabs">
            <!--- Shipper / Consignee  -->
            <div title="Shipper / Consignee">
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div style="padding-top: 10px;padding-bottom: 15px;">
                            <div class="col-md-6">@include('export.air.airwaybills.partials.sections.shipper')</div>
                            <div class="col-md-6">@include('export.air.airwaybills.partials.sections.consignee')</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--- Issued  -->
            <div title="Issued/ Details">
                <div class="col-md-12">
                    <div style="padding-top: 10px;padding-bottom: 15px;">
                        <div class="col-md-12">@include('export.air.airwaybills.partials.sections.issued')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="easyui-tabs" id="cargo_charge">
            <!--- Shipper / Consignee  -->
            <div title="Cargo Details">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    <div class="col-md-6">@include('export.air.airwaybills.partials.sections.cargo_details')</div>
                    <div class="col-md-6"> {!! Form::bsMemo('col-md-3', 'col-md-9', 'Nature and Quantity of Goods', 'cargo_notes', null, ' ') !!}</div>
                </div>
            </div>
            <!--- Issued  -->
            <div title="Charge Details">
                <div class="col-md-12">
                    <div style="padding-top: 10px;padding-bottom: 15px;">
                       @include('export.air.airwaybills.partials.sections.charge_details')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Letter of Credit Comments', 'credit_comments', null, ' ') !!}</div>
    <div class="col-md-6">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Comments', 'airwaybill_comments', null, ' ') !!}</div>
</div>



<!-- Modal forms section -->
@section('modals')
    @include('export.air.airwaybills.partials.modal.cargo_details')
    @include('export.air.airwaybills.partials.modal.charge_details')
    @include('export.air.airwaybills.partials.modal.link_house')

@stop

<!-- Scripts sections -->
@section('scripts')
    <script>


    </script>

    @include('export.air.airwaybills.partials.scripts.init')
    @include('export.air.airwaybills.partials.scripts.compute')
    @include('export.air.airwaybills.partials.scripts.autocomplete')
    @include('export.air.airwaybills.partials.scripts.tables')


@stop
