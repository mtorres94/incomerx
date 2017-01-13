<div class="row">
    {!! Form::hidden('charge_id', null, ['id' => 'destination_charge_id', 'class' => 'form-control input-sm']) !!}
    <div class="col-md-1">{!! Form::bsText(null, null, 'Qty.', 'destination_bill_quantity', null, '0') !!}</div>
    <div class="col-md-2">{!! Form::bsComplete(null, null, 'Unit', 'destination_bill_unit_id', 'destination_bill_unit_name', Request::get('term'), null) !!}</div>

    <div class="col-md-2">{!! Form::bsText(null, null, 'Increase %', 'destination_bill_increase', null, '0.000') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null, null, 'Rate', 'destination_bill_rate', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Amount', 'destination_bill_amount', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Currency', 'destination_bill_currency_type',Sass\Currency::all()->lists('code', 'id'), ' ')
     !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Exchange Rate', 'destination_bill_exchange_rate', null, '0.00') !!}</div>
    <div class="col-md-12">{!! Form::bsComplete(null, null, 'Customer', 'destination_bill_customer_id', 'destination_customer_name', Request::get('term'),null, 'Customers...') !!}
    </div>

</div>
