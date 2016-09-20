@extends('layouts._tab')

@section('title', 'Create identification type')
@section('table-title', 'Create new identification type')

@section('content')
{!! Form::open(['route' => 'maintenance.customers.identification_types.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.identification_types.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
