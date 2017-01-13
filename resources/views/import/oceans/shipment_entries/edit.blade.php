@extends('layouts._tab')

@section('content')
    {!! Form::model($shipment_entry, ['id' => 'data', 'route' => ['import.oceans.shipment_entries.update', $shipment_entry], 'method' => 'PUT']) !!}
    @include('import.oceans.shipment_entries.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($shipment_entry) ? $shipment_entry->id : 0) !!}
    {!! Form::close() !!}
@endsection
