@extends('layouts._tab')

@section('title', 'Show adjustment')
@section('table-title', 'Show adjustment')

@section('content')
{!! Form::model($adjustment, ['route' => 'maintenance.reasons_comments.adjustments.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
    @include('maintenance.reasons_comments.adjustments.partials.fields')
{!! Form::close() !!}
@endsection
