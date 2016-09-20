@extends('layouts._tab')

@section('title', 'Edit customer type')
@section('table-title', 'Edit customer type')

@section('content')
{!! Form::model($customer_type, ['route' => ['maintenance.customers.customer_types.update', $customer_type], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.customer_types.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
