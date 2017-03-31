<div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'consignee_id', 'consignee_name', Request::get('term'), ((isset($invoice) and $invoice->consignee_id > 0) ? $invoice->consignee->name : null), 'Customers...') !!}</div></div>

<div class="row"><div class="col-md-12">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'consignee_address', null, 1, ' ') !!}</div></div>

<div class="row"><div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'City', 'consignee_city', null, ' ') !!}</div></div>

<div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'consignee_state_id', 'consignee_state_name', Request::get('term'), ((isset($invoice) and $invoice->consignee_state_id > 0) ? $invoice->consignee_state->name : null), 'State') !!}</div></div>

<div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'consignee_zip_code_id', 'consignee_zip_code_code', Request::get('term'), ((isset($invoice) and $invoice->consignee_zip_code_id > 0) ? $invoice->consignee_zip_code->code : null), 'Zip Code') !!}
    </div></div>

<div class="row"><div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Contact', 'consignee_contact', null, '') !!}</div></div>
<div class="row"><div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Email', 'consignee_email', null, '') !!}</div></div>
<div class="row">
    <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'consignee_phone', null, '') !!}</div>
    <div class="col-md-6">  {!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'consignee_fax', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsSelect('col-md-6', 'col-md-6', 'Terms', 'consignee_payment_term', Sass\PaymentTerm::all()->lists('abbreviation', 'id'), null, 'body', false) !!}</div>
</div>