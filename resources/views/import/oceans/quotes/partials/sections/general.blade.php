<div class="row">
    <div class="col-md-12">
        {{ Form::bsText('col-md-3', 'col-md-3', 'Quote #', 'code', null) }}
        {{ Form::bsDate('col-md-3', 'col-md-3', 'Date', 'date_today', null) }}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-3', 'col-md-3', 'User', 'user_id', ((isset($quotes) and $quotes->user_create_id > 0) ? $quotes->user_create->username :  Auth::user()->username), '') !!}
        {{ Form::bsDate('col-md-3', 'col-md-3', 'Valid until', 'valid_date', null) }}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsSelect('col-md-3', 'col-md-3', 'Type', 'type', array(
              'C' => 'COLLECT',
              'P' => 'PREPAID',
          ), 'Type') !!}
        {!! Form::bsSelect('col-md-3', 'col-md-3', 'Bill Rate Class', 'rate_class', array(
             '1' => '1 - 100 LB/ 1CFT',
             '2' => '2 - 2000 LB/ 40CFT',
             '3' => '3 - 1000 KG/ 1CBM',
             '4' => '4 - FIXED AMOUNT',
             '5' => '5 - CONTAINER',
             '6' => '6 - 50 LB/ 1CFT',
             '7' => '7 - OTHER',
         ), null) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsSelect('col-md-3', 'col-md-3', 'Status', 'status', array(
             'A' => 'APPROVED',
             'C' => 'CLOSED',
             'I' => 'IN PROCESS',
             'L' => 'LOST',
             'O' => 'OPEN',
             'S' => 'SEND TO CUSTOMER',
             'T' => 'TRANSFERRED TO SHIPMENT',
             'V' => 'VOID',
         ), null, 'body') !!}
        {!! Form::bsSelect('col-md-3', 'col-md-3', 'Quote Type', 'quote_type', array(
              'S' => 'SINGLE CARRIER',
              'M' => 'MULTIPLE CARRIERS',
          ), null) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsSelect('col-md-3', 'col-md-3', ' Currency', 'currency_type', Sass\Currency::all()->lists('code', 'id'), null) !!}
        {!! Form::bsText('col-md-3', 'col-md-3', 'Declared Value', 'declared_value',null, '0.000') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-3', 'col-md-3', 'Exchange rate', 'exchange_rate',null, '0.000') !!}
        {!! Form::bsText('col-md-3', 'col-md-3', 'Insured Value', 'insured_value',null, '0.000') !!}
    </div>
</div>