@extends('layouts._tab')

@section('content')
{!! Form::bsIndex('maintenance.items.item_subcategories.create', 'maintenance.items.item_subcategories.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('item_subcategories.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop