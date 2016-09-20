@extends('layouts._tab')

@section('title', 'Show country')
@section('table-title', 'Show country')

@section('content')
{!! Form::model($country, ['route' => 'maintenance.countries_destinations.countries.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.countries.partials.fields')
{!! Form::close() !!}
@endsection
