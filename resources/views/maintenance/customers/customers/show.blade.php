@extends('layouts._tab')

@section('title', 'Show customer')
@section('table-title', 'Show customer')

@section('content')
{!! Form::model($customer, ['route' => 'maintenance.customers.customers.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.customers.partials.fields')
{!! Form::close() !!}
@endsection
