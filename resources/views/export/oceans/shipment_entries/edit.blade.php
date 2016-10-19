@extends('layouts._tab')

@section('content')
    {!! Form::model($shipment_entry, ['id' => 'data', 'route' => ['export.oceans.shipment_entries.update', $shipment_entry], 'method' => 'PUT']) !!}
    @include('export.oceans.shipment_entries.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::close() !!}
@endsection
