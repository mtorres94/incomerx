@extends('layouts._tab')

@section('title', 'Show state')
@section('table-title', 'Show state')

@section('content')
{!! Form::model($state, ['route' => 'maintenance.countries_destinations.states.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.states.partials.fields')
{!! Form::close() !!}
@endsection
