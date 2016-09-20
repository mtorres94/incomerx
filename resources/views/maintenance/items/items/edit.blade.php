@extends('layouts._tab')

@section('title', 'Edit item')
@section('table-title', 'Edit item')

@section('content')
{!! Form::model($item, ['route' => ['maintenance.items.items.update', $item], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.items.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
