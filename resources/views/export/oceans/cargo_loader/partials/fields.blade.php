<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}

    <div class="pull-right">
        @if(isset($cargo_loader))
            <button type="button" class="btn btn-primary btn-sm" id="btn_create_hbl" ><span>Create Houses</span></button>
            <button type="button" class="btn btn-primary btn-sm"  onclick="clearTableCondition('booking_details')" id="btn_booking" ><span>Select Booking</span></button>
        @endif
    </div>

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


</div>


<!-- Modal forms section -->
@section('modals')
    @include('export.oceans.cargo_loader.partials.modal.container_details')
    @include('export.oceans.cargo_loader.partials.modal.sections.container.warehouse_receipts')
    @include('export.oceans.cargo_loader.partials.modal.sections.container.details_uns')
    @include('export.oceans.cargo_loader.partials.modal.sections.container.warehouse_details.warehouse_modal')
    @include('export.oceans.cargo_loader.partials.modal.sections.container.load_warehouse')
    @include('export.oceans.cargo_loader.partials.modal.createHouse')
    @include('export.oceans.cargo_loader.partials.modal.hbl_cargo')
    @include('export.oceans.cargo_loader.partials.modal.booking')


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
