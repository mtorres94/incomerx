@extends('layouts._tab')

@section('title', 'Edit division')
@section('table-title', 'Edit division')

@section('content')
{!! Form::model($division, ['id'=>'data','route' => ['maintenance.divisions_departments.divisions.update', $division], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.divisions_departments.divisions.partials.fields', $division)
{!! Form::bsFooter(2, $division) !!}
{!! Form::close() !!}
@endsection
