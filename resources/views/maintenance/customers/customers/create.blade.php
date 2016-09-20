@extends('layouts._tab')

@section('title', 'Create customer')
@section('table-title', 'Create new customer')

@section('content')
{!! Form::open(['route' => 'maintenance.customers.customers.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.customers.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
