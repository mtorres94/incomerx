@extends('layouts._tab')

@section('content')
    {!! Form::model($cargo_loader, ['id' => 'data', 'route' => ['export.oceans.cargo_loader.update', $cargo_loader], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
        ['class' => 'fa fa-file-pdf-o', 'value' => 'LOADING PLAN', 'route' => 'cargo_loader.pdf'],
    ], $cargo_loader) !!}
    @include('export.oceans.cargo_loader.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($cargo_loader) ? $cargo_loader->id : 0) !!}
    {!! Form::close() !!}
@endsection
