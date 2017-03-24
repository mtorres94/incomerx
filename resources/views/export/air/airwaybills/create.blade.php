@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'export.air.airwaybills.store', 'method' => 'POST', 'files'=>true]) !!}
    @include('export.air.airwaybills.partials.fields')
    {!! Form::bsFooter(2, null) !!}
    {!! Form::close() !!}
@endsection
