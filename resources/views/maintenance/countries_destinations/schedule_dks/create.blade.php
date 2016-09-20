@extends('layouts._tab')

@section('content')
{!! Form::open(['route' => 'maintenance.countries_destinations.schedule_dks.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.schedule_dks.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
