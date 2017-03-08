@extends('layouts._tab')

@section('title', 'Edit identification type')
@section('table-title', 'Edit identification type')

@section('content')
{!! Form::model($identification_type, ['id' => 'data', 'route' => ['maintenance.customers.identification_types.update', $identification_type], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.identification_types.partials.fields')
{!! Form::bsFooter(2, $identification_type) !!}
{!! Form::close() !!}
@endsection
