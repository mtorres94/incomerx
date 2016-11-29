@extends('layouts._tab')

@section('content')
    {!! Form::model($quotes, ['id' => 'data', 'route' => ['export.oceans.quotes.update', $quotes], 'method' => 'PUT']) !!}

    @include('export.oceans.quotes.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::close() !!}
@endsection
