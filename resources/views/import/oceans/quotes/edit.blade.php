@extends('layouts._tab')

@section('content')
    {!! Form::bsGroup([
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Quotation', 'index' => 1],
      ], $quotes, 'io_quotes.get_pdf') !!}
    {!! Form::model($quotes, ['id' => 'data', 'route' => ['import.oceans.quotes.update', $quotes], 'method' => 'PUT']) !!}
    {!! Form::bsFooter(1, $quotes) !!}
    @include('import.oceans.quotes.partials.fields')
    {!! Form::bsFooter(2, $quotes) !!}
    {!! Form::close() !!}
@endsection
