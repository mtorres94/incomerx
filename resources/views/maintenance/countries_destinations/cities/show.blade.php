@extends('layouts._tab')

@section('title', 'Show city')
@section('table-title', 'Show city')

@section('content')
{!! Form::model($city, ['route' => 'maintenance.countries_destinations.cities.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.cities.partials.fields')
{!! Form::close() !!}
@endsection
