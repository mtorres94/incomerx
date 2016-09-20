@extends('layouts._tab')

@section('content')
{!! Form::bsIndex('maintenance.customers.customer_types.create', 'maintenance.customers.customer_types.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop