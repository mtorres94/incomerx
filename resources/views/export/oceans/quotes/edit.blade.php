@extends('layouts._tab')

@section('content')
    {!! Form::model($quotes, ['id' => 'data', 'route' => ['export.oceans.quotes.update', $quotes], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
        ['class' => 'fa fa-file-pdf-o', 'value' => 'Quotation'],
    ], $quotes, 'eo_quotes.report') !!}
    {!! Form::bsFooter(1, $quotes) !!}
    @include('export.oceans.quotes.partials.fields')
    {!! Form::bsFooter(2, $quotes) !!}
    {!! Form::close() !!}


@endsection
