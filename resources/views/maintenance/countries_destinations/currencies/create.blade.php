@extends('layouts._tab')

@section('title', 'Create currency')
@section('table-title', 'Create new currency')

@section('content')
{!! Form::open(['route' => 'maintenance.countries_destinations.currencies.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.currencies.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
