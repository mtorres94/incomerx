@extends('layouts._tab')

@section('content')
    {!! Form::model($general, ['id' => 'data', 'route' => ['maintenance.accounting.general.update', $general], 'method' => 'PUT']) !!}
    {!! Form::bsFooter(1, $general) !!}
    @include('maintenance.accounting.general.partials.fields')
    {!! Form::bsFooter(2, $general) !!}
    {!! Form::close() !!}
@endsection
