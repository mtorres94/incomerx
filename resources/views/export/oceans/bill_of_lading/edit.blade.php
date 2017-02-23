@extends('layouts._tab')

@section('content')
    {!! Form::model($bill_of_lading, ['id' => 'data', 'route' => ['export.oceans.bill_of_lading.update', $bill_of_lading], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
          ['class' => 'fa fa-file-pdf-o', 'value' => 'B/L', 'index' => 1],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Delivery Order', 'index' => 2],
          ['class' => 'fa fa-barcode', 'value' => 'Label', 'index' => 3],
      ], $bill_of_lading, 'bill_of_lading.get_pdf') !!}
    {!! Form::bsFooter(1, $bill_of_lading) !!}
    @include('export.oceans.bill_of_lading.partials.fields')
    {!! Form::bsFooter(2, $bill_of_lading) !!}
    {!! Form::close() !!}
@endsection
