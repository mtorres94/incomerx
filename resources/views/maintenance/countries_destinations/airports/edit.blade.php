@extends('layouts._tab')

@section('title', 'Edit airport')
@section('table-title', 'Edit airport')

@section('content')
{!! Form::model($airport, ['route' => ['maintenance.countries_destinations.airports.update', $airport], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.airports.partials.fields', $airport)
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
