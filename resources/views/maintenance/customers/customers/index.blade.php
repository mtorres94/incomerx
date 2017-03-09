@extends('layouts._tab')

@section('content')
{!! Form::bsIndex('maintenance.customers.customers.create', 'maintenance.customers.customers.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('customers.open') }}', '{{ auth()->user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
