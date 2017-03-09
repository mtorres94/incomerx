@extends('layouts._tab')

@section('content')
{!! Form::open(['id' => 'data', 'route' => 'maintenance.vendors_suppliers.vendors.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.vendors_suppliers.vendors.partials.fields')
    {!! Form::bsFooter(2, null) !!}
{!! Form::close() !!}
@endsection
