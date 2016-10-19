@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'export.oceans.bill_of_lading.store', 'method' => 'POST']) !!}
    @include('export.oceans.bill_of_lading.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::close() !!}
@endsection
