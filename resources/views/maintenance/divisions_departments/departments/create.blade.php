@extends('layouts._tab')

@section('title', 'Create department')
@section('table-title', 'Create new department')

@section('content')
{!! Form::open(['route' => 'maintenance.divisions_departments.departments.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.divisions_departments.departments.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
