@extends('layouts._tab')

@section('content')
    {!! Form::model($shipment_entry, ['route' => 'export.oceans.shipment_entries.index', 'method' => 'GET']) !!}
    @include('export.oceans.shipment_entries.partials.fields', $shipment_entry)
    {!! Form::close() !!}
@endsection
