<div class="col-md-8">

    <div class="row">
        <div class="col-md-4">{!! Form::bsText(null, null, 'GL Account ID', 'code', null, null) !!}</div>
        <div class="col-md-4">{!! Form::bsSelect(null, null, 'Type', 'code_type', Sass\AccountType::all()->lists('name', 'id'), ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsSelect(null, null, 'Type', 'currency_id', Sass\Currency::all()->lists('code','id'), ' ') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsText(null, null, 'Description', 'description', null, null) !!}</div>
    </div>
</div>
<div class="col-md-4">
    <div class="row">{!! Form::bsCheck('col-md-2', 'col-md-8','Inactive', 'status', (isset($general) ? $general->status : 'off')) !!}</div>
    <div class="row">{!! Form::bsCheck('col-md-2', 'col-md-8','Sub Account', 'subaccount', (isset($general) ? $general->subaccount : 'off')) !!}</div>
    <div class="row">{!! Form::bsSelect('col-md-4', 'col-md-4', 'Sub Account Code', 'general_ledger_account_id', Sass\GeneralLedgerAccount::all()->lists('code','id'), '') !!}</div>
</div>
