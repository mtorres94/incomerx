@extends('layouts._tab')

@section('title', 'Create warehouse facility')
@section('table-title', 'Create new warehouse facility')

@section('content')
{!! Form::open(['id'=>'data', 'route' => 'maintenance.warehouse.warehouse_facilities.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.warehouse.warehouse_facilities.partials.fields')
{!! Form::bsFooter(2, null) !!}
{!! Form::close() !!}
@endsection
