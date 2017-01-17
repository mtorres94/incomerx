<div class="row">
    {!! Form::hidden('charge_id', null, ['id' => 'origin_charge_id', 'class' => 'form-control input-sm']) !!}
    {!! Form::hidden('origin_bill_unit_name', null, ['id' => 'origin_bill_unit_name', 'class' => 'form-control input-sm']) !!}
    <div class="col-md-1">{!! Form::bsText(null, null, 'Qty.', 'origin_bill_quantity', null, '0') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Unit', 'origin_bill_unit_id', Sass\Unit::all()->lists('code', 'id'), null ,'body', false) !!}</div>

    <div class="col-md-2">{!! Form::bsText(null, null, 'Increase %', 'origin_bill_increase', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Rate', 'origin_bill_rate', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Amount', 'origin_bill_amount', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Currency', 'origin_bill_currency_type',Sass\Currency::all()->lists('code', 'id'),  ' ')
     !!}</div>
    <div class="col-md-1">{!! Form::bsText(null, null, 'Xch R.', 'origin_bill_exchange_rate', null, '0.00') !!}</div>
    <div class="col-md-12">{!! Form::bsComplete(null, null, 'Customer', 'origin_customer_id', 'origin_customer_name', Request::get('term'),null, 'Customers...') !!}
    </div>

</div>
