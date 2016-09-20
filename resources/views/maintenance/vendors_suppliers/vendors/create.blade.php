@extends('layouts._tab')

@section('title', 'Create vendor')
@section('table-title', 'Create new vendor')

@section('content')
{!! Form::open(['id' => 'vendors', 'route' => 'maintenance.vendors_suppliers.vendors.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.vendors_suppliers.vendors.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
