@extends('layouts._tab')

@section('content')
{!! Form::model($vendor, ['route' => ['maintenance.vendors_suppliers.vendors.update', $vendor], 'id' => 'data', 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    {!! Form::bsFooter(1, $vendor) !!}
    @include('maintenance.vendors_suppliers.vendors.partials.fields')
    {!! Form::bsFooter(2, $vendor) !!}
{!! Form::close() !!}
@endsection
