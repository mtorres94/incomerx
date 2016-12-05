<div class="row">
    {!! Form::hidden('charge_id', null, ['id' => 'charge_id', 'class' => 'form-control input-sm']) !!}
    <div class="col-md-1">{!! Form::bsText(null, null, 'Qty.', 'tmp_billing_quantity', null, '0') !!}</div>
    <div class="col-md-2">{!! Form::bsComplete(null, null, 'Unit', 'tmp_billing_unit_id', 'tmp_billing_unit_name', Request::get('term'), null, null) !!}</div>

    <div class="col-md-2">{!! Form::bsText(null, null, 'Increase %', 'tmp_billing_increase', null, '0.000') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null, null, 'Rate', 'tmp_billing_rate', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Amount', 'tmp_billing_amount', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Currency', 'tmp_billing_currency_type', Sass\Currency::all()->lists('code', 'id'), null)
     !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Exchange Rate', 'tmp_billing_exchange_rate', null, '') !!}</div>

    <div class="col-md-12">
        {!! Form::bsComplete(null, null, 'Customer', 'tmp_billing_customer_id', 'tmp_billing_customer_name', Request::get('term'), null, 'Customers...') !!}
    </div>
</div>