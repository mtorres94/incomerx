@extends('layouts._tab')

@section('title', 'Create item subcategory')
@section('table-title', 'Create new item subcategory')

@section('content')
{!! Form::open(['id'=> 'data', 'route' => 'maintenance.items.item_subcategories.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.item_subcategories.partials.fields')
{!! Form::bsFooter(2, null) !!}
{!! Form::close() !!}
@endsection
