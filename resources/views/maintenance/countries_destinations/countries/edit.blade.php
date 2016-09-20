@extends('layouts._tab')

@section('title', 'Edit country')
@section('table-title', 'Edit country')

@section('content')
{!! Form::model($country, ['route' => ['maintenance.countries_destinations.countries.update', $country], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.countries.partials.fields', $country)
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
