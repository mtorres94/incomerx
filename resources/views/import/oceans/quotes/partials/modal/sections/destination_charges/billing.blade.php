<div class="row">
    {!! Form::hidden('dest_billing_unit_name', null, ['id' => 'dest_billing_unit_name', 'class' => 'form-control input-sm']) !!}
    <div class="col-md-1">{!! Form::bsText(null, null, 'Qty.', 'dest_billing_quantity', null, '0') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Unit', 'dest_billing_unit_id', Sass\Unit::all()->lists('code', 'id'), 'UNITS', 'body', false) !!}</div>

    <div class="col-md-2">{!! Form::bsText(null, null, 'Increase %', 'dest_billing_increase', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Rate', 'dest_billing_rate', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Amount', 'dest_billing_amount', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Currency', 'dest_billing_currency_type',Sass\Currency::all()->lists('code', 'id'),'body',  ' ')
     !!}</div>
    <div class="col-md-1">{!! Form::bsText(null, null, 'Xch', 'dest_billing_exchange_rate', null, '0.00') !!}</div>
    <div class="col-md-12">{!! Form::bsComplete(null, null, 'Customer', 'dest_customer_id', 'dest_customer_name', Request::get('term'),null, 'Customers...') !!}
    </div>
</div>
