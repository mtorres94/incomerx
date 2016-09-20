@extends('layouts._tab')

@section('content')
{!! Form::bsIndex('maintenance.items.units.create', 'maintenance.items.units.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop