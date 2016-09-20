@extends('layouts._tab')

@section('title', 'Create business type')
@section('table-title', 'Create new business type')

@section('content')
{!! Form::open(['route' => 'maintenance.customers.business_types.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.business_types.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
