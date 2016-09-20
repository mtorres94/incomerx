@extends('layouts._tab')

@section('title', 'Edit reason')
@section('table-title', 'Edit reason')

@section('content')
{!! Form::model($reason, ['route' => ['maintenance.reasons_comments.reasons.update', $reason], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.reasons_comments.reasons.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
