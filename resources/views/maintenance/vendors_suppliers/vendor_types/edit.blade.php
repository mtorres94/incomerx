@extends('layouts._tab')

@section('content')
{!! Form::model($vendor_type, ['id'=>'data','route' => ['maintenance.vendors_suppliers.vendor_types.update', $vendor_type], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.vendors_suppliers.vendor_types.partials.fields')
{!! Form::bsFooter(2, $vendor_type) !!}
{!! Form::close() !!}
@endsection
