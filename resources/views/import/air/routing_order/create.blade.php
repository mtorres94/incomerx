@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'import.air.routing_order.store', 'method' => 'POST']) !!}
    @include('import.air.routing_order.partials.fields')
    {!! Form::bsFooter(2, $routing_order) !!}
    {!! Form::close() !!}
@endsection
