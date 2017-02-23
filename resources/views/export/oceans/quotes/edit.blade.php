@extends('layouts._tab')

@section('content')
    {!! Form::model($quotes, ['id' => 'data', 'route' => ['export.oceans.quotes.update', $quotes], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
        ['class' => 'fa fa-file-pdf-o', 'value' => 'Quotation', 'index' => 1],
    ], $quotes, 'eo_quotes.get_pdf') !!}
    {!! Form::bsFooter(1, $quotes) !!}
    @include('export.oceans.quotes.partials.fields')
    {!! Form::bsFooter(2, $quotes) !!}
    {!! Form::close() !!}


@endsection
