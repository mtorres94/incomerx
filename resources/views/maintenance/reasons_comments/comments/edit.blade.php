@extends('layouts._tab')

@section('title', 'Edit comment')
@section('table-title', 'Edit comment')

@section('content')
{!! Form::model($comment, ['route' => ['maintenance.reasons_comments.comments.update', $comment], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.reasons_comments.comments.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
