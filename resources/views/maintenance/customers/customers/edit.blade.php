@extends('layouts._tab')

@section('title', 'Edit customer')
@section('table-title', 'Edit customer')

@section('content')
{!! Form::model($customer, ['route' => ['maintenance.customers.customers.update', $customer], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.customers.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
