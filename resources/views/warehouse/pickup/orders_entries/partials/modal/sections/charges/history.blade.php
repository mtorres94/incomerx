<div class="row">

    {!! Form::hidden('charge_id', null, ['id' => 'charge_id', 'class' => 'form-control input-sm']) !!}
    <div class="col-md-4">{!! Form::bsText(null, null, 'Invoice #.', 'history_invoice', null, '') !!}</div>
    <div class="col-md-4">{!! Form::bsDate(null, null, 'Invoice Date', 'history_invoice_date', null, '') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'User', 'history_user_id', ((isset($receipt_entry) and $receipt_entry->user_create_id > 0) ? $receipt_entry->user_create->username :  Auth::user()->username), '') !!}</div>
</div>
<div class="row">
    <div class="col-md-4">{!! Form::bsText(null, null, 'JE #.', 'history_je_number', null, '') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'Posted period', 'history_posted_period', null, '00/0000') !!}</div>
    <div class="col-md-4">{!! Form::bsDate(null, null, 'Posted Date', 'history_posted_date', null, '') !!}</div>
</div>
