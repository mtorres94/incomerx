@extends('layouts._tab')

@section('title', 'Show item')
@section('table-title', 'Show item')

@section('content')
{!! Form::model($item, ['route' => 'maintenance.items.items.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.items.partials.fields')
{!! Form::close() !!}
@endsection
