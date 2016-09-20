<div class="row">
    <div class="col-md-5">{!! Form::bsDate(null, null, 'Vendor Delivery', 'other_vendor_delivery', null, null) !!}</div>
    <div class="col-md-4">{!! Form::bsDate(null, null, 'Shipping date', 'other_shipping_date', null, null) !!}</div>
</div>
<div class="row">
    <div class="col-md-9"> {!! Form::bsComplete(null, null, 'Department', 'other_department_id', 'other_department_name', Request::get('term'), null, 'Departments...') !!}</div>
</div>
<div class="row">
    <div class="col-md-9">{!! Form::bsText(null,null, 'From System', 'other_from_system', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-9">{!! Form::bsText(null,null, 'Concessions', 'other_concession', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-9"> {!! Form::bsComplete(null, null, 'Ultimate Consignee', 'other_ultimate_consignee_id', 'other_ultimate_consignee_name', Request::get('term'), null, 'Customers...') !!}</div>
</div>