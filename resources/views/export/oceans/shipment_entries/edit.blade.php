@extends('layouts._tab')

@section('content')
    {!! Form::model($shipment_entry, ['id' => 'data', 'route' => ['export.oceans.shipment_entries.update', $shipment_entry], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Booking Confirmation'],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Container Release'],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Ocean Manifest'],

      ], $shipment_entry, 'shipment_entries.report') !!}
    {!! Form::bsFooter(1, $shipment_entry) !!}
    @include('export.oceans.shipment_entries.partials.fields')
    {!! Form::bsFooter(2, $shipment_entry) !!}
    {!! Form::close() !!}
@endsection
