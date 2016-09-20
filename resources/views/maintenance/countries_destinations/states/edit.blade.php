@extends('layouts._tab')

@section('title', 'Edit state')
@section('table-title', 'Edit state')

@section('content')
{!! Form::model($state, ['route' => ['maintenance.countries_destinations.states.update', $state], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.states.partials.fields', $state)
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
