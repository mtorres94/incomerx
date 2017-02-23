@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'export.oceans.bill_of_lading.store', 'method' => 'POST', 'files'=>true]) !!}
    @include('export.oceans.bill_of_lading.partials.fields')
    {!! Form::bsFooter(2, null) !!}
    {!! Form::close() !!}
@endsection
