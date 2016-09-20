@extends('layouts._tab')

@section('title', 'Create subdepartment')
@section('table-title', 'Create new subdepartment')

@section('content')
{!! Form::open(['route' => 'maintenance.divisions_departments.subdepartments.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.divisions_departments.subdepartments.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
