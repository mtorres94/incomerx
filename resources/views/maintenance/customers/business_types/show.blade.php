@extends('layouts._tab')

@section('title', 'Show business type')
@section('table-title', 'Show business type')

@section('content')
{!! Form::model($business_type, ['class' => 'form-horizontal']) !!}
    @include('maintenance.customers.business_types.partials.fields')
{!! Form::close() !!}
@endsection
