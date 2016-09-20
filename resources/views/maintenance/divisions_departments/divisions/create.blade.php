@extends('layouts._tab')

@section('title', 'Create division')
@section('table-title', 'Create new division')

@section('content')
{!! Form::open(['route' => 'maintenance.divisions_departments.divisions.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.divisions_departments.divisions.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
