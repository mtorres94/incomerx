@extends('layouts._tab')

@section('title', 'Show comment')
@section('table-title', 'Show comment')

@section('content')
{!! Form::model($comment, ['route' => 'maintenance.reasons_comments.comments.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.reasons_comments.comments.partials.fields')
{!! Form::close() !!}
@endsection
