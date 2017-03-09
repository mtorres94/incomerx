@extends('layouts._tab')

@section('title', 'Create city')
@section('table-title', 'Create new city')

@section('content')
{!! Form::open(['id'=>'data', 'route' => 'maintenance.countries_destinations.cities.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.cities.partials.fields')
{!! Form::bsFooter(2, null) !!}
{!! Form::close() !!}
@endsection
