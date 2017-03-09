@extends('layouts._tab')

@section('content')
{!! Form::model($customer, ['route' => ['maintenance.customers.customers.update', $customer], 'id' => 'data', 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    {!! Form::bsFooter(1, $customer) !!}
    @include('maintenance.customers.customers.partials.fields')
    {!! Form::bsFooter(2, $customer) !!}
{!! Form::close() !!}
@endsection
