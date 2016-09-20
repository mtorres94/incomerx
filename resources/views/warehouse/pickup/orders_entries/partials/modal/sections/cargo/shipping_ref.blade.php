<div class="row">
    <div class="col-md-2">{!! Form::bsText(null,null, 'Type', 'shipping_type', null, '') !!}</div>
    <div class="col-md-2">{!! Form::bsDate(null, null, 'Date', 'shipping_date_in', null, null) !!}</div>
    <div class="col-md-2">{!! Form::bsDate(null, null, 'Date Out', 'shipping_date_out', null, null) !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'User', 'ship_user_id', ((isset($order_entry) and $order_entry->user_create_id > 0) ? $order_entry->user_create->username :  Auth::user()->username), '') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null,null, 'Status ID', 'shipping_status', null, '') !!}</div>
</div>

<div class="row">
    <div class="col-md-7">
        {!! Form::bsText(null,null, 'Reference Number', 'shipping_reference', null, 'Reference...') !!}
    </div>
    <div class="col-md-5">
        {!! Form::bsText(null,null, 'File/Manifest Number', 'shipping_file', null, ' ') !!}

    </div>
</div>