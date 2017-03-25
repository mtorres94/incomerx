@extends('layouts._tab')

@section('title', 'Receipts Entries')
@section('table-title', 'List of receipts entries')

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="pull-left">
                {!! Form::bsSelect(null, null, 'Status', 'status', array(
                    ''  => 'ALL',
                    'O' => 'OPEN',
                    'P' => 'IN PROCESS',
                    'C' => 'CLOSE',
                    'V' => 'VOID',
                    'H' => 'HOLD'
                ), null) !!}
            </div>
        </div>
    </div>
    {!! Form::bsIndex('warehouse.receipts.receipts_entries.create', 'warehouse.receipts.receipts_entries.index') !!}
    {!! $dataTable->table() !!}
@endsection

@section('handlebars')
    <script id="dataTableBuilder-template" type="text/x-handlebars-template">
        <table class="table">
            <tr>
                <td>Agent:</td>
                <td>@{{ agent_name }}</td>
            </tr>
            <tr>
                <td>Coloader:</td>
                <td>@{{ coloader_name }}</td>
            </tr>
            <tr>
                <td>Third Party:</td>
                <td>@{{ third_party_name }}</td>
            </tr>
        </table>
    </script>
@endsection

@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        var template = Handlebars.compile($("#dataTableBuilder-template").html());
        var dt = $("#dataTableBuilder");
        var table = dt.DataTable();

        // Add event listener for opening and closing details
        dt.find('tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(template(row.data())).show();
                tr.addClass('shown');
            }
        });

        dt.on('preXhr.dt', function (e, settings, data) {
            data.status= $('#status').val();
        });

        $('#status').change(function () {
            dt.DataTable().draw(false);
        });
        preventOpen(dt, '{{ route('receipts_entries.open') }}', '{{ auth()->user()->id }}');
        ajaxDelete(dt);
    </script>
@stop
