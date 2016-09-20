@extends('layouts._tab')

@section('title', 'Show commodity')
@section('table-title', 'Show commodity')

@section('content')
{!! Form::model($commodity, ['route' => 'maintenance.items.commodities.index', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
{!! Form::close() !!}
@endsection
