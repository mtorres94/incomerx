@extends('layouts._tab')

@section('title', 'Edit airport')
@section('table-title', 'Edit airport')

@section('content')
{!! Form::model($airport, ['id'=>'data','route' => ['maintenance.countries_destinations.airports.update', $airport], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.airports.partials.fields', $airport)
{!! Form::bsFooter(2, $airport) !!}
{!! Form::close() !!}
@endsection
