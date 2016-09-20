@extends('layouts._tab')

@section('title', 'Show warehouse facility')
@section('table-title', 'Show warehouse facility')

@section('content')
{!! Form::model($warehouse_facility, ['route' => 'maintenance.warehouse.warehouse_facilities.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.warehouse.warehouse_facilities.partials.fields')
{!! Form::close() !!}
@endsection
