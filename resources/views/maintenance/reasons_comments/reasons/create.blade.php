@extends('layouts._tab')

@section('title', 'Create reason')
@section('table-title', 'Create new reason')

@section('content')
{!! Form::open(['route' => 'maintenance.reasons_comments.reasons.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.reasons_comments.reasons.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
