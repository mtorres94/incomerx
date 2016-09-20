@extends('layouts._tab')

@section('title', 'Edit city')
@section('table-title', 'Edit city')

@section('content')
{!! Form::model($city, ['route' => ['maintenance.countries_destinations.cities.update', $city], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.cities.partials.fields', $city)
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
