<div class="row">
    {!! Form::hidden('charge_id', null, ['id' => 'charge_id', 'class' => 'form-control input-sm']) !!}
    <div class="col-md-1">{!! Form::bsText(null, null, 'Qty.', 'tmp_cost_quantity', null, '0') !!}</div>
    <div class="col-md-2">{!! Form::bsComplete(null, null, 'Unit', 'tmp_cost_unit_id', 'tmp_cost_unit_name', Request::get('term'), null, null) !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Rate', 'tmp_cost_rate', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Amount', 'tmp_cost_amount', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Currency', 'tmp_cost_currency_type', Sass\Currency::all()->lists('code', 'id'), null)
     !!}</div>
    <div class="col-md-3">{!! Form::bsText(null, null, 'Exchange Rate', 'tmp_cost_exchange_rate', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsComplete(null, null, 'Vendor', 'tmp_billing_vendor_code', 'tmp_billing_vendor_name', Request::get('term'), null, 'Vendors...') !!}</div>
    <div class="col-md-3">{!! Form::bsDate(null, null, 'Date', 'tmp_cost_date', null, '') !!}</div>
    <div class="col-md-3">{!! Form::bsText(null, null, 'Invoice #', 'tmp_cost_invoice', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText(null, null, 'Cost Center', 'tmp_cost_cost_center', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText(null, null, 'Reference #', 'tmp_cost_reference', null, '') !!}</div>
</div>
