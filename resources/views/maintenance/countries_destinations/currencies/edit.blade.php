@extends('layouts._tab')

@section('title', 'Edit currency')
@section('table-title', 'Edit currency')

@section('content')
{!! Form::model($currency, ['id'=>'data', 'route' => ['maintenance.countries_destinations.currencies.update', $currency], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.currencies.partials.fields', $currency)
{!! Form::bsFooter(2, $currency) !!}
{!! Form::close() !!}
@endsection
