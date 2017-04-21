<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
        <button type="button" id="btn_charges" class="btn btn-default" data-toggle="modal" data-target="#charge_details" onclick="cleanModalFields('charge_details')">
            <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-danger" id="delete_charge">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </button>
    </div>
</div>

<table class="table table-bordered table-condensed" id="charges">
    <thead>
    <tr>
        <th hidden></th>
        <th width="10%" >Billing Code</th>
        <th width="20%" >Description</th>
        <th width="10%" >Bill Type</th>
        <th width="10%" >Bill Party</th>
        <th width="10%" >Bill Qty</th>
        <th width="10%" >Bill Amount</th>
        <th width="10%" >Cost</th>
        <th width="12%"/>
    </tr>
    </thead>
    <tbody>
    @if(isset($airway_bill))
        @foreach($airway_bill->charge_details as $detail)
            <tr id="{{ $detail->line }}">
                {!! Form::bsRowTd($detail->line, 'charge_id', $detail->line, true) !!}
                {!! Form::bsRowTd($detail->line, 'billing_billing_id', $detail->billing_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'billing_billing_code', strtoupper($detail->billing_id >0 ? $detail->billing->code : ""), false) !!}
                {!! Form::bsRowTd($detail->line, 'billing_billing_description', strtoupper($detail->billing_id > 0 ? $detail->billing->name : ""), false) !!}
                {!! Form::bsRowTd($detail->line, 'billing_bill_type', $detail->bill_type, false) !!}
                {!! Form::bsRowTd($detail->line, 'billing_bill_party', $detail->bill_party, false) !!}
                {!! Form::bsRowTd($detail->line, 'billing_quantity', $detail->billing_quantity, false) !!}
                {!! Form::bsRowTd($detail->line, 'billing_rate', $detail->billing_rate, true) !!}
                {!! Form::bsRowTd($detail->line, 'billing_amount', $detail->billing_amount, false) !!}
                {!! Form::bsRowTd($detail->line, 'billing_currency_type', $detail->billing_currency_type, true) !!}
                {!! Form::bsRowTd($detail->line, 'billing_customer_name', strtoupper(($detail->billing_customer_id >0) ? $detail->billing_customer->name: null), true) !!}
                {!! Form::bsRowTd($detail->line, 'cost_amount', $detail->cost_amount, false) !!}
                {!! Form::bsRowTd($detail->line, 'cost_currency_type', $detail->cost_currency_type, true) !!}
                {!! Form::bsRowTd($detail->line, 'cost_invoice', $detail->cost_invoice, true) !!}
                {!! Form::bsRowTd($detail->line, 'cost_reference', $detail->cost_reference, true) !!}
                {!! Form::bsRowTd($detail->line, 'billing_notes', $detail->billing_notes,true) !!}
                {!! Form::bsRowTd($detail->line, 'billing_unit_id', $detail->billing_unit_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'billing_unit_name', strtoupper($detail->billing_unit_id >0 ? $detail->billing_unit->name : ""), true) !!}
                {!! Form::bsRowTd($detail->line, 'billing_exchange_rate', $detail->billing_exchange_rate, true) !!}
                {!! Form::bsRowTd($detail->line, 'billing_customer_id', $detail->billing_customer_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'cost_quantity', $detail->cost_quantity, true) !!}
                {!! Form::bsRowTd($detail->line, 'cost_unit_id', $detail->cost_unit_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'cost_unit_name', strtoupper($detail->cost_unit_id > 0 ? $detail->cost_unit->name : ""), true) !!}
                {!! Form::bsRowTd($detail->line, 'cost_rate', $detail->cost_rate, true) !!}
                {!! Form::bsRowTd($detail->line, 'cost_cost_center', $detail->cost_center, true) !!}
                {!! Form::bsRowTd($detail->line, 'cost_exchange_rate', $detail->cost_exchange_rate, true) !!}
                {!! Form::bsRowTd($detail->line, 'billing_vendor_code', $detail->billing_vendor_code, true) !!}
                {!! Form::bsRowTd($detail->line, 'billing_vendor_name', strtoupper(($detail->billing_vendor_code >0) ? $detail->billing_vendor->name: null), true) !!}
                {!! Form::bsRowTd($detail->line, 'cost_date', $detail->cost_date, true) !!}
                {!! Form::bsRowTd($detail->line, 'billing_increase', $detail->billing_increase, true) !!}
                {!! Form::bsRowBtns()!!}
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
<div class="row">
    <div class="pull-right">
        <div class="col-md-2">{!! Form::bsText(null, null, 'Bill', 'total_bill', null, ' ') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'Cost', 'total_cost', null, ' ') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'Profit', 'total_profit', null, ' ') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'Profit %', 'total_profit_percent', null, ' ') !!}</div>
    </div>
</div>
