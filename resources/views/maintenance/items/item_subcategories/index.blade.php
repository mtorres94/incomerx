@extends('layouts._tab')

@section('content')
{!! Form::bsIndex('maintenance.items.item_subcategories.create', 'maintenance.items.item_subcategories.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop