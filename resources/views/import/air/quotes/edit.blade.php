@extends('layouts._tab')

@section('content')
    {!! Form::model($quotes, ['id' => 'data', 'route' => ['import.air.quotes.update', $quotes], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Quotation'],
      ], $quotes, 'ia_quotes.report') !!}
    {!! Form::bsFooter(1, $quotes) !!}
    @include('import.air.quotes.partials.fields')
    {!! Form::bsFooter(2, $quotes) !!}
    {!! Form::close() !!}
@endsection
