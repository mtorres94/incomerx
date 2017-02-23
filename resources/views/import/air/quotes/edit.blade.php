@extends('layouts._tab')

@section('content')
    {!! Form::bsGroup([
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Quotation', 'index' => 1],
      ], $quotes, 'ia_quote.get_pdf') !!}
    {!! Form::model($quotes, ['id' => 'data', 'route' => ['import.air.quotes.update', $quotes], 'method' => 'PUT']) !!}
    {!! Form::bsFooter(1, $quotes) !!}
    @include('import.air.quotes.partials.fields')
    {!! Form::bsFooter(2, $quotes) !!}
    {!! Form::close() !!}
@endsection
