<div class="row">
    <div class="col-md-12">
        <legend>Export Invoices to QuickBooks</legend>
    </div>
</div>
<div class="row">
    <div class="col-md-4">{!! Form::bsText('col-md-3','col-md-9', 'File #', 'shipment_code', null, null) !!}</div>
    <div class="col-md-4">{!! Form::bsText('col-md-3','col-md-9','Invoice #', 'code', null, null) !!}</div>
    <div class="col-md-4">{!! Form::bsSelect('col-md-3','col-md-9', 'Status', 'status', array('O' => 'OPEN', 'P' => 'POSTED'), null) !!}</div>
</div>
<div class="row">
    <div class="col-md-4">{!! Form::bsDate('col-md-3','col-md-9', 'Date From', 'date_from', null, null) !!}</div>
    <div class="col-md-4">{!! Form::bsDate('col-md-3','col-md-9', 'Date To', 'date_to', null, null) !!}</div>
</div>
<div class="row">
    <div class="col-md-12"><h5>Additional Options</h5></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-4">{!! Form::bsCheck('col-md-2', 'col-md-9','Create Customers not found in QuickBooks', 'export_customers', null) !!}</div>
        <div class="col-md-4">{!! Form::bsCheck('col-md-2', 'col-md-9','Export Vendors Invoices', 'export_vendors', null) !!}</div>
    </div>
</div>