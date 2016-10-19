@extends('layouts._tab')

@section('content')
    {!! Form::model($bill_of_lading, ['id' => 'data', 'route' => ['export.oceans.bill_of_lading.update', $bill_of_lading], 'method' => 'PUT']) !!}
    @include('export.oceans.bill_of_lading.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::close() !!}
@endsection
