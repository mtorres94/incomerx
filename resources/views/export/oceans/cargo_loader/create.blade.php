@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'export.oceans.cargo_loader.store', 'method' => 'POST']) !!}
    @include('export.oceans.cargo_loader.partials.fields')
    {!! Form::bsCheck('Create HBL by Consignee ', 'create_hbl', 0) !!}
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($cargo_loader) ? $cargo_loader->id : 0) !!}
    {!! Form::close() !!}
@endsection
