@extends('layouts._tab')

@section('title', 'Show item subcategory')
@section('table-title', 'Show item subcategory')

@section('content')
{!! Form::model($item_subcategory, ['route' => 'maintenance.items.item_subcategories.index', 'method' => 'HEAD', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.item_subcategories.partials.fields')
{!! Form::close() !!}
@endsection
