@extends('layouts._tab')

@section('title', 'Create state')
@section('table-title', 'Create new state')

@section('content')
{!! Form::open(['route' => 'maintenance.countries_destinations.states.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.states.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
