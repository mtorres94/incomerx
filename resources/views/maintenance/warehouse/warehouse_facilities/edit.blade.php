@extends('layouts._tab')

@section('title', 'Edit warehouse facility')
@section('table-title', 'Edit warehouse facility')

@section('content')
{!! Form::model($warehouse_facility, ['id'=>'data','route' => ['maintenance.warehouse.warehouse_facilities.update', $warehouse_facility], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.warehouse.warehouse_facilities.partials.fields')
{!! Form::bsFooter(2, $warehouse_facility) !!}
{!! Form::close() !!}
@endsection
