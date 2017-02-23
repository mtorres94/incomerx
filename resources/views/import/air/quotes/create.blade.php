@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'import.air.quotes.store', 'method' => 'POST']) !!}
    @include('import.air.quotes.partials.fields')
    {!! Form::bsFooter(2, null) !!}
    {!! Form::close() !!}
@endsection
