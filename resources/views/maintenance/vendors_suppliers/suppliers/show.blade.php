@extends('layouts._tab')

@section('title', 'Show supplier')
@section('table-title', 'Show supplier')

@section('content')
{!! Form::model($supplier, ['route' => 'maintenance.vendors_suppliers.suppliers.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.vendors_suppliers.suppliers.partials.fields')
{!! Form::close() !!}
@endsection
