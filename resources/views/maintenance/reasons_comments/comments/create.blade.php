@extends('layouts._tab')

@section('title', 'Create comment')
@section('table-title', 'Create new comment')

@section('content')
{!! Form::open(['route' => 'maintenance.reasons_comments.comments.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.reasons_comments.comments.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
