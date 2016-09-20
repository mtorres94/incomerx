@extends('layouts._tab')

@section('title', 'Show vendor')
@section('table-title', 'Show vendor')

@section('content')
{!! Form::model($vendor, ['route' => 'maintenance.vendors_suppliers.vendors.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.vendors_suppliers.vendors.partials.fields')
{!! Form::close() !!}
@endsection
