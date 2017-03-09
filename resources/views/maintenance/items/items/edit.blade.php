@extends('layouts._tab')

@section('title', 'Edit item')
@section('table-title', 'Edit item')

@section('content')
{!! Form::model($item, ['id'=>'data', 'route' => ['maintenance.items.items.update', $item], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.items.partials.fields')
{!! Form::bsFooter(2, $item) !!}
{!! Form::close() !!}
@endsection
