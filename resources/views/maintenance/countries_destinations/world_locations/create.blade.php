@extends('layouts._tab')

@section('title', 'Create world location')
@section('table-title', 'Create new world location')

@section('content')
{!! Form::open(['route' => 'maintenance.countries_destinations.world_locations.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.world_locations.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
