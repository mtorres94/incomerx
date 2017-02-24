@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'import.air.bill_of_lading.store', 'method' => 'POST']) !!}
    @include('import.air.bill_of_lading.partials.fields')
    {!! Form::bsFooter(2, null) !!}
    {!! Form::close() !!}
@endsection
