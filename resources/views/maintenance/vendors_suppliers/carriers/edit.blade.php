@extends('layouts._tab')

@section('content')
    {!! Form::model($carrier, ['id' => 'data', 'route' => ['maintenance.vendors_suppliers.carriers.update', $carrier], 'method' => 'PUT']) !!}
    {!! Form::bsFooter(1, $carrier) !!}
    @include('maintenance.vendors_suppliers.carriers.partials.fields')
    {!! Form::bsFooter(2, $carrier) !!}
    {!! Form::close() !!}
@endsection
