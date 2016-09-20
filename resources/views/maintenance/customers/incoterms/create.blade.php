@extends('layouts._tab')

@section('title', 'Create incoterm')
@section('table-title', 'Create new incoterm')

@section('content')
{!! Form::open(['route' => 'maintenance.customers.incoterms.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.incoterms.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
