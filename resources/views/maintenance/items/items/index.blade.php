@extends('layouts._tab')

@section('content')
{!! Form::bsIndex('maintenance.items.items.create', 'maintenance.items.items.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop