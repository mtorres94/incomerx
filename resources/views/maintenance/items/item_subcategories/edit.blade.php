@extends('layouts._tab')

@section('title', 'Edit item subcategory')
@section('table-title', 'Edit item_subcategory')

@section('content')
{!! Form::model($item_subcategory, ['id'=> 'data','route' => ['maintenance.items.item_subcategories.update', $item_subcategory], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.item_subcategories.partials.fields')
{!! Form::bsFooter(2, $item_subcategory) !!}
{!! Form::close() !!}
@endsection
