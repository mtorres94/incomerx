@extends('layouts._tab')

@section('title', 'Edit business type')
@section('table-title', 'Edit business type')

@section('content')
{!! Form::model($business_type, ['route' => ['maintenance.customers.business_types.update', $business_type], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.business_types.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
