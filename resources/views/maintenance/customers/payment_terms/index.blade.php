@extends('layouts._tab')

@section('title', 'Payment terms')
@section('table-title', 'List of payment terms')

@section('content')
{!! Form::bsIndex('maintenance.customers.payment_terms.create', 'maintenance.customers.payment_terms.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('payment_term.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop