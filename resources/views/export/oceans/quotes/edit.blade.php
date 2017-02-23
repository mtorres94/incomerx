@extends('layouts._tab')

@section('content')
    {!! Form::model($quotes, ['id' => 'data', 'route' => ['export.oceans.quotes.update', $quotes], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
          ['class' => 'fa fa-file-pdf-o', 'value' => 'QUOTATION', 'route' => 'eo_quotes.pdf'],
      ], $quotes) !!}
    @include('export.oceans.quotes.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($quotes) ? $quotes->id : 0) !!}
    {!! Form::close() !!}


@endsection
