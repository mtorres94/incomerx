@extends('layouts._tab')

@section('title', 'Edit identification type')
@section('table-title', 'Edit identification type')

@section('content')
{!! Form::model($identification_type, ['route' => ['maintenance.customers.identification_types.update', $identification_type], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.identification_types.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
