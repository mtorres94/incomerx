@extends('layouts._tab')

@section('content')
    {!! Form::model($routing_order, ['id' => 'data', 'route' => ['import.oceans.routing_order.update', $routing_order], 'method' => 'PUT']) !!}
    @include('import.oceans.routing_order.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($routing_order) ? $routing_order->id : 0) !!}
    {!! Form::close() !!}
@endsection
