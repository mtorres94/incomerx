@extends('layouts._tab')

@section('content')
    {!! Form::model($billing, ['id' => 'data', 'route' => ['maintenance.accounting.billing_codes.update', $billing], 'method' => 'PUT']) !!}
    {!! Form::bsFooter(1, $billing) !!}
    @include('maintenance.accounting.billing_codes.partials.fields')
    {!! Form::bsFooter(2, $billing) !!}
    {!! Form::close() !!}
@endsection
