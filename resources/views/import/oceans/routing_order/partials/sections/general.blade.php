<fieldset>
<div class="row">
        <div class="col-md-12">

            <div class="col-md-2">{!! Form::bsSelect(null, null, ' Type', 'type', array(
            'E' => 'EXPORT',
            'I' => 'IMPORT'
        ), null) !!}</div>
            <div class="col-md-2">{!! Form::bsDate(null, null,'Date', 'date_today', null, '') !!}</div>
            <div class="col-md-2">{!! Form::bsSelect(null, null, 'Status', 'status', array(
            'O' => 'OPEN',
            'C' => 'CLOSE',
        ), null) !!}</div>
            <div class="col-md-2">{!! Form::bsText(null, null, 'User', 'user_id', ((isset($routing_order) and $routing_order->user_create_id > 0) ? $routing_order->user_create->username :  Auth::user()->username), '') !!}</div>
           <div class="col-md-2">
                    {!! Form::bsSelect(null, null, 'Quote', 'quote_id', Sass\IoQuote::all()->lists('code', 'id'), 'Quotes', 'body', false) !!}
                </div>
            <div class="col-md-2">
                {!! Form::bsText(null, null, 'Routing #', 'code', null, ' ') !!}
            </div>
        </div>
    </div>
</fieldset>