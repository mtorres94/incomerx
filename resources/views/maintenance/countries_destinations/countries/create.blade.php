@extends('layouts._tab')

@section('title', 'Create country')
@section('table-title', 'Create new country')

@section('content')
{!! Form::open(['id'=> 'data', 'route' => 'maintenance.countries_destinations.countries.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.countries.partials.fields')
{!! Form::bsFooter(2, null) !!}
{!! Form::close() !!}
@endsection
