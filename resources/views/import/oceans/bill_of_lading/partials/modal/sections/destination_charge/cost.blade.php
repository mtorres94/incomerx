<div class="row ">
    {!! Form::hidden('charge_id', null, ['id' => 'destination_charge_id', 'class' => 'form-control input-sm']) !!}

    <div class="col-md-1">{!! Form::bsText(null, null, 'Qty.', 'destination_cost_quantity', null, '0') !!}</div>
    <div class="col-md-3">{!! Form::bsComplete(null, null, 'Unit', 'destination_cost_unit_id', 'destination_cost_unit_name',Request::get('term'),
   null, ' ') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Rate', 'destination_cost_rate', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Amount', 'destination_cost_amount', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Currency', 'destination_cost_currency_type', Sass\Currency::all()->lists('code', 'id'), ' ')
     !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Exchange Rate', 'destination_cost_exchange_rate', null, '0.00') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsComplete(null, null, 'Vendor', 'destination_vendor_code', 'destination_vendor_name', Request::get('term'),
   null, 'Vendors...') !!}</div>
    <div class="col-md-3">{!! Form::bsDate(null, null, 'Date', 'destination_cost_date', null, '') !!}</div>
    <div class="col-md-3">{!! Form::bsText(null, null, 'Invoice #', 'destination_cost_invoice', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText(null, null, 'Cost Center ID', 'destination_cost_center', null, '') !!}</div>
    <div class="col-md-6">{!! Form::bsText(null, null, 'Reference #', 'destination_cost_reference', null, '') !!}</div>
</div>
