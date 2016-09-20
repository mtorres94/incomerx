@extends('layouts._tab')

@section('title', 'Edit vendor')
@section('table-title', 'Edit vendor')

@section('content')
{!! Form::model($vendor, ['route' => ['maintenance.vendors_suppliers.vendors.update', $vendor], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.vendors_suppliers.vendors.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
