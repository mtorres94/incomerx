@extends('layouts._tab')

@section('title', 'Create currency')
@section('table-title', 'Create new currency')

@section('content')
{!! Form::open(['id'=>'data', 'route' => 'maintenance.countries_destinations.currencies.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.currencies.partials.fields')
{!! Form::bsFooter(2, null) !!}
{!! Form::close() !!}
@endsection
