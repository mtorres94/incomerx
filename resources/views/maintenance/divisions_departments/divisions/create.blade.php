@extends('layouts._tab')

@section('title', 'Create division')
@section('table-title', 'Create new division')

@section('content')
{!! Form::open(['id'=>'data','route' => 'maintenance.divisions_departments.divisions.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.divisions_departments.divisions.partials.fields')
{!! Form::bsFooter(2, null) !!}
{!! Form::close() !!}
@endsection
