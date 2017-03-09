@extends('layouts._tab')

@section('title', 'Create state')
@section('table-title', 'Create new state')

@section('content')
{!! Form::open(['id'=>'data', 'route' => 'maintenance.countries_destinations.states.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.states.partials.fields')
{!! Form::bsFooter(2, null) !!}
{!! Form::close() !!}
@endsection
