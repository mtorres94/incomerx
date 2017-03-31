<div class="row">
    <legend>Invoice Entry</legend>
</div>

<div class="row">
    <div class="col-md-2">{!! Form::bsText(null, null, 'Invoice #', 'code', null, null) !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, null, 'invoice_bill', array('P' => 'PREPAID','C' => 'COLLECTED'), null) !!}</div>
    <div class="col-md-2">{!! Form::bsDate(null, null, 'Date', 'date', null, '') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Status', 'status', array('O' => 'OPEN','C' => 'CLOSED', 'P' => 'POSTED', 'V' =>'VOID', 'D'=> 'PAID'), null) !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Currency', 'currency_id', Sass\Currency::all()->lists('code', 'id'), null, 'false', 'body') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'User', 'user_id', ((isset($invoice) and $invoice->user_create_id > 0) ? $invoice->user_create->username :  Auth::user()->username), '') !!}</div>

</div>
<div class="row">
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Type', 'type', array('I' => 'INVOICE','C' => 'CREDIT NOTE', 'D' => 'DEBIT NOTE'), null) !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'GL Period', 'period', null, null) !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Source', 'source', array('AE' => 'AIR EXPORT','AI' => 'AIR IMPORT', 'MI' => 'MISCELLANEOUS', 'OE'=>'OCEAN EXPORT', 'OI' => 'OCEAN IMPORT', 'PI'=>'PICK UP AND DELIVERY ORDERS', 'WH'=> 'WAREHOUSE MANAGEMENT RECEIPTS'), null, 'body', false) !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Doc. class', 'class', array('HO' => 'HOUSE','DI' => 'DIRECT', 'MA' => 'MASTER', 'PI'=>'PICK UP', 'DE'=> 'DELIVERY', 'XD' => 'XDOCK', 'WH'=>'WAREHOUSE RECEIPTS', 'MI'=> 'MISCELLANEOUS'), null, 'body', false) !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Shipment #', 'shipment_code', null, null) !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'Master #', 'master_code', null, null) !!}</div>
</div>
<div class="row">
    <div class="col-md-2">{!! Form::bsText(null, null, 'Customer Ref#', 'customer_reference', null, null) !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'House #', 'house_code', null, null) !!}</div>

</div>