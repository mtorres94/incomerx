<div class="row ">
    {!! Form::hidden('charge_id', null, ['id' => 'charge_id', 'class' => 'form-control input-sm']) !!}
    {!! Form::hidden('cost_unit_name', null, ['id' => 'cost_unit_name', 'class' => 'form-control input-sm']) !!}
    <div class="col-md-1">{!! Form::bsText(null, null, 'Qty.', 'cost_quantity', null, '0') !!}</div>
    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Unit','cost_unit_id',  Sass\Unit::all()->lists('code', 'id'), 'Units', false) !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Rate', 'cost_rate', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Amount', 'cost_amount', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Currency', 'cost_currency_type', Sass\Currency::all()->lists('code', 'id'), ' ')
     !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Exchange Rate', 'cost_exchange_rate', null, '0.00') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsComplete(null, null, 'Vendor', 'billing_vendor_code', 'billing_vendor_name', Request::get('term'),
   null, 'Vendors...') !!}</div>
    <div class="col-md-3">{!! Form::bsDate(null, null, 'Date', 'cost_date', null, '') !!}</div>
    <div class="col-md-3">{!! Form::bsText(null, null, 'Invoice #', 'cost_invoice', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText(null, null, 'Cost Center ID', 'cost_cost_center', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText(null, null, 'Reference #', 'cost_reference', null, '') !!}</div>
</div>
