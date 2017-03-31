@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'maintenance.accounting.billing_codes.store', 'method' => 'POST', 'files'=>true]) !!}
    @include('maintenance.accounting.billing_codes.partials.fields')
    {!! Form::bsFooter(2, null) !!}
    {!! Form::close() !!}
@endsection
