@extends('layouts._tab')

@section('title', 'Create item')
@section('table-title', 'Create new item')

@section('content')
{!! Form::open(['id'=>'data','route' => 'maintenance.items.items.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.items.partials.fields')
{!! Form::bsFooter(2, null) !!}
{!! Form::close() !!}
@endsection
