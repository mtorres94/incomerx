@extends('layouts._tab')

@section('content')
{!! Form::bsIndex('maintenance.divisions_departments.divisions.create', 'maintenance.divisions_departments.divisions.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('divisions.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop