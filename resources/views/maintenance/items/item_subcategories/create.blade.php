@extends('layouts._tab')

@section('title', 'Create item subcategory')
@section('table-title', 'Create new item subcategory')

@section('content')
{!! Form::open(['route' => 'maintenance.items.item_subcategories.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.item_subcategories.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
