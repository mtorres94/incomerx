@extends('layouts._tab')

@section('title', 'Edit payment term')
@section('table-title', 'Edit payment term')

@section('content')
{!! Form::model($payment_term, ['id'=> 'data', 'route' => ['maintenance.customers.payment_terms.update', $payment_term], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

    @include('maintenance.customers.payment_terms.partials.fields')
{!! Form::bsFooter(2, $payment_term) !!}
{!! Form::close() !!}
@endsection
