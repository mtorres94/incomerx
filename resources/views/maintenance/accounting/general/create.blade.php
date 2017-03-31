@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'maintenance.accounting.general.store', 'method' => 'POST', 'files'=>true]) !!}
    @include('maintenance.accounting.general.partials.fields')
    {!! Form::bsFooter(2, null) !!}
    {!! Form::close() !!}
@endsection
