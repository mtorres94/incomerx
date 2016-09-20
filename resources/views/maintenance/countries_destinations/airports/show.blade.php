@extends('layouts._tab')

@section('title', 'Show state')
@section('table-title', 'Show state')

@section('content')
{!! Form::model($airport, ['route' => 'maintenance.countries_destinations.airports.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.airports.partials.fields')
{!! Form::close() !!}
@endsection
