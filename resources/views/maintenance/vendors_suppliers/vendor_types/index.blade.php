@extends('layouts._tab')

@section('content')
{!! Form::bsIndex('maintenance.vendors_suppliers.vendor_types.create', 'maintenance.vendors_suppliers.vendor_types.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('vendors_type.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop