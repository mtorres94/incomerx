@extends('layouts._tab')

@section('content')
{!! Form::bsIndex('maintenance.customers.identification_types.create', 'maintenance.customers.identification_types.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop