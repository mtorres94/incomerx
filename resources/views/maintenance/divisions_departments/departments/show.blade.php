@extends('layouts._tab')

@section('title', 'Show department')
@section('table-title', 'Show department')

@section('content')
{!! Form::model($department, ['route' => 'maintenance.divisions_departments.departments.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.divisions_departments.departments.partials.fields')
{!! Form::close() !!}
@endsection
