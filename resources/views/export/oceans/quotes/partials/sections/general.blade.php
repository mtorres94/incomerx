<div class="row">
    <div class="col-md-2">
        {{ Form::bsText(null, null, 'Quote #', 'code', null) }}
    </div>
    <div class="col-md-2">
        {{ Form::bsDate(null, null, 'Date', 'quote_date', null) }}

    </div>

    <div class="col-md-2">{!! Form::bsText(null, null, 'User', 'user_id', ((isset($quotes) and $quotes->user_create_id > 0) ? $quotes->user_create->username :  Auth::user()->username), '') !!}</div>

    <div class="col-md-2">
        {{ Form::bsDate(null, null, 'Valid until', 'valid_date', null) }}

    </div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Type', 'type', array(
            'C' => 'COLLECT',
            'P' => 'PREPAID',
        ), 'Type') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Bill Rate Class', 'rate_class', array(
            '1' => '1 - 100 LB/ 1CFT',
            '2' => '2 - 2000 LB/ 40CFT',
            '3' => '3 - 1000 KG/ 1CBM',
            '4' => '4 - FIXED AMOUNT',
            '5' => '5 - CONTAINER',
            '6' => '6 - 50 LB/ 1CFT',
            '7' => '7 - OTHER',
        ), null) !!}</div>

</div>
<div class="row">
    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Status', 'quote_status', array(
            'A' => 'APPROVED',
            'C' => 'CLOSED',
            'I' => 'IN PROCESS',
            'L' => 'LOST',
            'O' => 'OPEN',
            'S' => 'SEND TO CUSTOMER',
            'T' => 'TRANSFERRED TO SHIPMENT',
            'V' => 'VOID',
        ), null) !!}</div>

    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Quote Type', 'quote_type', array(
            'S' => 'SINGLE CARRIER',
            'M' => 'MULTIPLE CARRIERS',
        ), null) !!}</div>
    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Contract Basis', 'contract_basis', array(
            '1' => 'WEIGHT MEASURE (LCL)',
            '2' => 'PER CONTAINER (FCL)',
        ), null) !!}</div>
</div>