<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ItemDetails" onclick="cleanModalFields('ItemDetails')">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-danger" onclick="clearTable('items_details')">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>
<table class="table table-bordered table-condensed" id="items_details">
    <thead>

    <tr>
        <th data-override="cust_line" hidden>Line</th>
        <th data-override="item_id" width="10%">Item ID</th>
        <th data-override="cust_number" width="30%">Description</th>
        <th data-override="cust_number" width="20%">Customer ID</th>
        <th data-override="cust_number" width="10%">Qty</th>
        <th width="15%"/>
    </tr>
    </thead>
    <tbody>
    @if(isset($bill_of_lading))
        @foreach($bill_of_lading->item as $detail)
            <tr id="{{ $detail->line }}">
                {!! Form::bsRowTd($detail->line, 'item_line', $detail->line, true) !!}
                {!! Form::bsRowTd($detail->line, 'item_id', $detail->item_id, false) !!}
                {!! Form::bsRowTd($detail->line, 'item_name', (($detail->item_id >0) ? $detail->items->name: null), false) !!}
                {!! Form::bsRowTd($detail->line, 'customer_id', $detail->customer_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'customer_name', (($detail->customer_id >0) ? $detail->customers->name: null), false) !!}
                {!! Form::bsRowTd($detail->line, 'item_quantity', $detail->item_quantity, false) !!}
                {!! Form::bsRowTd($detail->line, 'item_type_code', $detail->item_type_code, true) !!}
                {!! Form::bsRowTd($detail->line, 'item_type_name',(($detail->item_type_code >0) ? $detail->item_type->name: null), true) !!}
                {!! Form::bsRowTd($detail->line, 'item_weight', $detail->item_weight, true) !!}
                {!! Form::bsRowTd($detail->line, 'item_unit', $detail->item_unit, true) !!}
                {!! Form::bsRowBtns() !!}
            </tr>
        @endforeach
    @endif
    </tbody>
</table>