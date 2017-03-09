@extends('layouts._tab')

@section('content')
{!! Form::bsIndex('maintenance.vendors_suppliers.vendors.create', 'maintenance.vendors_suppliers.vendors.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('vendors.open') }}', '{{ auth()->user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop