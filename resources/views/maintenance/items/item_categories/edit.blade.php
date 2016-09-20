@extends('layouts._tab')

@section('title', 'Edit item category')
@section('table-title', 'Edit item_category')

@section('content')
{!! Form::model($item_category, ['route' => ['maintenance.items.item_categories.update', $item_category], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.item_categories.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
