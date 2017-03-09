@extends('layouts._tab')

@section('title', 'Edit city')
@section('table-title', 'Edit city')

@section('content')
{!! Form::model($city, ['id'=>'data', 'route' => ['maintenance.countries_destinations.cities.update', $city], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.cities.partials.fields', $city)
{!! Form::bsFooter(2, $city) !!}
{!! Form::close() !!}
@endsection
