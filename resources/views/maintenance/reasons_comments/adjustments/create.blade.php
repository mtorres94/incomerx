@extends('layouts._tab')

@section('title', 'Create adjustment')
@section('table-title', 'Create new adjustment')

@section('content')
{!! Form::open(['route' => 'maintenance.reasons_comments.adjustments.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.reasons_comments.adjustments.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
