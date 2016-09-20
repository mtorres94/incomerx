@extends('layouts._tab')

@section('title', 'Edit adjustment')
@section('table-title', 'Edit adjustment')

@section('content')
{!! Form::model($adjustment, ['route' => ['maintenance.reasons_comments.adjustments.update', $adjustment], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('maintenance.reasons_comments.adjustments.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
