@extends('layouts._tab')

@section('title', 'Show reason')
@section('table-title', 'Show reason')

@section('content')
{!! Form::model($reason, ['route' => 'maintenance.reasons_comments.reasons.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.reasons_comments.reasons.partials.fields')
{!! Form::close() !!}
@endsection
