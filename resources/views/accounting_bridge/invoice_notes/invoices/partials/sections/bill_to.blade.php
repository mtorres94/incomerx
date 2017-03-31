<div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'bill_to_id', 'bill_to_name', Request::get('term'), ((isset($invoice) and $invoice->bill_to_id > 0) ? $invoice->bill_to->name : null), 'Customers...') !!}</div></div>

<div class="row"><div class="col-md-12">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'bill_to_address', null, 1, ' ') !!}</div></div>

<div class="row"><div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'City', 'bill_to_city', null, ' ') !!}</div></div>

<div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'bill_to_state_id', 'bill_to_state_name', Request::get('term'), ((isset($invoice) and $invoice->bill_to_state_id > 0) ? $invoice->bill_to_state->name : null), 'State') !!}</div></div>

<div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'bill_to_zip_code_id', 'bill_to_zip_code_code', Request::get('term'), ((isset($invoice) and $invoice->bill_to_zip_code_id > 0) ? $invoice->bill_to_zip_code->code : null), 'Zip Code') !!}
    </div></div>

<div class="row"><div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Contact', 'bill_to_contact', null, '') !!}</div></div>
<div class="row"><div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Email', 'bill_to_email', null, '') !!}</div></div>
<div class="row">
    <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'bill_to_phone', null, '') !!}</div>
    <div class="col-md-6">  {!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'bill_to_fax', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsSelect('col-md-6', 'col-md-6', 'Terms', 'bill_to_payment_term', Sass\PaymentTerm::all()->lists('abbreviation', 'id'), null, 'body', false) !!}</div>
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Sales Rep', 'bill_to_sales', null, null) !!}</div>

</div>
