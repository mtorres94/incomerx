@extends('layouts._tab')

@section('title', 'Create country')
@section('table-title', 'Create new country')

@section('content')
{!! Form::open(['route' => 'maintenance.countries_destinations.countries.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.countries.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
