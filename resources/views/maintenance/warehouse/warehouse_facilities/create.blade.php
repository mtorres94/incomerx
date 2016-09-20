@extends('layouts._tab')

@section('title', 'Create warehouse facility')
@section('table-title', 'Create new warehouse facility')

@section('content')
{!! Form::open(['route' => 'maintenance.warehouse.warehouse_facilities.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.warehouse.warehouse_facilities.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
