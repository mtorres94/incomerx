<fieldset>
    <div class="row">
        <div class="col-md-2">{!! Form::bsSelect(null, null, ' Shipment Type', 'shipment_type', array(
            'C' => 'Consolidation',
            'D' => 'Direct',
        ), 'Type') !!}</div>
        <div class="col-md-2">{!! Form::bsDate(null, null,'Date', 'date_today', null, '') !!}</div>
        <div class="col-md-2">{!! Form::bsComplete(null, null,'Quotes # ', 'quote_id', 'quote_code', Request::get('term'),
    ((isset($shipment_entry) and $shipment_entry->quote_id > 0) ? $shipment_entry->quote->name : null), '') !!}</div>

        <div class="col-md-2">{!! Form::bsSelect(null, null, 'Rate Class', 'rate_class', array(
            '1' => '1 - 100 LB/ 1CFT',
            '2' => '2 - 2000 LB/ 40CFT',
            '3' => '3 - 1000 KG/ 1CBM',
            '4' => '4 - FIXED AMOUNT',
            '5' => '5 - CONTAINER',
            '6' => '6 - 50 LB/ 1CFT',
            '7' => '7 - OTHER',
        ), null) !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, ' Status', 'shipment_status', array(
            'O' => 'OPEN',
            'P' => 'POSTED',
            'C' => 'CLOSED',
            'V' => 'VOID',
        ), 'Status') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'User', 'user_id', ((isset($shipment_entry) and $shipment_entry->user_create_id > 0) ? $shipment_entry->user_create->username :  Auth::user()->username), '') !!}</div>

    </div>

</fieldset>