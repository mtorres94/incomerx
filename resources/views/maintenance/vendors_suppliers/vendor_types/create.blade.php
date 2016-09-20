@extends('layouts._tab')

@section('title', 'Create customer type')
@section('table-title', 'Create new customer type')

@section('content')
{!! Form::open(['route' => 'maintenance.vendors_suppliers.vendor_types.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.vendors_suppliers.vendor_types.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
