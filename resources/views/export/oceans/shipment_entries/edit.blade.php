@extends('layouts._tab')

@section('content')
    {!! Form::model($shipment_entry, ['id' => 'data', 'route' => ['export.oceans.shipment_entries.update', $shipment_entry], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Booking Confirmation', 'index' => 1],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Container Release', 'index' => 2],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'Ocean Manifest', 'index' => 3],
      ], $shipment_entry, 'shipment_entries.get_pdf') !!}
    {!! Form::bsFooter(1, $shipment_entry) !!}
    @include('export.oceans.shipment_entries.partials.fields')
    {!! Form::bsFooter(2, $shipment_entry) !!}
    {!! Form::close() !!}
@endsection
