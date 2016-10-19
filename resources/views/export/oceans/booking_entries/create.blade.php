@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'export.oceans.booking_entries.store', 'method' => 'POST']) !!}
    @include('export.oceans.booking_entries.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::close() !!}
@endsection
