@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'export.oceans.quotes.store', 'method' => 'POST']) !!}
    @include('export.oceans.quotes.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::close() !!}
@endsection
