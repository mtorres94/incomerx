@extends('layouts._tab')

@section('title', 'Show subdepartment')
@section('table-title', 'Show subdepartment')

@section('content')
{!! Form::model($subdepartment, ['route' => 'maintenance.divisions_departments.subdepartments.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.divisions_departments.subdepartments.partials.fields')
{!! Form::close() !!}
@endsection
