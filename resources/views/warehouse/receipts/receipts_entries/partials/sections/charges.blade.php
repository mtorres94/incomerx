<div class="easyui-tabs">
    <div title="Charges Details">
        <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
            <button type="button" id="btn-charges" class="btn btn-default" data-toggle="modal" data-target="#charge-warehouse" onclick="cleanModalFields('charge-warehouse')">
                <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-danger" onclick="clearTable('charge-details')">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
        </div>
        <table class="table table-bordered table-condensed" id="charge-details">
            <thead>
            <tr>
                <th  data-override="charge_id" hidden></th>
                <th data-override="billing_billing_id" hidden></th>
                <th width="15%" data-override="billing_billing_code">Billing Code</th>
                <th width="15%" data-override="billing_billing_description">Description</th>
                <th width="10%" data-override="billing_bill_type">Bill type</th>
                <th width="10%" data-override="billing_quantity">Qty</th>
                <th width="10%" data-override="billing_rate">Rate</th>
                <th width="10%" data-override="billing_amount">Amount</th>
                <th width="15%" data-override="billing_currency_type">Currency</th>
                <th width="20%" data-override="billing_customer_name">Bill to</th>
                <th hidden data-override="billing_increase">Increase %</th>
                <th hidden data-override="cost_cost_center">Cost</th>
                <th hidden data-override="cost_currency_type">Currency</th>
                <th hidden data-override="cost_invoice">Vendor Inv</th>
                <th hidden data-override="cost_reference">Vendor Ref</th>
                <th width="15%"/>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div class="pull-left">
            <button type="button" id="btn-calculate_rate"class="btn btn-default">Calculate Rate</button>
            {!! Form::bsCheck('Do not bill from this transactions', 'charges_check') !!}
        </div>
        <div class="pull-right">
            <div class="row">
                <div class="col-md-offset-4 col-md-2">{!! Form::bsText(null, null, 'Bill', 'charges_bill', null, '0.00') !!}</div>
                <div class="col-md-2">{!! Form::bsText(null, null, 'Cost', 'charges_cost', null, '0.00') !!}</div>
                <div class="col-md-2">{!! Form::bsText(null, null, 'Profit', 'charges_profit', null, '0.00') !!}</div>
                <div class="col-md-2">{!! Form::bsText(null, null, 'Profit %', 'charges_profit_%', null, '0.00') !!}</div>
            </div>
        </div>
    </div>
</div>