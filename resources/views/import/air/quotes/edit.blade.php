@extends('layouts._tab')

@section('content')
    {!! Form::bsGroup([
          ['class' => 'fa fa-file-pdf-o', 'value' => 'QUOTATION', 'route' => 'ia_quotes.pdf'],
      ], $quotes) !!}
    {!! Form::model($quotes, ['id' => 'data', 'route' => ['import.air.quotes.update', $quotes], 'method' => 'PUT']) !!}

    @include('import.air.quotes.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($quotes) ? $quotes->id : 0) !!}
    {!! Form::close() !!}
@endsection
