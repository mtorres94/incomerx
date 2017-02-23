@extends('layouts._tab')

@section('content')
    {!! Form::model($cargo_loader, ['id' => 'data', 'route' => ['export.oceans.cargo_loader.update', $cargo_loader], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
        ['class' => 'fa fa-file-pdf-o', 'value' => 'Loading Plan', 'index' => 1],
    ], $cargo_loader, 'cargo_loader.get_pdf') !!}
    {!! Form::bsFooter(1, $cargo_loader) !!}
    @include('export.oceans.cargo_loader.partials.fields')
    {!! Form::bsFooter(2, $cargo_loader) !!}
    {!! Form::close() !!}
@endsection
