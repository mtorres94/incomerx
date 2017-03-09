@extends('layouts._tab')

@section('title', 'Create customer type')
@section('table-title', 'Create new customer type')

@section('content')
{!! Form::open(['id'=>'data','route' => 'maintenance.vendors_suppliers.vendor_types.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.vendors_suppliers.vendor_types.partials.fields')
{!! Form::bsFooter(2, null) !!}
{!! Form::close() !!}
@endsection
