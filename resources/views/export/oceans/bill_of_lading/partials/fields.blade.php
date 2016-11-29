<div id="errorBlock" class="help-block"></div>

@include('export.oceans.bill_of_lading.partials.sections.general_info')
<div class="row">
    <div class="col-md-6">
        @include('export.oceans.bill_of_lading.partials.sections.shipment_details')
        @include('export.oceans.bill_of_lading.partials.sections.shipper')
        @include('export.oceans.bill_of_lading.partials.sections.consignee')
        @include('export.oceans.bill_of_lading.partials.sections.tabs_additional_info')

    </div>
    <div class="col-md-6">
        @include('export.oceans.bill_of_lading.partials.sections.port_loading')
        @include('export.oceans.bill_of_lading.partials.sections.agent')


    </div>
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

@stop
