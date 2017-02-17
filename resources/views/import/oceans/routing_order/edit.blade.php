@extends('layouts._tab')

@section('content')
    {!! Form::bsGroup([
          ['class' => 'fa fa-file-pdf-o', 'value' => 'ROUTING ORDER', 'route' => 'io_routing_order.pdf'],
      ], $routing_order) !!}
    {!! Form::model($routing_order, ['id' => 'data', 'route' => ['import.oceans.routing_order.update', $routing_order], 'method' => 'PUT']) !!}
    @include('import.oceans.routing_order.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($routing_order) ? $routing_order->id : 0) !!}
    {!! Form::close() !!}
@endsection
