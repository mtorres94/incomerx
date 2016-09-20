@extends('layouts._tab')

@section('title', 'Show unit')
@section('table-title', 'Show unit')

@section('content')
{!! Form::model($unit, ['route' => 'maintenance.items.units.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.units.partials.fields')
{!! Form::close() !!}
@endsection
