<div class="easyui-tabs">
    <div title="Charges Details">
        <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
            <button type="button" id="btn-charges" class="btn btn-default" data-toggle="modal" data-target="#charge-warehouse" onclick="cleanModalFields('charge-warehouse')">
                <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-danger" id="delete_charge">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
        </div>

        <table class="table table-bordered table-condensed" id="charge-details">
            <thead>
            <tr>
                <th data-override="charge_id" hidden></th>
                <th data-override="billing_billing_id" hidden></th>
                <th data-override="billing_billing_code">Billing Code</th>
                <th data-override="billing_billing_description">Description</th>
                <th data-override="billing_bill_type">Bill type</th>
                <th data-override="billing_bill_party">Bill party</th>
                <th hidden data-override="billing_bill_comments"></th>
                <th data-override="billing_quantity">Bill Qty</th>
                <th hidden data-override="billing_unit_id"></th>
                <th hidden data-override="billing_unit_code"></th>
                <th hidden data-override="billing_rate"></th>
                <th hidden data-override="billing_increase"></th>
                <th data-override="billing_amount">Bill Amount</th>
                <th hidden data-override="billing_currency_id"></th>
                <th hidden data-override="billing_exchange_rate"></th>
                <th hidden data-override="billing_customer_id"></th>
                <th hidden data-override="billing_customer_name"></th>
                <th hidden data-override="cost_quantity"></th>
                <th hidden data-override="cost_unit_id"></th>
                <th hidden data-override="cost_unit_name"></th>
                <th hidden data-override="cost_rate"></th>
                <th data-override="cost_amount">Cost</th>
                <th hidden data-override="cost_currency_id"></th>
                <th hidden data-override="cost_exchange_rate"></th>
                <th hidden data-override="cost_vendor_id"></th>
                <th hidden data-override="cost_vendor_name"></th>
                <th hidden data-override="cost_date"></th>
                <th hidden data-override="cost_invoice"></th>
                <th hidden data-override="cost_cost_center"></th>
                <th hidden data-override="cost_reference"></th>
                <th width="15%"/>
            </tr>
            </thead>
            <tbody>
                @if(isset($receipt_entry))
                    @foreach($receipt_entry->charge_details as $detail)
                        <tr id="{{ $detail->line }}">
                            {!! Form::bsRowTd($detail->line, 'charge_id', $detail->line, true) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_billing_id', $detail->billing_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_billing_code', ($detail->billing_id > 0) ? strtoupper($detail->billing_billing->code) : '', false) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_billing_description', $detail->billing_description, false) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_bill_type', $detail->bill_type, false) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_bill_party', $detail->bill_party, false) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_notes', $detail->notes, true) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_quantity', $detail->billing_quantity, false) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_unit_id', $detail->billing_unit_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_unit_name', ($detail->billing_unit_id > 0) ? $detail->billing_unit->name : '', true) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_increase', $detail->billing_increase, true) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_rate', $detail->billing_rate, true) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_amount', $detail->billing_amount, false) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_currency_type', $detail->billing_currency_type, true) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_exchange_rate', ($detail->billing_currency_type > 0) ? $detail->billing_currency->exchange_rate: '', true) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_customer_id', $detail->billing_customer_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_customer_name', ($detail->customer_id > 0) ? $detail->customer->name : '', true) !!}
                            {!! Form::bsRowTd($detail->line, 'cost_quantity', $detail->cost_quantity, true) !!}
                            {!! Form::bsRowTd($detail->line, 'cost_unit_id', $detail->cost_unit_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'cost_unit_name', ($detail->cost_unit_id > 0 ) ? $detail->cost_unit->name : '', true) !!}
                            {!! Form::bsRowTd($detail->line, 'cost_rate', $detail->cost_rate, true) !!}
                            {!! Form::bsRowTd($detail->line, 'cost_amount', $detail->cost_amount, false) !!}
                            {!! Form::bsRowTd($detail->line, 'cost_currency_type', $detail->cost_currency_type, true) !!}
                            {!! Form::bsRowTd($detail->line, 'cost_exchange_rate', ($detail->cost_currency_type > 0) ? $detail->cost_currency->exchange_rate : '', true) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_vendor_id', $detail->vendor_id, true) !!}
                            {!! Form::bsRowTd($detail->line, 'billing_vendor_name', ($detail->vendor_id > 0) ? $detail->vendor->name : '', true) !!}
                            {!! Form::bsRowTd($detail->line, 'cost_date', $detail->cost_date, true) !!}
                            {!! Form::bsRowTd($detail->line, 'cost_cost_center', $detail->cost_center, true) !!}
                            {!! Form::bsRowTd($detail->line, 'cost_invoice', $detail->cost_invoice, true) !!}
                            {!! Form::bsRowTd($detail->line, 'cost_reference', $detail->cost_reference, true) !!}
                            {!! Form::bsRowBtns() !!}
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="pull-left">
            <button type="button" id="btn-calculate_rate" class="btn btn-default">Calculate Rate</button>
        </div>
        <div class="pull-right">
            <div class="row">
                <div class="col-md-offset-4 col-md-2">{!! Form::bsText(null, null, 'Bill', 'sum_bill', null, '0.00') !!}</div>
                <div class="col-md-2">{!! Form::bsText(null, null, 'Cost', 'sum_cost', null, '0.00') !!}</div>
                <div class="col-md-2">{!! Form::bsText(null, null, 'Profit', 'sum_profit', null, '0.00') !!}</div>
                <div class="col-md-2">{!! Form::bsText(null, null, 'Profit %', 'sum_profit_percent', null, '0.00') !!}</div>
            </div>
        </div>
    </div>
</div>