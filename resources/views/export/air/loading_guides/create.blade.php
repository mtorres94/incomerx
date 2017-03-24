@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'export.air.loading_guides.store', 'method' => 'POST', 'files'=>true]) !!}
    @include('export.air.loading_guides.partials.fields')
    {!! Form::bsFooter(2, null) !!}
    {!! Form::close() !!}
@endsection
