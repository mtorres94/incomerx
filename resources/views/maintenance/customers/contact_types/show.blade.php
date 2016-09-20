@extends('layouts._tab')

@section('title', 'Show contact type')
@section('table-title', 'Show contact type')

@section('content')
{!! Form::model($contact_type, ['route' => 'maintenance.customers.contact_types.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.contact_types.partials.fields')
{!! Form::close() !!}
@endsection
