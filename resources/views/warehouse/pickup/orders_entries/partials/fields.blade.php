<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', ($user_open_id == Auth::user()->id ? "0" : "1"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
@include('warehouse.pickup.orders_entries.partials.sections.general_info')

<div class="row">
    <div class="col-md-6">
        @include('warehouse.pickup.orders_entries.partials.sections.tabs_delivery')
        @include('warehouse.pickup.orders_entries.partials.sections.third')
        @include('warehouse.pickup.orders_entries.partials.sections.tabs_pickup')
    </div>
    <div class="col-md-6">
        @include('warehouse.pickup.orders_entries.partials.sections.tabs')
        @include('warehouse.pickup.orders_entries.partials.sections.tabs_additional_info')
        @include('warehouse.pickup.orders_entries.partials.sections.tabs_carriers')
        @include('warehouse.pickup.orders_entries.partials.sections.references')
    </div>
</div>
<div class="row">
    <div class="col-md-12 form-tab">
        {!! Form::bsMemo(null, null, 'Instructions', 'reference_instruction', null, 3, '') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        @include('warehouse.pickup.orders_entries.partials.sections.tabs_more_details')
        @include('warehouse.pickup.orders_entries.partials.sections.tabs_charges')
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsMemo(null, null, 'Comments', 'pickup_comment', null, 5) !!}
    </div>
</div>

<!-- Modal forms section -->
@section('modals')
    @include('warehouse.pickup.orders_entries.partials.modal.po-number')
    @include('warehouse.pickup.orders_entries.partials.modal.pro-number')
    @include('warehouse.pickup.orders_entries.partials.modal.so-number')
    @include('warehouse.pickup.orders_entries.partials.modal.stops')
    @include('warehouse.pickup.orders_entries.partials.modal.hazardous')
    @include('warehouse.pickup.orders_entries.partials.modal.cargo')
    @include('warehouse.pickup.orders_entries.partials.modal.container_details')
    @include('warehouse.pickup.orders_entries.partials.modal.sections.cargo.item_modal')
    @include('warehouse.pickup.orders_entries.partials.modal.dr_details')
    @include('warehouse.pickup.orders_entries.partials.modal.charge_details')
    @include('warehouse.pickup.orders_entries.partials.modal.transportation_details')
    @include('warehouse.pickup.orders_entries.partials.modal.vehicle')
    @include('warehouse.pickup.orders_entries.partials.modal.pick_cargo')


@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('warehouse.pickup.orders_entries.partials.scripts.init')
    @include('warehouse.pickup.orders_entries.partials.scripts.compute')
    @include('warehouse.pickup.orders_entries.partials.scripts.autocomplete')
    @include('warehouse.pickup.orders_entries.partials.scripts.tables')

@stop
