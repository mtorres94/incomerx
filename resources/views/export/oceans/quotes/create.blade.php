@extends('layouts._tab')

@section('content')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($quotes) ? $quotes->id : 0) !!}
    {!! Form::close() !!}
    {!! Form::open(['id' => 'data', 'route' => 'export.oceans.quotes.store', 'method' => 'POST']) !!}
    @include('export.oceans.quotes.partials.fields')

@endsection
