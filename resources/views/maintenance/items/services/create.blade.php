@extends('layouts._tab')

@section('title', 'Create unit')
@section('table-title', 'Create new unit')

@section('content')
{!! Form::open(['id'=> 'data','route' => 'maintenance.items.services.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.items.services.partials.fields')
{!! Form::bsFooter(2, null) !!}
{!! Form::close() !!}
@endsection
