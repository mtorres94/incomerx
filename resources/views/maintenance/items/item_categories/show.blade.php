@extends('layouts._tab')

@section('title', 'Show item category')
@section('table-title', 'Show item category')

@section('content')
{!! Form::model($item_category, ['route' => 'maintenance.items.item_categories.index', 'method' => 'HEAD', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.item_categories.partials.fields')
{!! Form::close() !!}
@endsection
