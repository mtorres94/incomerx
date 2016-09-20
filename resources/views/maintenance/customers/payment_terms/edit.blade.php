@extends('layouts._tab')

@section('title', 'Edit payment term')
@section('table-title', 'Edit payment term')

@section('content')
{!! Form::model($payment_term, ['route' => ['maintenance.customers.payment_terms.update', $payment_term], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.payment_terms.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
