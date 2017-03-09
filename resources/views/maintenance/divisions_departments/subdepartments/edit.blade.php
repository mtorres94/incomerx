@extends('layouts._tab')

@section('title', 'Edit subdepartment')
@section('table-title', 'Edit subdepartment')

@section('content')
{!! Form::model($subdepartment, ['id'=> 'data', 'route' => ['maintenance.divisions_departments.subdepartments.update', $subdepartment], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.divisions_departments.subdepartments.partials.fields')
{!! Form::bsFooter(2, $subdepartment) !!}
{!! Form::close() !!}
@endsection
