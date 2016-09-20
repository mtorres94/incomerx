@extends('layouts._tab')

@section('title', 'Show scheduled')
@section('table-title', 'Show scheduled')

@section('content')
{!! Form::model($scheduled, ['route' => 'maintenance.countries_destinations.schedule_dks.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.schedule_dks.partials.fields')
{!! Form::close() !!}
@endsection
