@extends('layouts._tab')

@section('title', 'Create payment term')
@section('table-title', 'Create new payment term')

@section('content')
{!! Form::open(['id'=> 'data','route' => 'maintenance.customers.payment_terms.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.payment_terms.partials.fields')
{!! Form::bsFooter(2, null) !!}
{!! Form::close() !!}
@endsection
