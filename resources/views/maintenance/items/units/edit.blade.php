@extends('layouts._tab')

@section('title', 'Edit unit')
@section('table-title', 'Edit unit')

@section('content')
{!! Form::model($unit, ['id'=>'data', 'route' => ['maintenance.items.units.update', $unit], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.units.partials.fields')
{!! Form::bsFooter(2, $unit) !!}
{!! Form::close() !!}
@endsection
