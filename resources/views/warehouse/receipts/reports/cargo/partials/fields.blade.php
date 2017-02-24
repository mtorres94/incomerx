<div class="">
    <div class="row">
        <div class="col-md-4">
            {!! Form::bsComplete(null, null, 'Shipper', 'shipper_id', 'shipper_name', Request::get('term'), null, 'Customers...') !!}
        </div>
        <div class="col-md-4">
            {!! Form::bsComplete(null, null, 'Consignee', 'consignee_id', 'consignee_name', Request::get('term'), null, 'Customers...') !!}
        </div>
        <div class="col-md-4">
            {!! Form::bsComplete(null, null, 'Third Party', 'third_party_id', 'third_party_name', Request::get('term'), null, 'Customers...') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {!! Form::bsComplete(null, null, 'Agent', 'agent_id', 'agent_name', Request::get('term'), null, 'Customers...') !!}
        </div>
        <div class="col-md-4">
            {!! Form::bsSelect(null, null, 'Mode', 'mode', array(
                'A' => 'AIR',
                'O' => 'OCEAN',
                'W' => 'WAREHOUSE',
                'R' => 'TRUCK',
                'T' => 'TBA'), 'Mode...') !!}
        </div>
        <div class="col-md-4">
            {!! Form::bsSelect(null, null, 'Hold status', 'hold_status', array(
                'I' => 'INCLUDE HOLD',
                'E' => 'EXCLUDE HOLD',
                'O' => 'ONLY HOLD'), null) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {!! Form::bsComplete(null, null, 'Origin', 'location_origin_id', 'location_origin_name', Request::get('term'), null, 'Airports...') !!}
        </div>
        <div class="col-md-4">
            {!! Form::bsComplete(null, null, 'Destination', 'location_destination_id', 'location_destination_name', Request::get('term'), null, 'Airports...') !!}
        </div>
        <div class="col-md-4">
            {!! Form::bsComplete(null, null, 'Dest. Country', 'location_country_id', 'location_country_name', Request::get('term'), null, 'Countries...') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {!! Form::bsComplete(null, null, 'Service', 'location_service_id', 'location_service_name', Request::get('term'), null, 'Services...') !!}
        </div>
        <div class="col-md-4">
            {!! Form::bsDate(null, null, 'Date From', 'date_from', null, null) !!}
        </div>
        <div class="col-md-4">
            {!! Form::bsDate(null, null, 'Date To', 'date_to', null, null) !!}
        </div>
    </div>
</div>

<!-- Scripts sections -->
@section('scripts')
    {{--@include('warehouse.receipts.receipts_entries.partials.scripts.init')--}}
    @include('warehouse.receipts.reports.cargo.partials.scripts.autocomplete')
@stop