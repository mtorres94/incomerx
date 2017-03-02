@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'warehouse.pickup.orders_entries.store', 'method' => 'POST']) !!}
    @include('warehouse.pickup.orders_entries.partials.fields')
    <div class="row">
        <div class="col-md-6">{!! Form::bsCheck('col-md-1', 'col-md-5','Create Warehouse Receipt', 'create_warehouse_receipt') !!}</div>
    </div>
    {!! Form::bsFooter(2, null) !!}
    {!! Form::close() !!}
@endsection
