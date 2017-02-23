@extends('layouts._tab')

@section('content')
    {!! Form::bsGroup([
         ['class' => 'fa fa-file-pdf-o', 'value' => 'Pre Alert', 'index' => 1],
         ['class' => 'fa fa-file-pdf-o', 'value' => 'Delivery Order', 'index' => 2],
         ['class' => 'fa fa-file-pdf-o', 'value' => 'B/L', 'index' => 3],
         ['class' => 'fa fa-file-pdf-o', 'value' => 'Arrival Notice', 'index' => 4],
     ], $bill_of_lading, 'ia_bill_of_lading.get_pdf') !!}
    {!! Form::model($bill_of_lading, ['id' => 'data', 'route' => ['import.air.bill_of_lading.update', $bill_of_lading], 'method' => 'PUT']) !!}
    {!! Form::bsFooter(1, $bill_of_lading) !!}
    @include('import.air.bill_of_lading.partials.fields')
    {!! Form::bsFooter(2, $bill_of_lading) !!}
    {!! Form::close() !!}
@endsection
