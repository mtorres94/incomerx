<fieldset>
    <legend>General info</legend>
    <div class="row">
        <div class="col-md-3">{!! Form::bsText(null, null, 'Whse #', 'warehouse_code', null, '') !!}</div>
        <div class="col-md-3">{!! Form::bsDate(null, null, 'Date In', 'date_in', null, null) !!}</div>
        <div class="col-md-3">{!! Form::bsComplete(null, null, 'Division', 'division_id', 'division_name', Request::get('term'),
    ((isset($receipt_entry) and $receipt_entry->division_id > 0) ? $receipt_entry->division->name : null), 'Divisions...', 'options.maintenance.divisions.divisions', 'options.maintenance.divisions.divisions', 'maintenance.divisions_departments.divisions.index') !!}</div>
        <div class="col-md-3">{!! Form::bsSelect(null, null, 'Status', 'status', array(
            'O' => 'OPEN',
            'C' => 'CLOSE',
            'V' => 'VOID',
            'H' => 'HOLD'
        ), 'Status...') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-3">{!! Form::bsComplete(null, null, 'Shipping Instr.', 'shipping_id', 'shipping_number', null, null, 'Shipping Instr...') !!}</div>
        <div class="col-md-3">{!! Form::bsDate(null, null, 'Expire', 'expire_date', null, null) !!}</div>
        <div class="col-md-3">{!! Form::bsSelect(null, null, 'Currency', 'currency_id', Sass\Currency::all()->lists('code', 'id'), 'Currencies...') !!}</div>
        <div class="col-md-3">{!! Form::bsText(null, null, 'User', 'user_id', ((isset($receipt_entry) and $receipt_entry->user_create_id > 0) ? $receipt_entry->user_create->username :  Auth::user()->username), '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-3">{!! Form::bsComplete(null, null, 'PD Order #', 'pd_order_id', 'pd_order', null, null, 'P/D Orders...') !!}</div>
        <div class="col-md-3">{!! Form::bsComplete(null, null, 'PO #', 'po_number_id', 'po_number', null, null, 'PO Orders...') !!}</div>
    </div>
</fieldset>