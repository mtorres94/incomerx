@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'import.oceans.quotes.store', 'method' => 'POST']) !!}
    @include('import.oceans.quotes.partials.fields')
    {!! Form::bsFooter(2, NULL) !!}
    {!! Form::close() !!}
@endsection
