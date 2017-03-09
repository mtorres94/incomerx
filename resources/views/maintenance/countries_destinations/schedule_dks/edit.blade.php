@extends('layouts._tab')

@section('title', 'Edit scheduled')
@section('table-title', 'Edit scheduled')

@section('content')
{!! Form::model($scheduled, ['id'=> 'data', 'route' => ['maintenance.countries_destinations.schedule_dks.update', $scheduled], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.schedule_dks.partials.fields')
{!! Form::bsFooter(2, $scheduled) !!}
{!! Form::close() !!}
@endsection
