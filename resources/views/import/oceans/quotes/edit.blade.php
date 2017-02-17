@extends('layouts._tab')

@section('content')
    {!! Form::bsGroup([
          ['class' => 'fa fa-file-pdf-o', 'value' => 'QUOTATION', 'route' => 'io_quotes.pdf'],
      ], $quotes) !!}
    {!! Form::model($quotes, ['id' => 'data', 'route' => ['import.oceans.quotes.update', $quotes], 'method' => 'PUT']) !!}

    @include('import.oceans.quotes.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($quotes) ? $quotes->id : 0) !!}
    {!! Form::close() !!}
@endsection
