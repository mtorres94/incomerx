<div class="row">
    {!! Form::hidden('charge_id', null, ['id' => 'charge_id', 'class' => 'form-control input-sm']) !!}
    {!! Form::hidden('billing_unit_name', null, ['id' => 'billing_unit_name', 'class' => 'form-control input-sm']) !!}
    <div class="col-md-2">{!! Form::bsText(null, null, 'Qty.', 'billing_quantity', null, '0') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Unit', 'billing_unit_id', Sass\Unit::all()->lists('code', 'id'), 'UNITS', 'body', false) !!}</div>

    <div class="col-md-2">{!! Form::bsText(null, null, 'Increase %', 'billing_increase', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Rate', 'billing_rate', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Amount', 'billing_amount', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Currency', 'billing_currency_type',Sass\Currency::all()->lists('code', 'id'),'', 'body', false)
     !!}</div>
    <!--<div class="col-md-1">{!! Form::bsText(null, null, 'Xch', 'billing_exchange_rate', null, '0.00') !!}</div>-->
    <div class="col-md-12">{!! Form::bsComplete(null, null, 'Customer', 'billing_customer_id', 'billing_customer_name', Request::get('term'),null, 'Customers...') !!}
    </div>
</div>
