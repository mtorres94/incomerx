@extends('layouts._tab')

@section('content')
{!! Form::open(['id' => 'data', 'route' => 'maintenance.customers.customers.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.customers.customers.partials.fields')
    {!! Form::bsFooter(2, null) !!}
{!! Form::close() !!}
@endsection
