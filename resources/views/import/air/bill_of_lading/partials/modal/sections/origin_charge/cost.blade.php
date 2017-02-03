<div class="row ">
    {!! Form::hidden('charge_id', null, ['id' => 'origin_charge_id', 'class' => 'form-control input-sm']) !!}
    {!! Form::hidden('origin_cost_unit_name', null, ['id' => 'origin_cost_unit_name', 'class' => 'form-control input-sm']) !!}

    <div class="col-md-1">{!! Form::bsText(null, null, 'Qty.', 'origin_cost_quantity', null, '0') !!}</div>
    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Unit', 'origin_cost_unit_id', Sass\Unit::all()->lists('code', 'id'), 'UNIT' ,'body', false) !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Rate', 'origin_cost_rate', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Amount', 'origin_cost_amount', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Currency', 'origin_cost_currency_type', Sass\Currency::all()->lists('code', 'id'), ' ', 'body', false)
     !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Exchange Rate', 'origin_cost_exchange_rate', null, '0.00') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsComplete(null, null, 'Vendor', 'origin_vendor_code', 'origin_vendor_name', Request::get('term'),
   null, 'Vendors...') !!}</div>
    <div class="col-md-3">{!! Form::bsDate(null, null, 'Date', 'origin_cost_date', null, '') !!}</div>
    <div class="col-md-3">{!! Form::bsText(null, null, 'Invoice #', 'origin_cost_invoice', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText(null, null, 'Cost Center ID', 'origin_cost_center', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText(null, null, 'Reference #', 'origin_cost_reference', null, '') !!}</div>
</div>
