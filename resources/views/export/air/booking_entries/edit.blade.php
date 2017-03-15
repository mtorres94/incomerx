@extends('layouts._tab')

@section('content')
    {!! Form::model($booking_entries, ['id' => 'data', 'route' => ['export.air.booking_entries.update', $booking_entries], 'method' => 'PUT']) !!}

    {!! Form::bsFooter(1, $booking_entries) !!}
    @include('export.air.booking_entries.partials.fields')
    {!! Form::bsFooter(2, $booking_entries) !!}
    {!! Form::close() !!}
@endsection
