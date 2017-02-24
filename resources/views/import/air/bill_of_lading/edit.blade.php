@extends('layouts._tab')

@section('content')
    {!! Form::model($bill_of_lading, ['id' => 'data', 'route' => ['import.air.bill_of_lading.update', $bill_of_lading], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
        ['class' => 'fa fa-file-pdf-o', 'value' => 'Pre Alert'],
        ['class' => 'fa fa-file-pdf-o', 'value' => 'Delivery Order'],
        ['class' => 'fa fa-file-pdf-o', 'value' => 'B/L'],
        ['class' => 'fa fa-file-pdf-o', 'value' => 'Arrival Notice'],
    ], $bill_of_lading, 'ia_bill_of_lading.report') !!}
    {!! Form::bsFooter(1, $bill_of_lading) !!}
    @include('import.air.bill_of_lading.partials.fields')
    {!! Form::bsFooter(2, $bill_of_lading) !!}
    {!! Form::close() !!}
@endsection
