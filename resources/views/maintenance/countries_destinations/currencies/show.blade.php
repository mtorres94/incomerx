@extends('layouts._tab')

@section('title', 'Show currency')
@section('table-title', 'Show currency')

@section('content')
{!! Form::model($currency, ['route' => 'maintenance.countries_destinations.currencies.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.currencies.partials.fields')
{!! Form::close() !!}
@endsection
