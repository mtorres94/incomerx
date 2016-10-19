
<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-9','Inland Carrier ', 'inland_carrier_id', 'inland_carrier_name', Request::get('term'),((isset($bill_landing) and $bill_landing->inland_carrier_id > 0) ? $bill_landing->inland_carrier->name : null), 'Carrier') !!}
</div>
<div class="row">
    {!! Form::bsDate('col-md-3', 'col-md-9', 'Date', 'inland_date', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'DBL/MBL', 'inland_dbl_mbl_code', null, ' ') !!}
</div>
<div class="row">
    <legend>PRO/ Tracking</legend>
    <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#PRONumbers" onclick="cleanModalFields('PRONumbers')">
            <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-danger" onclick="clearTable('PRO_details')">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </button>
    </div>
    <table class="table table-bordered table-condensed" id="PRO_details">
        <thead>

        <tr>
            <th data-override="PRO_line" hidden>Line</th>
            <th data-override="PRO_number" width="50%">PRO/Tracking</th>
            <th data-override="PO_details">Details</th>
            <th width="15%"/>
        </tr>
        </thead>
        <tbody>
        @if(isset($bill_of_lading))
            @foreach($bill_of_lading->pro_tracking as $detail)
                <tr id="{{ $detail->line }}">
                {!! Form::bsRowTd($detail->line, 'pro_line', $detail->line, true) !!}
                {!! Form::bsRowTd($detail->line, 'pro_number', $detail->pro_number, false) !!}
                {!! Form::bsRowTd($detail->line, 'pro_detail', $detail->pro_detail, false) !!}
                {!! Form::bsRowTd($detail->line, 'pro_remarks', $detail->pro_remarks, true) !!}
                {!! Form::bsRowBtns() !!}
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
