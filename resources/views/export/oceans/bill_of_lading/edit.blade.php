@extends('layouts._tab')

@section('content')
    {!! Form::model($bill_of_lading, ['id' => 'data', 'route' => ['export.oceans.bill_of_lading.update', $bill_of_lading], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
          ['class' => 'fa fa-file-pdf-o', 'value' => 'B/L', 'route' => 'bill_of_lading.pdf'],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Delivery Order', 'route' => 'bill_of_lading.delivery_order'],
          ['class' => 'fa fa-barcode', 'value' => 'Label', 'route' => 'bill_of_lading.label'],
      ], $bill_of_lading) !!}
    {!! Form::bsSelect(null, null, 'Print B/L as', 'type', array( '1' => 'ORIGINAL', '2' => 'CARRIER'), null, 'body') !!}
    @include('export.oceans.bill_of_lading.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($bill_of_lading) ? $bill_of_lading->id : 0) !!}
    {!! Form::close() !!}
@endsection
