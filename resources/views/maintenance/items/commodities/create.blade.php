@extends('layouts._tab')

@section('title', 'Create commodity')
@section('table-title', 'Create new commodity')

@section('content')
{!! Form::open(['route' => 'maintenance.items.commodities.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.commodities.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
