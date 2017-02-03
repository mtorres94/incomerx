<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
@include('import.oceans.bill_of_lading.partials.sections.general')

<div class="row">
    @include('import.oceans.bill_of_lading.partials.sections.shipment_details')
</div>
<div class="row">
    @include('import.oceans.bill_of_lading.partials.sections.tabs_details')
</div>
<div class="row">
    @include('import.oceans.bill_of_lading.partials.sections.details_bl')
</div>
<div class="row">
    <div class="col-md-12">
        @include('import.oceans.bill_of_lading.partials.sections.tabs_cargo_container')
    </div>
</div>
<div class="row">
    <div class="col-md-12">
            @include('import.oceans.bill_of_lading.partials.sections.tabs_charges')
    </div>
</div>
<div class="row">
    <div class="col-md-10">
        {!! Form::bsMemo(null, null,'Comments', 'bill_comments', null, 3, '') !!}
    </div>
    <div class="col-md-2">
        {!! Form::bsSelect(null, null, ' Status', 'bill_status', array('O' => 'ORIGINAL B/L REQUIRED','E' => 'EXPRESS RELEASE','RD' => 'OBL RECEIVED DATE'), '') !!}
    </div>
</div>
<!-- Modal forms section -->
@section('modals')
    @include('import.oceans.bill_of_lading.partials.modal.cargo_details')
    @include('import.oceans.bill_of_lading.partials.modal.container_details')
    @include('import.oceans.bill_of_lading.partials.modal.transportation')
    @include('import.oceans.bill_of_lading.partials.modal.destination_charges')
    @include('import.oceans.bill_of_lading.partials.modal.origin_charges')
    @include('import.oceans.bill_of_lading.partials.modal.sections.cargo.box_details')
    @include('import.oceans.bill_of_lading.partials.modal.load_pickup')

@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('import.oceans.bill_of_lading.partials.scripts.init')
    @include('import.oceans.bill_of_lading.partials.scripts.compute')
    @include('import.oceans.bill_of_lading.partials.scripts.autocomplete')
    @include('import.oceans.bill_of_lading.partials.scripts.tables')
    @include('import.oceans.bill_of_lading.partials.scripts.validation')


@stop
