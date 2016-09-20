@extends('layouts._tab')

@section('title', 'Edit contact type')
@section('table-title', 'Edit contact type')

@section('content')
{!! Form::model($contact_type, ['route' => ['maintenance.customers.contact_types.update', $contact_type], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.contact_types.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
