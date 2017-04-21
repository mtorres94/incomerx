@extends('layouts._tab')

@section('content')
    {!! Form::model($booking_entries, ['id' => 'data', 'route' => ['export.air.booking_entries.update', $booking_entries], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
              ['class' => 'fa fa-file-pdf-o', 'value' => 'Manifest No Barcode'],
              ['class' => 'fa fa-file-pdf-o', 'value' => 'Manifest (Barcodes)'],
              ['class' => 'fa fa-file-pdf-o', 'value' => 'Short'],
              ['class' => 'fa fa-file-pdf-o', 'value' => 'Short2'],
              ['class' => 'fa fa-file-pdf-o', 'value' => 'Manifest'],
          ], $booking_entries, 'ea_booking_entries.report') !!}
    {!! Form::bsFooter(1, $booking_entries) !!}
    @include('export.air.booking_entries.partials.fields')
    {!! Form::bsFooter(2, $booking_entries) !!}
    {!! Form::close() !!}
@endsection
