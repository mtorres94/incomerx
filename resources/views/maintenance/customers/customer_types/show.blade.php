@extends('layouts._tab')

@section('title', 'Show customer type')
@section('table-title', 'Show customer type')

@section('content')
{!! Form::model($customer_type, ['class' => 'form-horizontal']) !!}
    @include('maintenance.customers.customer_types.partials.fields')
{!! Form::close() !!}
@endsection
