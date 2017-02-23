@extends('layouts._tab')

@section('content')
    {!! Form::bsGroup([
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Routing Order', 'index' => 1],
      ], $routing_order, 'io_routing_order.get_pdf') !!}
    {!! Form::model($routing_order, ['id' => 'data', 'route' => ['import.oceans.routing_order.update', $routing_order], 'method' => 'PUT']) !!}
    {!! Form::bsFooter(1, $routing_order) !!}
    @include('import.oceans.routing_order.partials.fields')
    {!! Form::bsFooter(2, $routing_order) !!}
    {!! Form::close() !!}
@endsection
