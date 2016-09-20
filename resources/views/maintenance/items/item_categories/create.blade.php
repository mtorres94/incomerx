@extends('layouts._tab')

@section('title', 'Create item category')
@section('table-title', 'Create new item category')

@section('content')
{!! Form::open(['route' => 'maintenance.items.item_categories.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.item_categories.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
