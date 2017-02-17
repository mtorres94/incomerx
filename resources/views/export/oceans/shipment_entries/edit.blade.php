@extends('layouts._tab')

@section('content')
    {!! Form::model($shipment_entry, ['id' => 'data', 'route' => ['export.oceans.shipment_entries.update', $shipment_entry], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
          ['class' => 'fa fa-file-pdf-o', 'value' => 'BOOKING CONFIRMATION', 'route' => 'shipment_entries.pdf'],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'CONTAINER RELEASE', 'route' => 'shipment_entries.container_release'],
          ['class' => 'fa fa-file-pdf-o', 'value' => 'OCEAN MANIFEST', 'route' => 'shipment_entries.manifest'],
      ], $shipment_entry) !!}
    @include('export.oceans.shipment_entries.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($shipment_entry) ? $shipment_entry->id : 0) !!}
    {!! Form::close() !!}
@endsection
