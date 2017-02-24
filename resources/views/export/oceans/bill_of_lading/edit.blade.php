@extends('layouts._tab')

@section('content')
    {!! Form::model($bill_of_lading, ['id' => 'data', 'route' => ['export.oceans.bill_of_lading.update', $bill_of_lading], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Original B/L'],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Carrier B/L'],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Dock Receipt B/L'],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Non Negotiable B/L'],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Non Negotiable Freight Only B/L'],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Original Freight Only B/L'],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Original Non Rated B/L'],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Delivery Order'],
          ['class' => 'fa fa-barcode', 'value' => 'Label'],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Manifest'],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Pre Alert'],

      ], $bill_of_lading, 'bill_of_lading.report') !!}
    {!! Form::bsFooter(1, $bill_of_lading) !!}
    @include('export.oceans.bill_of_lading.partials.fields')
    {!! Form::bsFooter(2, $bill_of_lading) !!}
    {!! Form::close() !!}
@endsection
