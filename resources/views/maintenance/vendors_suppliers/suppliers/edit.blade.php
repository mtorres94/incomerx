@extends('layouts._tab')

@section('title', 'Edit supplier')
@section('table-title', 'Edit supplier')

@section('content')
{!! Form::model($supplier, ['route' => ['maintenance.vendors_suppliers.suppliers.update', $supplier], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.vendors_suppliers.suppliers.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
