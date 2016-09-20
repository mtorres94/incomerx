@extends('layouts._tab')

@section('title', 'Show incoterm')
@section('table-title', 'Show incoterm')

@section('content')
{!! Form::model($incoterm, ['route' => 'maintenance.customers.incoterms.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.incoterms.partials.fields')
{!! Form::close() !!}
@endsection
