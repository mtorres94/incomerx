@extends('layouts._tab')

@section('content')
    {!! Form::model($order_entry, ['route' => 'warehouse.pickup.orders_entries.index', 'method' => 'GET']) !!}
    @include('warehouse.pickup.orders_entries.partials.fields', $order_entry)
    {!! Form::close() !!}
@endsection
