<div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'shipper_id', 'shipper_name', Request::get('term'), ((isset($invoice) and $invoice->shipper_id > 0) ? $invoice->shipper->name : null), 'Customers...') !!}</div></div>

<div class="row"><div class="col-md-12">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'shipper_address', null, 1, ' ') !!}</div></div>

<div class="row"><div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'City', 'shipper_city', null, ' ') !!}</div></div>

<div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'shipper_state_id', 'shipper_state_name', Request::get('term'), ((isset($invoice) and $invoice->shipper_state_id > 0) ? $invoice->shipper_state->name : null), 'State') !!}</div></div>

<div class="row"><div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'shipper_zip_code_id', 'shipper_zip_code_code', Request::get('term'), ((isset($invoice) and $invoice->shipper_zip_code_id > 0) ? $invoice->shipper_zip_code->code : null), 'Zip Code') !!}
    </div></div>

<div class="row"><div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Contact', 'shipper_contact', null, '') !!}</div></div>
<div class="row"><div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Email', 'shipper_email', null, '') !!}</div></div>
<div class="row">
    <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'shipper_phone', null, '') !!}</div>
    <div class="col-md-6">  {!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'shipper_fax', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsSelect('col-md-6', 'col-md-6', 'Terms', 'shipper_payment_term', Sass\PaymentTerm::all()->lists('abbreviation', 'id'), null, 'body', false) !!}</div>
</div>
