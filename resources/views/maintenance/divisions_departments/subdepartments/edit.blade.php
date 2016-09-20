@extends('layouts._tab')

@section('title', 'Edit subdepartment')
@section('table-title', 'Edit subdepartment')

@section('content')
{!! Form::model($subdepartment, ['route' => ['maintenance.divisions_departments.subdepartments.update', $subdepartment], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.divisions_departments.subdepartments.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
