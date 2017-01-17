@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'import.oceans.quotes.store', 'method' => 'POST']) !!}
    @include('import.oceans.quotes.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($quotes) ? $quotes->id : 0) !!}
    {!! Form::close() !!}
@endsection