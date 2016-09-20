@extends('layouts._tab')

@section('title', 'Show division')
@section('table-title', 'Show division')

@section('content')
{!! Form::model($division, ['route' => 'maintenance.divisions_departments.divisions.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.divisions_departments.divisions.partials.fields')
{!! Form::close() !!}
@endsection
