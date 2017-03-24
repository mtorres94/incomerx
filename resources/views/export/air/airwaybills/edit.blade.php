@extends('layouts._tab')

@section('content')
    {!! Form::model($airway_bill, ['id' => 'data', 'route' => ['export.air.airwaybills.update', $airway_bill], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
              ['class' => 'fa fa-file-pdf-o', 'value' => 'Delivery Order'],
              ['class' => 'fa fa-file-pdf-o', 'value' => 'Delivery Order (Documents Only)'],
              ['class' => 'fa fa-file-pdf-o', 'value' => 'Delivery Order (Freight Only)'],
              ['class' => 'fa fa-file-pdf-o', 'value' => 'Pick up Order'],
              ['class' => 'fa fa-file-pdf-o', 'value' => 'Pre Alert'],
              ['class' => 'fa fa-file-pdf-o', 'value' => 'Shipper Unknown'],
              ['class' => 'fa fa-file-pdf-o', 'value' => 'Shipper Known'],
          ], $airway_bill, 'ea_airwaybills.report') !!}

    {!! Form::bsFooter(1, $airway_bill) !!}
    @include('export.air.airwaybills.partials.fields')
    {!! Form::bsFooter(2, $airway_bill) !!}
    {!! Form::close() !!}
@endsection
