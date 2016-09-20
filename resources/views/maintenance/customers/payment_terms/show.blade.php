@extends('layouts._tab')

@section('title', 'Show payment term')
@section('table-title', 'Show payment term')

@section('content')
{!! Form::model($payment_term, ['route' => 'maintenance.customers.payment_terms.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.payment_terms.partials.fields')
{!! Form::close() !!}
@endsection
