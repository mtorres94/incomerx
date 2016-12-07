@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'warehouse.pickup.orders_entries.store', 'method' => 'POST']) !!}
    @include('warehouse.pickup.orders_entries.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($order_entry) ? $order_entry->id : 0) !!}
    {!! Form::close() !!}
@endsection
