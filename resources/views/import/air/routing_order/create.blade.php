@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'import.air.routing_order.store', 'method' => 'POST']) !!}
    @include('import.air.routing_order.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($routing_order) ? $routing_order->id : 0) !!}
    {!! Form::close() !!}
@endsection
