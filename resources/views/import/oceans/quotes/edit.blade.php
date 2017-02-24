@extends('layouts._tab')

@section('content')
    {!! Form::model($quotes, ['id' => 'data', 'route' => ['import.oceans.quotes.update', $quotes], 'method' => 'PUT']) !!}
        {!! Form::bsGroup([
              ['class' => 'fa fa-file-pdf-o', 'value' => 'Quotation'],
          ], $quotes, 'io_quotes.report') !!}
        {!! Form::bsFooter(1, $quotes) !!}
        @include('import.oceans.quotes.partials.fields')
        {!! Form::bsFooter(2, $quotes) !!}
    {!! Form::close() !!}
@endsection
