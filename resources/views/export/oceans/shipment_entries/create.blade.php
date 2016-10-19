@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'export.oceans.shipment_entries.store', 'method' => 'POST']) !!}
    @include('export.oceans.shipment_entries.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::close() !!}
@endsection
