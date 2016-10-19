@extends('layouts._tab')

@section('content')
    {!! Form::model($cargo_loader, ['id' => 'data', 'route' => ['export.oceans.cargo_loader.update', $cargo_loader], 'method' => 'PUT']) !!}
    @include('export.oceans.cargo_loader.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::close() !!}
@endsection
