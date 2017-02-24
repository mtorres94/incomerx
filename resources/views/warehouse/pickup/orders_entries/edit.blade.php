@extends('layouts._tab')

@section('content')
    {!! Form::model($order_entry, ['id' => 'data', 'route' => ['warehouse.pickup.orders_entries.update', $order_entry], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
       ['class' => 'fa fa-file-pdf-o', 'value' => 'Pick Up'],
   ], $order_entry, 'orders_entries.report') !!}
    {!! Form::bsFooter(1, null) !!}
    @include('warehouse.pickup.orders_entries.partials.fields')
    {!! Form::bsFooter(2, null) !!}
    {!! Form::close() !!}
@endsection
