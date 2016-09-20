@extends('layouts._tab')

@section('title', 'Edit commodity')
@section('table-title', 'Edit commodity')

@section('content')
{!! Form::model($commodity, ['route' => ['maintenance.items.commodities.update', $commodity], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.commodities.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
