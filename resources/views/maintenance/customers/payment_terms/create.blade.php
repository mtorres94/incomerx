@extends('layouts._tab')

@section('title', 'Create payment term')
@section('table-title', 'Create new payment term')

@section('content')
{!! Form::open(['route' => 'maintenance.customers.payment_terms.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.payment_terms.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
