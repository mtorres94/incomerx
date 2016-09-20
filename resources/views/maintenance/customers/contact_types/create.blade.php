@extends('layouts._tab')

@section('title', 'Create contact type')
@section('table-title', 'Create new contact type')

@section('content')
{!! Form::open(['route' => 'maintenance.customers.contact_types.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.contact_types.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
