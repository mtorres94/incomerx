@extends('layouts._tab')

@section('content')
    {!! Form::model($loading_guide, ['id' => 'data', 'route' => ['export.air.loading_guides.update', $loading_guide], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
           ['class' => 'fa fa-file-pdf-o', 'value' => 'Load Plan'],
           ['class' => 'fa fa-file-pdf-o', 'value' => 'Packing Instructions'],
           ['class' => 'fa fa-file-pdf-o', 'value' => 'Load List'],
       ], $loading_guide, 'ea_loading_guides.report') !!}
    {!! Form::bsFooter(1, $loading_guide) !!}
    @include('export.air.loading_guides.partials.fields')
    {!! Form::bsFooter(2, $loading_guide) !!}
    {!! Form::close() !!}
@endsection
