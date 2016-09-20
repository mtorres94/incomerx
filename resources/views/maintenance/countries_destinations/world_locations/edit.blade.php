@extends('layouts._tab')

@section('title', 'Edit world location')
@section('table-title', 'Edit world location')

@section('content')
{!! Form::model($world_location, ['route' => ['maintenance.countries_destinations.world_locations.update', $world_location], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.world_locations.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
