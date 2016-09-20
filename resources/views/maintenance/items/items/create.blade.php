@extends('layouts._tab')

@section('title', 'Create item')
@section('table-title', 'Create new item')

@section('content')
{!! Form::open(['route' => 'maintenance.items.items.store', 'method' => 'POST']) !!}
    @include('maintenance.items.items.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
