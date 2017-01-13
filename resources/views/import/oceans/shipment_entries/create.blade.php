@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'import.oceans.shipment_entries.store', 'method' => 'POST']) !!}
    @include('import.oceans.shipment_entries.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($shipment_entry) ? $shipment_entry->id : 0) !!}
    {!! Form::close() !!}
@endsection
