@extends('layouts._tab')

@section('content')
    {!! Form::bsGroup([
         ['class' => 'fa fa-file-pdf-o', 'value' => 'PRE ALERT', 'route' => 'ia_bill_of_lading.pre_alert'],
         ['class' => 'fa fa-file-pdf-o', 'value' => 'DELIVERY ORDER', 'route' => 'ia_bill_of_lading.delivery_order'],
         ['class' => 'fa fa-file-pdf-o', 'value' => 'B/L', 'route' => 'ia_bill_of_lading.bill_of_lading'],
         ['class' => 'fa fa-file-pdf-o', 'value' => 'ARRIVAL NOTICE', 'route' => 'ia_bill_of_lading.arrival_notice'],
     ], $bill_of_lading) !!}
    {!! Form::model($bill_of_lading, ['id' => 'data', 'route' => ['import.air.bill_of_lading.update', $bill_of_lading], 'method' => 'PUT']) !!}
    @include('import.air.bill_of_lading.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($bill_of_lading) ? $bill_of_lading->id : 0) !!}
    {!! Form::close() !!}
@endsection
