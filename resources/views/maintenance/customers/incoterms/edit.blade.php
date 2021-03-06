@extends('layouts._tab')

@section('title', 'Edit incoterm')
@section('table-title', 'Edit incoterm')

@section('content')
{!! Form::model($incoterm, ['id'=> 'data', 'route' => ['maintenance.customers.incoterms.update', $incoterm], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.incoterms.partials.fields')
{!! Form::bsFooter(2, $incoterm) !!}
{!! Form::close() !!}
@endsection
