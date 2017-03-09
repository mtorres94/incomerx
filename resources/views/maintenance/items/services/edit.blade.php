@extends('layouts._tab')

@section('title', 'Edit unit')
@section('table-title', 'Edit unit')

@section('content')
{!! Form::model($service, ['id'=> 'data', 'route' => ['maintenance.items.services.update', $service], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.services.partials.fields')
{!! Form::bsFooter(2, $service) !!}
{!! Form::close() !!}
@endsection
