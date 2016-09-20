@extends('layouts._tab')

@section('title', 'Create airport')
@section('table-title', 'Create new airport')

@section('content')
{!! Form::open(['route' => 'maintenance.countries_destinations.airports.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.airports.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
