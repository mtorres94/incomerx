@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'export.oceans.step_by_step.store', 'method' => 'POST']) !!}
    @include('export.oceans.step_by_step.partials.fields')
    {!! Form::close() !!}
@endsection
