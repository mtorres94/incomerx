<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#customerReference" onclick="cleanModalFields('customerReference')">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-danger" onclick="clearTable('customer_details')">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>
<table class="table table-bordered table-condensed" id="customer_details">
    <thead>

    <tr>
        <th data-override="cust_line" hidden>Line</th>
        <th data-override="cust_number" width="50%">Customer Reference</th>
        <th data-override="cust_details">Details</th>
        <th width="15%"/>
    </tr>
    </thead>
    <tbody>
    @if(isset($bill_of_lading))
        @foreach($bill_of_lading->customerReference as $detail)
            <tr id="{{ $detail->line }}">
                {!! Form::bsRowTd($detail->line, 'po_line', $detail->line, true) !!}
                {!! Form::bsRowTd($detail->line, 'po_number', $detail->po_number, false) !!}
                {!! Form::bsRowTd($detail->line, 'po_detail', $detail->po_detail, false) !!}
                {!! Form::bsRowTd($detail->line, 'po_project', $detail->po_project, true) !!}
                {!! Form::bsRowTd($detail->line, 'po_remarks', $detail->po_remarks, true) !!}
                {!! Form::bsRowBtns() !!}
            </tr>
        @endforeach
    @endif
    </tbody>
</table>