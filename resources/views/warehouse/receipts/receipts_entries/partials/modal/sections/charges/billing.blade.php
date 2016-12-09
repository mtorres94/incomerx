<div class="row">
    {!! Form::hidden('tmp_charge_id', null, ['id' => 'tmp_charge_id', 'class' => 'form-control input-sm']) !!}
    {!! Form::hidden('tmp_billing_unit_name', null, ['id' => 'tmp_billing_unit_name', 'class' => 'form-control input-sm']) !!}
    <div class="col-md-1">{!! Form::bsText(null, null, 'Qty.', 'tmp_billing_quantity', null, '0') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Unit', 'tmp_billing_unit_id', Sass\Unit::all()->lists('code', 'id'),'UNITS', false) !!}</div>

    <div class="col-md-2">{!! Form::bsText(null, null, 'Rate', 'tmp_billing_rate', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Increase %', 'tmp_billing_increase', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Amount', 'tmp_billing_amount', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Currency', 'tmp_billing_currency_type', Sass\Currency::all()->lists('code', 'id'), null)
     !!}</div>
    <div class="col-md-1">{!! Form::bsText(null, null, 'Xch.', 'tmp_billing_exchange_rate', null, '') !!}</div>

    <div class="col-md-12">
        {!! Form::bsComplete(null, null, 'Customer', 'tmp_billing_customer_id', 'tmp_billing_customer_name', Request::get('term'), null, 'Customers...') !!}
    </div>
</div>