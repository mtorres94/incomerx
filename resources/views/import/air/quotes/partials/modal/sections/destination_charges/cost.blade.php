<div class="row ">
    {!! Form::hidden('dest_cost_unit_name', null, ['id' => 'dest_cost_unit_name', 'class' => 'form-control input-sm']) !!}

    <div class="col-md-1">{!! Form::bsText(null, null, 'Qty.', 'dest_cost_quantity', null, '0') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Unit', 'dest_cost_unit_id', Sass\Unit::all()->lists('code', 'id'), 'UNITS','body',  false) !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Rate', 'dest_cost_rate', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Amount', 'dest_cost_amount', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Currency', 'dest_cost_currency_type', Sass\Currency::all()->lists('code', 'id'), 'body', ' ')
     !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Xch Rate', 'dest_cost_exchange_rate', null, '0.00') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsComplete(null, null, 'Vendor', 'dest_vendor_code', 'dest_vendor_name', Request::get('term'),
   null, 'Vendors...') !!}</div>
    <div class="col-md-3">{!! Form::bsDate(null, null, 'Date', 'dest_cost_date', null, '') !!}</div>
    <div class="col-md-3">{!! Form::bsText(null, null, 'Invoice #', 'dest_cost_invoice', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText(null, null, 'Cost Center ID', 'dest_cost_cost_center', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText(null, null, 'Reference #', 'dest_cost_reference', null, '') !!}</div>
</div>
