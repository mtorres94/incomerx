@extends('layouts._tab')

@section('title', 'Show identification type')
@section('table-title', 'Show identification type')

@section('content')
{!! Form::model($identification_type, ['route' => 'maintenance.customers.identification_types.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.identification_types.partials.fields')
{!! Form::close() !!}
@endsection
