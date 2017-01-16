@extends('layouts._tab')

@section('content')
    {!! Form::open(['route' => 'io_bill_of_lading.excel', 'method' => 'POST']) !!}
        <div id="left-panel">
            <button class="btn btn-success" role="button"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Excel</button>
        </div>
    {!! Form::close() !!}
    {!! Form::bsIndex('import.oceans.bill_of_lading.create', 'import.oceans.bill_of_lading.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
        preventOpen($('#dataTableBuilder'), '{{ route('io_bill_of_lading.open') }}', '{{ \Auth::user()->id }}');
    </script>
@stop
