@extends('layouts._tab')

@section('title', 'Show world location')
@section('table-title', 'Show world location')

@section('content')
{!! Form::model($world_location, ['route' => 'maintenance.countries_destinations.world_locations.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.world_locations.partials.fields')
{!! Form::close() !!}
@endsection
