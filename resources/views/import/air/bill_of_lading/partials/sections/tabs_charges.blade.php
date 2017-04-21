<div class="easyui-tabs">
    <div title="Origin Charges">
        <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
            <button type="button" id="btn-charges-origin" class="btn btn-default" data-toggle="modal" data-target="#Origin_Charges" onclick="cleanModalFields('Origin_Charges')">
                <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-danger" id="delete_charge">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
        </div>
        <table class="table table-bordered table-condensed" id="origin_charge">
            <thead>
            <tr>
                <th  hidden></th>
                <th hidden></th>
                <th width="15%" >Billing Code</th>
                <th width="25%" >Description</th>
                <th width="10%" >Bill type</th>
                <th width="10%" >Bill Party</th>
                <th width="10%" >Qty</th>
                <th width="10%" >Amount</th>
                <th width="10%" >Cost</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($bill_of_lading))
                @foreach($bill_of_lading->origin_charge as $detail)
                    <tr id="{{ $detail->line }}">
                        {!! Form::bsRowTd($detail->line, 'charge_id', $detail->line, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_billing_id', $detail->billing_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_code', ($detail->billing_id >0 ? $detail->billing->code :""), false) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_billing_description', $detail->billing_description, false) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_bill_type', $detail->bill_type, false) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_bill_party', $detail->bill_party, false) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_quantity', $detail->billing_quantity, false) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_rate', $detail->billing_rate, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_amount', $detail->billing_amount, false) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_currency_type', $detail->billing_currency_type, true) !!}
                        {!! Form::bsRowTd($detail->line, 'customer_name', ($detail->customer_id >0 ? $detail->customer->name :""), true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_amount', $detail->cost_amount, false) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_currency_type', $detail->cost_currency_type, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_invoice', $detail->cost_invoice, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_reference', $detail->cost_reference, true) !!}

                        {!! Form::bsRowTd($detail->line, 'billing_notes', $detail->billing_notes, true) !!}
                        {!! Form::bsRowTd($detail->line, 'bill_unit_id', $detail->billing_unit_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_unit_name', ($detail->billing_unit_id > 0 ? $detail->billing_unit->code :""), true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_exchange_rate', $detail->bill_exchange_rate, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_customer_id', $detail->customer_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_quantity', $detail->cost_quantity, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_unit_id', $detail->cost_unit_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_unit_name', ($detail->cost_unit_id >0 ? $detail->cost_unit->code :""), true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_rate', $detail->cost_rate, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_cost_center', $detail->cost_center, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_exchange_rate', $detail->cost_exchange_rate, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_vendor_code', $detail->billing_vendor_code, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_vendor_name', ($detail->billing_vendor_code >0 ? $detail->billing_vendor->name : ""), true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_date', $detail->cost_date, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_increase', $detail->bill_increase, true) !!}

                        {!! Form::bsRowBtns() !!}
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
            <div class="pull-right">
                <div class="col-md-2">{!! Form::bsText(null,null, 'Bill', 'total_bill', null, '0.00') !!}</div>
                <div class="col-md-2">{!! Form::bsText(null,null, 'Cost', 'total_cost', null, '0.00') !!}</div>
                <div class="col-md-2">{!! Form::bsText(null,null, 'Profit', 'total_profit', null, '0.00') !!}</div>
                <div class="col-md-2">{!! Form::bsText(null,null, 'Profit %', 'total_profit_percent', null, '0.00') !!}</div>
            </div>
    </div>
</div>
