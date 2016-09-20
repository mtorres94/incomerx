@extends('layouts._tab')

@section('title', 'Create supplier')
@section('table-title', 'Create new supplier')

@section('content')
{!! Form::open(['route' => 'maintenance.vendors_suppliers.suppliers.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.vendors_suppliers.suppliers.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
