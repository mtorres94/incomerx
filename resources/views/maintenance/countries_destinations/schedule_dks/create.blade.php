@extends('layouts._tab')

@section('content')
{!! Form::open(['id'=> 'data', 'route' => 'maintenance.countries_destinations.schedule_dks.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('maintenance.countries_destinations.schedule_dks.partials.fields')
{!! Form::bsFooter(2, null) !!}
{!! Form::close() !!}
@endsection
