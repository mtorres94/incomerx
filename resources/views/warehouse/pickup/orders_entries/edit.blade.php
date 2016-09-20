@extends('layouts._tab')

@section('content')
    {!! Form::model($order_entry, ['id' => 'data', 'route' => ['warehouse.pickup.orders_entries.update', $order_entry], 'method' => 'PUT']) !!}
    @include('warehouse.pickup.orders_entries.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::close() !!}
@endsection
