@extends('layouts._tab')

@section('title', 'Create unit')
@section('table-title', 'Create new unit')

@section('content')
{!! Form::open(['route' => 'maintenance.items.units.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.units.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
