@extends('layouts._tab')

@section('content')
{!! Form::model($vendor_type, ['class' => 'form-horizontal']) !!}
    @include('maintenance.vendors_suppliers.vendor_types.partials.fields')
{!! Form::close() !!}
@endsection
