@extends('layouts._tab')

@section('title', 'Edit department')
@section('table-title', 'Edit department')

@section('content')
{!! Form::model($department, ['id'=>'data', 'route' => ['maintenance.divisions_departments.departments.update', $department], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.divisions_departments.departments.partials.fields')
{!! Form::bsFooter(2, $department) !!}
{!! Form::close() !!}
@endsection
