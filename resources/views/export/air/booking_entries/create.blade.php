@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'export.air.booking_entries.store', 'method' => 'POST', 'files'=>true]) !!}
    @include('export.air.booking_entries.partials.fields')
    {!! Form::bsFooter(2, null) !!}
    {!! Form::close() !!}
@endsection
